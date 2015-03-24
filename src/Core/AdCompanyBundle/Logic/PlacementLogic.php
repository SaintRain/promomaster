<?php
/**
 * Логика для размещений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Logic;


class PlacementLogic
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

        $queryBuilder = $this->em->getRepository('CoreAdCompanyBundle:Placement')->generateQueryBuilderByFilter($filterRequest);
        $placements = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);

        foreach ($placements as $placment) {
            $res = $this->checkIsPlacementActive($placment);
            $placment->setIsActive($res);
        }

        return $placements;

    }


    /**
     * Проверяет идут ли показы для данного размещения
     * @param $placement
     */
    public function checkIsPlacementActive($placement)
    {
        $UTC = new \DateTimeZone('UTC');
        $now = new \DateTime();
        $now->setTimezone($UTC);
        $now = $now->getTimestamp();

        if ($placement->getIsEnabled()) {
            //проверяем по дате
            if ($placement->getStartDateTime() || $placement->getFinishDateTime()) {
                $startDate = false;
                $endDate = false;
                if (!$placement->getStartDateTime() || $now > $placement->getStartDateTime()->getTimestamp()) {
                    $startDate = true;
                }

                if (!$placement->getFinishDateTime() || $now < $placement->getFinishDateTime()->getTimestamp()) {
                    $endDate = true;
                }

                //если найден подходящий баннер по дате
                if ($startDate && $endDate) {
                    $isActiveByDate = true;
                } else {
                    $isActiveByDate = false;
                }
            } else {
                $isActiveByDate = true;
            }

            //дальше проверяем по показам
            if ($isActiveByDate) {
                //считаем сумму всех показов, однако проблема будет в том, что статистика пишется по периодам и в промежутках остается статистика,
                $clicksQuantity = 0;
                $showsQuantity = 0;
                foreach ($placement->getStatistics() as $s) {
                    $showsQuantity += $s->getShowsQuantity();
                    $clicksQuantity += $s->getClicksQuantity();
                }

                if ($placement->getQuantityModel()->getName() == 'showsquantity' && $showsQuantity < $placement->getQuantity()) {
                    $isActive = true;
                } else if ($placement->getQuantityModel()->getName() == 'clicksquantity' && $clicksQuantity < $placement->getQuantity()) {
                    $isActive = true;
                }
                else {
                    $isActive = false;
                }
            } else {
                $isActive = false;
            }
        } else {
            $isActive = false;
        }
        return $isActive;
    }

}