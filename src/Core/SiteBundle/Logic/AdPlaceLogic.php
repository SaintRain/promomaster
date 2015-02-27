<?php
/**
 * Логика для рекламных мест
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Logic;


class AdPlaceLogic
{
    private $router;
    private $request;
    private $em;
    private $container;
    private $paginator;


    public function __construct($router, $em, $container, $paginator)
    {
        $this->router = $router;
        $this->em = $em;
        $this->container = $container;
        $this->paginator = $paginator;
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

        $queryBuilder = $this->em->getRepository('CoreSiteBundle:AdPlace')->generateQueryBuilderByFilter($filterRequest);
        $sites = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);
        return $sites;
    }


    /**
     * Проставляет автоматический размер
     * @param $adplace
     */
    public function setAuthoSize($adplace)
    {
        if ($adplace->getSize() && $adplace->getSize()->getName() != 'specialnoe') {
            $adplace->setWidth($adplace->getSize()->getWidth());
            $adplace->setHeight($adplace->getSize()->getHeight());
            return true;
        } else return false;
    }


}