<?php

/**
 *  Тип формы для отображениря/редактирвания статуса списания
 * 
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Type;

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

class UnitInStockDefectType extends AbstractType {

    private $em;
    private $container;

    public function __construct($em, $container) {
        $this->em = $em;
        $this->container = $container;
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['reasons'] = $this->em->getRepository('CoreLogisticsBundle:UnitInStockDefectReason')->findAll();
        $view->vars['attr']['class'] = 'defectStatus';    

        $obj = $view->vars['sonata_admin']['admin']->getSubject();

        $uof = $this->em->getUnitOfWork();
        $uof->computeChangeSets();
        $res = $uof->getEntityChangeSet($obj);

        if (isset($res['isWithDefect']) && !$res['isWithDefect'][0] && $res['isWithDefect'][1]) {
            $view->vars['noDisable'] = true;
        } else {
            $view->vars['noDisable'] = false;
        }
 

    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $defectExtra = $this->container->get('request')->get('defectExtra');
            $object = $options['sonata_field_description']->getAdmin()->getSubject();

            if ($defectExtra['defectReason']) {
                $reason = $this->em->getRepository('CoreLogisticsBundle:UnitInStockDefectReason')->find($defectExtra['defectReason']);
                $object->setDefectReason($reason);
            }
        });
    }

    /**
     * Родительский тип формы
     */
    public function getParent() {
        return 'checkbox';
    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'unit_in_stock_defect';
    }

}
