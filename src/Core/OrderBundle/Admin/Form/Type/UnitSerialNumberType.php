<?php

/**
 *  Тип формы для отображениря/редактирвания серийных номеров для товарных позиций
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

class UnitSerialNumberType extends AbstractType {

    protected $serialsStats = array(); //чтобы не подключать библиотеки несколько раз ведём статистику
    private $order_logic;
    private $compositions;

    public function __construct($order_logic, $em) {
        $this->order_logic = $order_logic;
        $this->em = $em;
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        //проверяем есть ли уже в форме подобный элемент редактирования
        $uniqid = $view->vars['sonata_admin']['admin']->getUniqid();
        if (isset($this->serialsStats[$uniqid])) {
            $firstSerials = false;
        } else {
            $firstSerials = true;
            $this->serialsStats[$view->vars['sonata_admin']['admin']->getUniqid()] = true;
        }

        $view->vars['firstSerials'] = $firstSerials;
        $view->vars['globalUniqid'] = $options['parent_form']->getAdmin()->getUniqid();

        $obj = $view->vars['sonata_admin']['admin']->getSubject();

        //отлавливаем ситуацию когда статус отгружено выставили, но не сохранилось по причине отгрузки.
        //Это нужно, чтобы дать возможность редактировать серийники
        $uof = $this->em->getUnitOfWork();
        $uof->computeChangeSets();
        $res = $uof->getEntityChangeSet($obj->getOrder());        
        if (isset($res['isShippedStatus']) && !$res['isShippedStatus'][0] && $res['isShippedStatus'][1]) {
            $view->vars['isShippedStatusSaved'] = false;
        } else {
            $view->vars['isShippedStatusSaved'] = true;
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $order_logic = $this->order_logic;
        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($order_logic, $options, $builder) {
                    $data = $event->getData();
                    //чтобы не было ошибки формата, передаём NULL а сохранение делаем в сервисе
                    $event->setData(null);
                });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {

        // Добавляем опции в разрешимый список
        $defaults =
                array(
                    'parent_form' => false,
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * Родительский тип формы
     */
//    public function getParent() {
//        return 'sonata_type_collection';
//    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'unit_serial_number';
    }

}