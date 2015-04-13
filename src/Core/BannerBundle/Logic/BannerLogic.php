<?php
/**
 * Логика для баннеров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Logic;


class BannerLogic
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
        $filterRequest=[
            'maxResults'=>10,
            'user'=>$this->container->get('security.context')->getToken()->getUser()
        ];
//        sort_field_name: knp_sort          # sort field query parameter name
//        sort_direction_name: direction # sort direction query parameter name

        $queryBuilder = $this->em->getRepository('CoreBannerBundle:CommonBanner')->generateQueryBuilderByFilter($filterRequest);




        $sites = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);
        return $sites;

    }

    /**
     * Постраничная навигация заглушки
     * @param $page
     */
    public function getGagsInCabinetForPage($page)
    {
        $filterRequest=[
            'maxResults'    => 10,
            'user' => $this->container->get('security.context')->getToken()->getUser(),
            'isGag' => true
        ];
//        sort_field_name: knp_sort          # sort field query parameter name
//        sort_direction_name: direction # sort direction query parameter name

        $queryBuilder = $this->em->getRepository('CoreBannerBundle:CommonBanner')->generateGagQueryBuilderByFilter($filterRequest);




        $sites = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);
        return $sites;

    }



}