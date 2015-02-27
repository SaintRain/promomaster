<?php

/**
 * Выдача страниц связанных с рекламной компанией
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{

    /**
     * Добавление рекламной компании
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cabinetAdAdCompanyAction()
    {
        return $this->render('CoreCommonBundle:Pages:index2.html.twig');
    }


}
