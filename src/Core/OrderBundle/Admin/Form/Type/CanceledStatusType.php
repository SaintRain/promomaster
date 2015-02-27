<?php

/**
 *  Тип формы для отображениря/редактирвания статуса отмены
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Sonata\CoreBundle\Form\EventListener\ResizeFormListener;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Builder\FormContractorInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Core\OrderBundle\Admin\Form\Mapper\ProductInOrderFormMapper;

class CanceledStatusType extends AbstractType
{

    private $order_logic;
    private $em;
    private $container;

    public function __construct($order_logic, $em, $container)
    {
        $this->order_logic = $order_logic;
        $this->em = $em;
        $this->container = $container;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['reasons'] = $this->em->getRepository('CoreOrderBundle:CanceledReason')->findAll();
        $view->vars['stocks'] = $this->em->getRepository('CoreLogisticsBundle:Stock')->findAll();
        $view->vars['attr']['class'] = 'cancelledStatus';    //скрываем старый select2

        $obj = $view->vars['sonata_admin']['admin']->getSubject();

        $uof = $this->em->getUnitOfWork();
        $uof->computeChangeSets();
        $res = $uof->getEntityChangeSet($obj);

        if (isset($res['reasonForCanceling']) && !$res['reasonForCanceling'][0] && $res['reasonForCanceling'][1]) {
            $view->vars['noDisable'] = true;
        } else {
            $view->vars['noDisable'] = false;
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $cancelExtra = $this->container->get('request')->get('cancelExtra');
            $order = $options['sonata_field_description']->getAdmin()->getSubject();

            if ($cancelExtra['reasonForCanceling']) {
                $reason = $this->em->getRepository('CoreOrderBundle:CanceledReason')->find($cancelExtra['reasonForCanceling']);
                $stockForCanceling = $this->em->getRepository('CoreLogisticsBundle:Stock')->find($cancelExtra['stockForCanceling']);

                $cancelExtra['keepMoneySumForCanceling'] = str_replace(',', '.', $cancelExtra['keepMoneySumForCanceling']);
                $order->setReasonForCanceling($reason)
                        ->setStockForCanceling($stockForCanceling)
                        ->setKeepMoneySumForCanceling($cancelExtra['keepMoneySumForCanceling'])
                        ->setCommentForCanceling($cancelExtra['commentForCanceling']);
            }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        // Добавляем опции в разрешимый список
        $defaults = array(
           
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'checkbox';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'canceled_status';
    }

}
