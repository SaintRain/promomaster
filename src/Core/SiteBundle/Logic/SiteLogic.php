<?php
/**
 * Логика для Сайтов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Logic;

use Core\SiteBundle\Entity\CommonSite;
use Core\SiteBundle\Entity\AdPlace;
use Core\SiteBundle\Entity\Section;
use  Core\BannerBundle\Entity\CommonBanner;
use Core\AdCompanyBundle\Entity\AdCompany;
use Core\AdCompanyBundle\Entity\Placement;
use Core\AdCompanyBundle\Entity\PlacementBanner;

class SiteLogic
{
    private $router;
    private $request;
    private $em;
    private $container;
    private $paginator;
    private $parameters;

    public function __construct($router, $em, $container, $paginator, $parameters)
    {
        $this->router = $router;
        $this->em = $em;
        $this->container = $container;
        $this->paginator = $paginator;
        $this->parameters = $parameters;
    }


    /**
     * Получаем URL для перенаправление c /~/1 на /~, чтобы не было одинаковых URL
     *
     * @param string $route
     * @return boolean|string
     */
    public function getRedirectUrlIfPageEqualOne($route)
    {

        if ($this->container->get('request')->get('page') === '1' && $this->container->get('request')->attributes->get('_route') !== $route) {
            $parameters = array_merge(
                $this->container->get('request')->attributes->get('_route_params'), $this->container->get('request')->query->all(), array('page' => null)
            );
            return $this->router->generate($route, $parameters);
        }
        return false;
    }

    /**
     * Постраничная навигация
     * @param $page
     */
    public function getDataInCabinetForPage($page)
    {
        $filterRequest = [
            'maxResults' => 10,
            'user' => $this->container->get('security.context')->getToken()->getUser()
        ];

        $queryBuilder = $this->em->getRepository('CoreSiteBundle:CommonSite')->generateQueryBuilderByFilter($filterRequest);
        $sites = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);
        return $sites;

    }


    /**
     * Проверяет есть ли у пользователя web-сайт с таким именем
     * @param $site
     * @param $user
     * @return bool
     */
    public function checkIsExistWebSite($site, $user)
    {

        $res = $this->em->getRepository('CoreSiteBundle:WebSite')->findQuantityByOptions(['id' => $site->getId(), 'user' => $user, 'domain' => $site->getDomain()]);

        if ($res['quantity']) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Генерирует проверочный код для подтверждения прав на площадку
     * @param $site
     * @return bool
     */
    public function generateVerifiedCode($site)
    {

        $code = uniqid();

        return $code;
    }

    /**
     * Проверяет изменилось ли доменное имя
     * @param $object
     */
    public function checkIsDomainNameChange($site)
    {
        if ($site instanceof CommonSite) {
            $em = $this->container->get('doctrine')->getManager();
            $uow = $em->getUnitOfWork();
            $uow->computeChangeSets();
            $res = $uow->getEntityChangeSet($site);
            //если изменилось, тогда генерируем новый код
            if (isset($res['domain'])) {

                $site->setVerifiedCode($this->generateVerifiedCode($site));
                $site->setIsVerified(false);
                $this->em->flush($site);
            }
        }
    }

    /**
     * Проверяем нужно ли обновлять этот объект в NodeJS
     * @param $object
     */
    public function checkRefreshDataNodJs($object)
    {
        //изменилось что-то в са
        if ($object instanceof CommonSite ||
            $object instanceof AdPlace ||
            $object instanceof Section ||
            $object instanceof CommonBanner ||
            $object instanceof Placement ||
            $object instanceof PlacementBanner ||
            $object instanceof AdCompany
        ) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;

    }

    /**
     * Смотрим если обновились данные, то делаем запрос в NodeJS, чтобы тот обновил
     * актуальность своих данных
     * @param $object
     */
    public function sendRefreshDataNodJs($arr = [])
    {
        $secretToken = 'elG5fNk4md3l4k4';
        if ($arr) {
            foreach ($arr as $type => $tables) {
                foreach ($tables as $tableName => $data) {
                    foreach ($data as $id => $v) {

                        if (!$id) {
                            throw new \ErrorException('Нельзя передавать в NodeJs ID=0 !');
                        }
                        $options = [
                            'secretToken' => $secretToken,
                            'tableName' => $tableName,
                            'type' => $type,
                            'id' => $id
                        ];

                        if (is_array($v)) { //manyToMany
                            $options['extraFields'] = $v;
                        }

//                        $this->sendRefresRequestToNodJS($options);  //делаем запрос
                    }
                }
            }
        }

        //            ||
//            $object instanceof AdPlace ||
//            $object instanceof Section ||
//            $object instanceof CommonBanner ||
//            $object instanceof Placement ||
//            $object instanceof PlacementBanner ||
//            $object instanceof AdCompany

    }


    /**
     * Делаем запрос к nodjs на обновление данных
     * @param $object
     */
    private function sendRefresRequestToNodJS($arr)
    {

        $params = parse_url($this->parameters['nodejs_server']);
        $content = http_build_query($arr);

        $fp = @fsockopen($params['host'], $params['port']);
        if ($fp) {
            fwrite($fp, "POST /refresh HTTP/1.1\r\n");
            fwrite($fp, "Host: {$params['host']}\r\n");
            fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
            fwrite($fp, "Content-Length: " . strlen($content) . "\r\n");
            fwrite($fp, "Connection: close\r\n");
            fwrite($fp, "\r\n");
            fwrite($fp, $content);      //сразу закрываем не дождавшись ответа
        } else {
            //сервер nodejs лежит
            throw new \Exception('Server NodeJs is down!');
        }
    }


}