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

class AjaxContragentAdminController extends Controller
{

    /**
     * Получение данных для вывода истории изменения баланса в админке
     */
    public function balanceHistoryUpdateAction(Request $request, $customerId, $sellerId)
    {
        $data = $this->get('core_payment_logic')->getBalanceHistoryAdmin($customerId, ['sellerId' => $sellerId]);

        return $this->render('ApplicationSonataUserBundle:Admin\Form:balance_history_tbody.html.twig', array(
                'balanceHistory' => $data['balanceHistory'],
        ));
    }

}
