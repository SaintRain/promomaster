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
    public function siteCatalogAction($slug, Request $request)
    {
        if ($request->query->get('page') && $request->query->get('page') == 1) {
            return new RedirectResponse($this->generateUrl('core_common_catalog', ['slug' => $slug]));
        }
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CoreCategoryBundle:SiteCategory')->getBuildTree();
        if ($slug) {
            $curCategory = $em->getRepository('CoreCategoryBundle:SiteCategory')->findOneBy(['slug' => $slug]);
            $query = $em->getRepository('CoreSiteBundle:CommonSite')->findForCategory($slug);
        } else {
            $query = $em->getRepository('CoreSiteBundle:CommonSite')->findBy(['isVerified' => true]);
        }

        $sites = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', 1),
            15
        );

        return $this->render('CoreCommonBundle:Pages:site_catalog.html.twig', [
            'categories' => $categories,
            'parentSlug' => $this->getParentSLug($slug),
            'curCategory' => (isset($curCategory)) ? $curCategory : null,
            'curSlug' => (!$slug) ? null : $slug,
            'sites' => $sites
        ]);
    }

    private function getParentSLug($slug)
    {
        if (!$slug) {
            return null;
        }

        $site = $this->getDoctrine()->getManager()->getRepository('CoreCategoryBundle:SiteCategory')
            ->findOneBy(['slug' => $slug]);
        if ($site->getParent()) {
            return $site->getParent()->getSlug();
        }
        return null;
    }
    /**
     * 404 ошибка, метод используется для внутреннего перенаправления
     * @return type
     */
    public function error404Action(Request $request)
    {
        return  $this->render('TwigBundle:Exception:error404.html.twig', ['request'=>$request]);
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
