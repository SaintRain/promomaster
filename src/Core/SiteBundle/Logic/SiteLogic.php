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
     * Смотрим если обновились данные, то делаем запрос в NodeJS, чтобы тот обновил
     * актуальность своих данных
     * @param $object
     */
    public function checkRefreshDataNodJs($object)
    {

        if ($object instanceof CommonSite ||
            $object instanceof AdPlace ||
            $object instanceof Section ||
            $object instanceof CommonBanner ||
            $object instanceof Placement ||
            $object instanceof PlacementBanner ||
            $object instanceof AdCompany

        ) {

            $this->sendRefresRequestToNodJS($object);
        }

    }


    /**
     * Делаем запрос к nodjs на обновление данных
     * @param $object
     */
    private function sendRefresRequestToNodJS($object)
    {

        $arr = explode('\\', get_class($object));
        $entityName = $arr[count($arr) - 1];
        $url = $this->parameters['nodejs_server'] . '/refresh?id=' . $object->getId() . '&entityName=' . $entityName;

        file_get_contents($url);
    }


}