<?php

/**
 * Выдача площадок на фронтенде
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Core\SiteBundle\Entity\WebSite;
use Core\SiteBundle\Form\Type\SiteFormType;
use Core\SiteBundle\Model\SearchFilter;
use Core\SiteBundle\Form\Type\SearchFilterFormType;

class SiteController extends Controller
{

    public function redirectToDomainAction($siteId)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('CoreSiteBundle:CommonSite')->find($siteId);
        return $this->redirect($site->getDomain());
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $site = $em->getRepository('CoreSiteBundle:CommonSite')->find($id);
        if (!$site) {
            throw $this->createNotFoundException('Site Not Found');
        }

        $todayStart = new \DateTime();
        $todayStart->modify('today');
        $todayEnd = clone $todayStart;
        $todayEnd->modify('tomorrow');
        $todayEnd->modify('1 second ago');

        $monthStart = new \DateTime();
        $monthStart->modify('30 day ago');


        $statistics = [
            'today' => $em->getRepository('CoreStatisticsBundle:Statistics')->getSiteStatisticsForPeriod($site, $todayStart, $todayEnd),
            'month' => $em->getRepository('CoreStatisticsBundle:Statistics')->getSiteStatisticsForPeriod($site, $monthStart, $todayStart),
            'all' => $em->getRepository('CoreStatisticsBundle:Statistics')->getSiteStatisticsForPeriod($site)
        ];

        return $this->render('CoreSiteBundle:Site:show.html.twig', ['site' => $site, 'statistics' => $statistics]);
    }

    /**
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function siteCatalogAction(Request $request, $page = 1)
    {
        $paxPerPage = 10;

        if ($request->query->get('page') && $request->query->get('page') == 1) {
            return new RedirectResponse($this->generateUrl('core_common_catalog_first_page'));
        }
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CoreCategoryBundle:SiteCategory')->getBuildTree();

        $filter = new SearchFilter();
        $filterType = new SearchFilterFormType();
        $form = $this->createForm($filterType, $filter, ['method' => 'GET', 'action' => $this->generateUrl('core_common_catalog_first_page')]);
        $form->handleRequest($request);

        if (!count($filter->getCategories()) && $filter->getSelectMainCat()) {
            $filter->setCategories($filter->getSelectMainCat()->getChildrens());
        }

        $query = $em->getRepository('CoreSiteBundle:CommonSite')->searchByFilter($filter);
        $sites = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', $page),
            $paxPerPage
        );

        $ids = [];
        foreach ($sites as $s) {
            $ids[] = $s->getId();
        }

        $statistics = $em->getRepository('CoreStatisticsBundle:Statistics')->getCommonStatisticsForSites($ids);

        return $this->render('CoreSiteBundle:Site:site_catalog.html.twig', [
            'categories' => $categories,
            'sites' => $sites,
            'statistics' => $statistics,
            'form' => $form->createView()
        ]);
    }
}
