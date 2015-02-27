<?php

/**
 *  Дополнительные проверки для заказа на бронь и прочее
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Core\LogisticsBundle\Entity\Transit;

class OrderExtraValidator extends ConstraintValidator
{

    private $order_logic;
    private $validator;
    private $container;
    private $router;

    public function __construct($order_logic, $validator, $container, $router)
    {
        $this->order_logic = $order_logic;
        $this->validator = $validator;
        $this->container = $container;
        $this->router = $router;
    }

    public function validate($object, Constraint $constraint)
    {

        $request = $this->container->get('request');
        $routeName = $request->get('_route');

        if ($routeName == 'sonata_admin_append_form_element') {
            $new_row = true;
        }
        else {
            $new_row = false;
        }

        // Проверка на возможность пометить заказ как "Оплачен"
        $response = $this->container->get('core_order_logic')->validPaidStatus($object);
        if (isset($response['error'])) {
            foreach ($response['error'] as $e) {
                $this->context->buildViolation($e)
                    ->atPath('isPaidStatus')
                    ->addViolation();
            }
        } elseif (!$new_row && !$this->context->getViolations()->count()) {

            $res = $this->order_logic->updateBookingOrderCompositions($object);

            if (count($res)) {
                foreach ($res as $r) {
                    if (isset($r['NotSetAllSerialsForRealUnits'])) {
                        $this->context->buildViolation('Нельзя отгрузить заказ, т.к. не все серийные номера указаны!')
                            ->atPath('compositions')
                            ->addViolation();
                    } else {
                        if (isset($r['NotSelectedDefaultSupplier'])) {
                            $object->setShippedDateTime(null);
                            if ($r['NotSelectedDefaultSupplier']->getProduct()->getArticle()) {
                                $art = $r['NotSelectedDefaultSupplier']->getProduct()->getArticle() . ', ';
                            } else {
                                $art = '';
                            }
                            $p_caption = $art . $r['NotSelectedDefaultSupplier']->getProduct()->getCaptionRu();
                            $error = 'Необходимо в составе заказа для продукта «' . $p_caption . '». выбрать поставщика! Иначе поставки не будут созданы.';
                            $this->context->buildViolation($error)
                                ->atPath('compositions')
                                ->addViolation();
                        } else {
                            if (isset($r['NotEnoughUnits'])) {
                                if ($r['NotEnoughUnits']->getProduct()->getArticle()) {
                                    $art = $r['NotEnoughUnits']->getProduct()->getArticle() . ', ';
                                } else {
                                    $art = '';
                                }
                                $p_caption = $art . $r['NotEnoughUnits']->getProduct()->getCaptionRu();
                                $error = 'Нет реальных позиций на складе для товара «' . $p_caption . '». Необходимо создать реальную поставку!';
                                $this->context->buildViolation($error)
                                    ->atPath('compositions')
                                    ->addViolation();
                            } else {
                                if (isset($r['NotEnoughRealProducts'])) {
                                    if ($r['NotEnoughRealProducts']->getComposition()->getProduct()->getArticle()) {
                                        $art = $r['NotEnoughRealProducts']->getComposition()->getProduct()->getArticle() . ', ';
                                    } else {
                                        $art = '';
                                    }

                                    $p_caption = $art . $r['NotEnoughRealProducts']->getComposition()->getProduct()->getCaptionRu();
                                    $error = 'Нельзя изменить количество товарных позиций «' . $p_caption . '», т.к. товар отправлен в транзит и на складе нет достаточного количества реальных позиций !';
                                    $this->context->buildViolation($error)
                                        ->atPath('compositions')
                                        ->addViolation();
                                } else {
                                    if ($r['product']->getArticle()) {
                                        $art = $r['product']->getArticle() . ', ';
                                    } else {
                                        $art = '';
                                    }
                                    if ($r['quantity']) {
                                        $error = 'Продукта «' . $art . $r['product']->getCaptionRu() . '» доступно только ' . $r['quantity'] . ' шт.';
                                    } else {
                                        $error = 'Продукт «' . $art . $r['product']->getCaptionRu() . '» закончился.';
                                    }
                                    $this->context->buildViolation($error)
                                        ->atPath('compositions')
                                        ->addViolation();
                                    break;
                                }
                            }
                        }
                    }
                }
            }


        }
    }

}
