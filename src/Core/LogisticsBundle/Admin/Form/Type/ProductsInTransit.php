<?php

/**
 *  Продукты в транзите
 * 
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class ProductsInTransit extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $obj = $view->vars['sonata_admin']['admin']->getSubject();
        $inTransit = [];
        if ($obj->getBooking()) {
            foreach ($obj->getBooking() as $book) {
                $p_id = $book->getComposition()->getProduct()->getId();
                $inTransit[$p_id]['booking'][] = $book;

                if (!isset($inTransit[$p_id]['total'])) {
                    $inTransit[$p_id]['total'] = 0;
                    $inTransit[$p_id]['product'] = $book->getComposition()->getProduct();
                }
                $inTransit[$p_id]['total']+=$book->getQuantity();
            }
        }

        $view->vars['inTransit'] = $inTransit;
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'products_in_transit';
    }

}
