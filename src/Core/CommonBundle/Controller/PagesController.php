<?php

/**
 * Выдача простых текстовых страниц...
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\SiteBundle\Model\SearchFilter;
use Core\SiteBundle\Form\Type\SearchFilterFormType;

class PagesController extends Controller
{

    public function indexAction()
    {
        return $this->render('CoreCommonBundle:Pages:index.html.twig');
    }

    public function testAction()
    {
        return $this->render('CoreCommonBundle:Pages:test.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('CoreCommonBundle:Pages:about.html.twig');
    }

    public function advertisersAction()
    {
        return $this->render('CoreCommonBundle:Pages:forAdvertisers.html.twig');
    }

    public function webmastersAction()
    {
        return $this->render('CoreCommonBundle:Pages:forWebmasters.html.twig');
    }

    public function agenciesAction()
    {
        return $this->render('CoreCommonBundle:Pages:forAgencies.html.twig');
    }

    public function termsAction()
    {
        return $this->render('CoreCommonBundle:Pages:terms.html.twig');
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

        if (!$filter->getCategories() && $filter->getSelectMainCat()) {
            $res = $em->getRepository('CoreCategoryBundle:SiteCategory')->children($filter->getSelectMainCat());
            $filter->setCategories($res);
        }
        $query = $em->getRepository('CoreSiteBundle:CommonSite')->searchByFilter($filter);
        $sites = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', $page),
            $paxPerPage
        );

        return $this->render('CoreCommonBundle:Pages:site_catalog.html.twig', [
            'categories' => $categories,
            'sites' => $sites,
            'form' => $form->createView()
        ]);
    }


//    private function getParentSLug($slug)
//    {
//        if (!$slug) {
//            return null;
//        }
//
//        $site = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:SiteCategory')
//            ->findOneBy(['slug' => $slug]);
//        if ($site->getParent()) {
//            return $site->getParent()->getSlug();
//        }
//        return null;
//    }

    /**
     * 404 ошибка, метод используется для внутреннего перенаправления
     * @return type
     */
    public function error404Action(Request $request)
    {
        return $this->render('TwigBundle:Exception:error404.html.twig', ['request' => $request]);
    }
//
//    /**
//     * 504 ошибка, метод используется для внутреннего перенаправления
//     * @return type
//     */
//    public function error504Action()
//    {
//        return $this->render('CoreCommonBundle:Pages:error504.html.twig');
//    }
//

}
