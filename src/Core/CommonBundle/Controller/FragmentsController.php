<?php

/**
 * Используется для выдачи общих, не сложных фрагментов страниц.
 * Необходим в том случае, когда нужно не просто отрендерить шаблон, но и передать обработанные данные
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use  Core\CacheBundle\Logic\CacheLogic;

class FragmentsController extends Controller
{

    /**
     * Шапка
     */
    public function headerAction($request = null)
    {
        $response = $this->render('CoreCommonBundle:Fragments:header.html.twig');

        return $response;
    }


    /**
     * Футер
     */
    public function footerAction($request = null)
    {
        $response = $this->render('CoreCommonBundle:Fragments:footer.html.twig');

        return $response;
    }

}
