<?php

/**
 * Twig расширения для быстрого перехода на редактирование элементов контента
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Twig\Extension;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Sonata\AdminBundle\Admin\Admin;

class FastEditExtension extends \Twig_Extension {

    const tagName = 'data-fastedit';

    private $container;
    private $routes = [];
    private $canEdit=false;

    public function getFunctions() {
        return array(
            'fastEdit' => new \Twig_Function_Method($this, 'fastEditFunction', array('is_safe' => array('html'))),
            'fastEditInit' => new \Twig_Function_Method($this, 'fastEditInitFunction', array('is_safe' => array('html'))),
        );
    }

    public function __construct($container) {
        $this->container = $container;
    }

    /**
     * Генерация свойства по которому возможно быстрое редактирование
     * @param type $route
     * @param type $options
     * @return string
     */
    public function fastEditFunction($object) {

        if ($this->canEdit && is_object($object)) {
            $classname = get_class($object);

            //берём предыдущий класс
            if (strpos($classname, 'Proxies\\__CG__\\') !== false) {
                $classname = get_parent_class($object);
            }

            if (!isset($this->routes[$classname])) {
                $adminClasses = $this->container->get('sonata.admin.pool')->getAdminClasses();

                //ищем по подклассам
                if (!isset($adminClasses[$classname])) {

                    $find = false;
                    foreach ($adminClasses as $classMain => $service) {
                        $subClasses = $this->container->get($service[0])->getSubClasses();
                        if (is_array($subClasses)) {
                            foreach ($subClasses as $key => $subClass) {
                                if ($classname == $subClass) {
                                    $find = true;
                                    break;
                                }
                            }
                        }
                        if ($find) {
                            $classname = $classMain;
                            break;
                        }
                    }
                }
                preg_match(Admin::CLASS_REGEX, $classname, $matches);

                if (!$matches) {
                    throw new \RuntimeException(sprintf('Для сущности ' . $classname . ' не найден админский клас!'));
                }

                $route = sprintf('admin_%s_%s_%s_edit', $this->urlize($matches[1]), $this->urlize($matches[3]), $this->urlize($matches[5]));
                $this->routes[$classname] = $route;
            } else {
                $route = $this->routes[$classname];
            }

            $url = $this->container->get('router')->generate($route, ['id' => $object->getId()]);
            $tag = ' ' . $this::tagName . '="' . $url . '"';

            return $tag;
        } else {
            return '';
        }
    }

    public function urlize($word, $sep = '_') {
        return strtolower(preg_replace('/[^a-z0-9_]/i', $sep . '$1', $word));
    }

    /**
     * Инициализация для быстрого редактирования
     * @return type
     */
    public function fastEditInitFunction() {
        $this->checkAuthorisation();
        if ($this->canEdit) {
            $html = $this->container->get('templating')->render('CoreCommonBundle:TwigExtensions:fastEditInit.html.twig', ['tagName' => $this::tagName]);
            return $html;
        }
    }

    /**
     * Проверяет права пользователя на возможность редактировать
     */
    public function checkAuthorisation() {
        if (is_object($this->container->get('security.context')->getToken()) && ($this->container->get('security.context')->isGranted('ROLE_SUPER_ADMIN') ||
                (is_object($this->container->get('security.context')->getToken()->getUser()) && $this->container->get('security.context')->getToken()->getUser()->hasRole('CAN_FASTEDIT')))) {
            $this->canEdit = true;
        } else {
            $this->canEdit = false;
        }
//        ld($this->canEdit);
    }

    public function getName() {
        return 'fastedit_extension';
    }

}
