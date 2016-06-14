<?php
/**
 * Логика для рекламных кампаний
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Logic;


class AdCompanyLogic
{
    private $router;
    private $request;
    private $em;
    private $container;
    private $paginator;
    private $placement_logic;


    public function __construct($router, $em, $container, $paginator, $placement_logic)
    {
        $this->router = $router;
        $this->em = $em;
        $this->container = $container;
        $this->paginator = $paginator;
        $this->placement_logic = $placement_logic;

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

        $queryBuilder = $this->em->getRepository('CoreAdCompanyBundle:AdCompany')->generateQueryBuilderByFilter($filterRequest);
        $adCompanies = $this->paginator->paginate($queryBuilder, $page, $filterRequest['maxResults']);


        //для каждой рекламной кампании определяем активна она или нет
        foreach ($adCompanies as $adComp) {
            $isActive = true;

            if (!$adComp->getIsEnabled()) {
                $isActive = false;
            } else {

                //проверяем все размещения на активность
                $isHaseActivePlacement = false;
                foreach ($adComp->getPlacements() as $placement) {
                    $isHaseActivePlacement = $this->placement_logic->checkIsPlacementActive($placement);
                    $isActive = $isHaseActivePlacement;
                    if ($isActive) {
                        break;
                    }
                }

                $adComp->setIsActive($isActive);
            }
        }
        return $adCompanies;
    }



    /**
     * Проверяет есть ли у пользователя рекламная кампания с таким именем
     * @param $domain
     * @return mixed
     */
    public function checkIsExistAdCompany($adcompany, $user)
    {

        $res = $this->em->getRepository('CoreAdCompanyBundle:AdCompany')
            ->findQuantityByOptions(['id' => $adcompany->getId(), 'user' => $user, 'name' => $adcompany->getName()]);

        if ($res['quantity']) {
            return true;
        } else {
            return false;
        }
    }


}