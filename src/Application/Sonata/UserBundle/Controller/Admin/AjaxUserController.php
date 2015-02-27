<?php

/**
 * Контроллер для работы с контрагентами по ajax запросам
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxUserController extends Controller
{
    public function loginAction()
    {
        if (!$this->getUser()) {
            $request = $this->get('request_stack')->getCurrentRequest();
            ldd($request->request->all());
        
        }

        return true;
    }
}
