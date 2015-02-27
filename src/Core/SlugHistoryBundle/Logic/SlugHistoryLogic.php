<?php
/**
 * Основная логика бандла
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\Logic;

use Core\SlugHistoryBundle\Entity\SlugHistory;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use JMS\I18nRoutingBundle\Router\I18nLoader;
use Gedmo\Sluggable\Util\Urlizer;

class SlugHistoryLogic
{
    const NOT_FOUND         = 404;
    const MOVED_PERMANENTLY = 301;

    private $container;
    private $configs;

    public function __construct($container)
    {
        $this->container = $container;
        $this->configs   = $container->getParameter('core_slug_history')['namespaces'];
    }

    public function getConfigs()
    {
        return $this->configs;
    }

    /**
     * Подписка на событие response
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        // Если ответ содержит код 404 то пытаемся найти такой URL в истории
        if ($response->getStatusCode() === self::NOT_FOUND) {
            $em          = $this->container->get('doctrine')->getManager();
            $notFoundUrl = $event->getRequest()->getUri();
            $history     = $em->getRepository('CoreSlugHistoryBundle:SlugHistory')->findOneByOldUrl($notFoundUrl);
            if ($history !== null) {
                $class = $history->getClassName();
                if (isset($this->configs[$class])) {
                    $obj = $em->getRepository($class)->find($history->getTargetId());
                    $do  = method_exists($obj, 'getIsEnabled') ? $obj->getIsEnabled() : true;
                    if ($obj !== null && $do) {
                        $redirectUrl = $this->buildUrl($obj, $this->configs[$class]);
                        $response    = new RedirectResponse($redirectUrl, self::MOVED_PERMANENTLY);
                        $event->setResponse($response);
                    }
                }
            }
        }
    }

    /**
     * Запуск в фоновом режиме зипись старыхурлов
     *
     * @param object $obj
     */
    public function checkAndWriteSlugHistoryInBackground($obj)
    {
        // Получаем имя класса полученного объекта
        $class = isset($this->configs[get_class($obj)]) ? get_class($obj) : get_parent_class($obj);

        // Если полученый класс объекта есть в конфигах, то идем дальше
        if (isset($this->configs[$class])) {
            $em      = $this->container->get('doctrine')->getManager();
            $uow     = $em->getUnitOfWork();
            $uow->computeChangeSets();
            $changes = $uow->getEntityChangeSet($obj);

            // Находим название поля, которое содержит slug
            foreach ($this->configs[$class]['parameters'] as $extraParameterName => $field) {
                if (strpos($field, '.') === false) {
                    $slugFieldName = $field;
                    break(1);
                }
            }

            // Если поле slug изменилось, записываем старый URL в историю
            if (isset($changes[$slugFieldName])) {
                $command = 'slug:history:write ';
                $command .= '"'.$obj->getId().'" ';
                $command .= '"'.$class.'" ';
                $command .= '"'.$extraParameterName.'" ';
                $command .= '"'.preg_replace('/[^a-zA-Z0-9-_].+/', '', $changes[$slugFieldName][0]).'" ';

                // Запускаем команду на запись истории slug
                $this->container->get('core_common_process')->runAppConsole($command);
            }
        }
    }

    /**
     * Функция проверяет и записавает старую ссылку, с которой необходимо будет сделать редирект в случае, если по ней перейдет юзер
     *
     * @param array $options
     */
    public function writeSlugHistory($options)
    {
        $em      = $this->container->get('doctrine')->getManager();
        $class   = $options['class'];
        $obj     = $em->getRepository($class)->find($options['id']);
        $oldSlug = $options['oldSlug'];

        $oldUrl = $this->buildUrl($obj, $this->configs[$class], [$options['extraParameterName'] => $oldSlug]);
        $this->_flushSlugHistory($class, $oldUrl, $obj->getId(), false);

        // Вызываем функцию, которая сохранит старые ссылки для коллекций основного объекта
        $this->_recursiveCollectionSlug($obj, $this->configs[$class], $oldSlug);
        $em->flush();
    }

    /**
     * Вспомагательная функция для рекурсивного создания старых ссылок для коллекций
     *
     * @param object $obj
     * @param array $configs
     * @param string $oldVal
     * @param int $depth
     */
    private function _recursiveCollectionSlug($obj, $configs, $oldVal, $depth = 1)
    {
        if (isset($configs['childrensEntity'])) {
            foreach ($configs['childrensEntity'] as $field => $childrenEntity) {
                if (isset($this->configs[$childrenEntity])) {

                    // Получаем коллекцию
                    $collection = $obj->{'get'.ucfirst($field)}();
                    if (!$collection->isInitialized()) {
                        $collection->initialize();
                    }

                    // Находим поле название поля, которое содержит slug
                    foreach ($this->configs[$childrenEntity]['parameters'] as $extraParameterName => $field) {
                        if (substr_count($field, '.') === $depth) {
                            break(1);
                        }
                    }

                    foreach ($collection as $item) {
                        $oldUrl = $this->buildUrl($item, $this->configs[$childrenEntity], [$extraParameterName => $oldVal]);
                        $this->_flushSlugHistory($childrenEntity, $oldUrl, $item->getId(), false);

                        // Вызываем эту же функцию, с увеличенной глубиной на 1
                        $this->_recursiveCollectionSlug($item, $this->configs[$childrenEntity], $oldVal, ++$depth);
                    }
                }
            }
        }
    }

    /**
     * Вспомагательная функция для создания и записи объекта истории
     *
     * @param string $className
     * @param string $oldUrl
     * @param int $targetId
     * @param boolean $isFlush
     */
    private function _flushSlugHistory($className, $oldUrl, $targetId, $isFlush = true)
    {
        $em      = $this->container->get('doctrine')->getManager();
        $history = new SlugHistory();
        $history->setClassName($className);
        $history->setOldUrl($oldUrl);
        $history->setTargetId($targetId);

        $em->persist($history);
        if ($isFlush) {
            $em->flush($history);
        }

        return $history;
    }

    /**
     * Строим ссылку по конфигам
     *
     * @param object $obj
     * @param array $configs
     * @return string
     */
    public function buildUrl($obj, $configs, $extraParameters = null)
    {
        $parameters = [];
        $tempObj    = $obj;
        foreach ($configs['parameters'] as $name => $field) {
            if (strpos($field, '.') > 0) {
                $parts = explode('.', $field);
                foreach ($parts as $i => $part) {
                    $subObj = $obj->{'get'.ucfirst($part)}();
                    if (is_object($subObj)) {
                        $tempObj = $subObj;
                    } else {
                        $parameters[$name] = $tempObj->{'get'.ucfirst($part)}();
                    }
                }
            } else {
                $parameters[$name] = $obj->{'get'.ucfirst($field)}();
            }
        }

        if ($extraParameters) {
            $parameters = array_merge($parameters, $extraParameters);
        }

        $url = $this->container->get('router')->generate(
            $configs['route'], $parameters
        );

        $url = 'http://'.preg_replace('/\/+/', '/', ($this->container->getParameter('domain_ru').'/'.parse_url($url, PHP_URL_PATH)));

        return $url;
    }

    /**
     * Добавление/редактирование/удаление УРЛ по которому будет происходить редирект
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function editorSlug(Request $request)
    {
        $response  = [];
        $targetId  = $request->request->get('targetId');
        $className = $request->request->get('className');
        $url       = $request->request->get('url');
        $action    = $request->request->get('action');
        $id        = $request->request->get('id');
        $em        = $this->container->get('doctrine')->getManager();
        $repo      = $em->getRepository('CoreSlugHistoryBundle:SlugHistory');

        $urlPath = str_replace('app_dev.php/', '', parse_url($url, PHP_URL_PATH));
        try {
            $routerInfo = $this->container->get('router')->match($urlPath);
        } catch (\Exception $e) {
            $routerInfo = [];
        }
        if ((!isset($routerInfo['_route']) || !preg_match('/^http/', $url) || preg_match('/[а-яА-Я]/', $url)) && !in_array($action, ['remove', 'removeAll'])) {
            $response['error'][] = 'Такого URL на сайте быть не может!';
        }


        if (!isset($this->configs[$className])) {
            $response['error'][] = 'Не найдены конфиги в файле slug_history.yml для класса "'.$className.'"!';
        }

        if ($action === 'add') {
            $isExist = $repo->findOneByOldUrl($url);
            if ($isExist !== null) {
                $response['error'][] = 'Такой URL уже есть!';
            }
        } else {
            $existItemHistory = $repo->find($id);
        }

        if (isset($routerInfo['_route']) && !in_array($action, ['remove', 'removeAll'])) {
            $routeParts = explode(I18nLoader::ROUTING_PREFIX, $routerInfo['_route']);
            if (!isset($routeParts[1]) || $this->configs[$className]['route'] !== $routeParts[1]) {
                $response['error'][] = 'Route определился не верно!';
            }
        }

        if (!isset($response['error'])) {

            switch ($action) {
                case 'add':
                    $this->_flushSlugHistory($className, $url, $targetId);
                    $response['success'][] = 'Новый URL добавлен успешно!';
                    break;
                case 'edit':
                    $existItemHistory->setOldUrl($url);
                    $em->flush($existItemHistory);
                    $response['success'][] = 'URL изменен успешно!';
                    break;
                case 'remove':
                    $em->remove($existItemHistory);
                    $em->flush($existItemHistory);
                    $response['success'][] = 'URL удален успешно!';
                    break;
                case 'removeAll':
                    $repo->remove($className, $targetId);
                    $response['success'][] = 'Все URL\'ы удалены успешно!';
                    break;
            }
        }

        $history = $repo->findBy(['className' => [$className], 'targetId' => [$targetId]], ['createdAt' => 'DESC']);

        $response['data']['html'] = $this->container->get('templating')->render('CoreSlugHistoryBundle:Admin\Form:slug_history_widget.html.twig',
            [
            'target_id' => $targetId,
            'history' => $history,
            'className' => $className,
            'withoutJS' => true,
            'id' => $id,
            'action' => $action,
            'response' => $response,
            'url' => $action === 'add' && isset($response['error']) ? $url : '',
        ]);


        return $response;
    }
}