<?php

/**
 *  Тип формы для отображениря/редактирвания состава заказа
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

class ProductsInOrderType extends AbstractType
{

    private $logic;
    private $em;
    private $allStocks;

    public function __construct($logic, $em)
    {
        $this->logic = $logic;
        $this->em = $em;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        //берём все склады
        if (!count($this->allStocks)) {
            $this->allStocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->findAll();
        }
        $view->vars['stocks'] = $this->allStocks;
        $order = $options['sonata_field_description']->getAdmin()->getSubject();
        //если добавление новой товарной позиции по аджаксу, то вычисляем стоимость заказа
        if (!isset($order->costInfo)) {
            $order->costInfo = $this->logic->computeOrderCostInfo($options['sonata_field_description']->getAdmin()->getSubject());
        }
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $fieldDescription = $options['sonata_field_description'];
        $associoation = $fieldDescription->getAssociationMapping();
        $options['namespace_to_attach'] = $associoation['sourceEntity'];

        // Объект для инициализации формы и ее расширения
        $listener = new ResizeFormListener(
                $builder->getFormFactory(), 'sonata_type_admin', array(
            'sonata_field_description' => $fieldDescription,
            'data_class' => $associoation['targetEntity'],
            'auto_initialize' => $options['type_options']['auto_initialize']
                ), true // запрещаем/разрешаем изменение формы (modifiable)
        );
        $builder->addEventSubscriber($listener);
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        // Добавляем опции в разрешимый список
        $defaults = array(
            'width' => '100%',
            'hide_field' => array(),
            'by_reference' => true,
            'required' => false,
            'type_options' => array(
                'auto_initialize' => false,
            ),
            'attr' => array(
                'multiple' => true,
            )
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'sonata_type_collection';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'products_in_order';
    }

}
