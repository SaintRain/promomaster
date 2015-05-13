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




//    /**
//     * 404 ошибка, метод используется для внутреннего перенаправления
//     * @return type
//     */
//    public function error404Action(Request $request)
//    {
//        $res = $this->render('CoreCommonBundle:Pages:error404.html.twig', ['request'=>$request]);
//    }
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
