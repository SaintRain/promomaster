<?php

/**
 * Форма доставка - получатель
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\OrderBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Core\OrderBundle\Form\DataTransformer\FioTransformer;

class PreOrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new FioTransformer();
        $builder->add('email', 'email', array('label' =>'order.form.preOrder.email', 'required' => true, 'attr' => ['class' => 'contactEmail email text_input_rounded']))
            ->add('phone', 'text', array('required' => false, 'label' =>'order.form.preOrder.phone', 'attr' => ['class' => 'phone text_input_rounded phone']))
            ->add('address','text', array('label' =>'order.form.preOrder.address', 'required' => true, 'attr' => ['class' => 'address text_input_rounded']))
            ->add('fio', 'text', array('label' =>'order.form.preOrder.fio', 'required' => true, 'attr' => ['class' => 'fio text_input_rounded']))
            ->add('compositions', 'collection', array(
                    'type'   => 'pre_order_composition_form',
                    'cascade_validation' => true,
                    'required' => true,
                    'options'  => ['required'  => true, 'cascade_validation' => true]
            ))
            
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            $data = $event->getData();
            $form->add('city', 'ajax_entity', [
                        'class' => 'Core\DirectoryBundle\Entity\City',
                        'label' => 'Город',
                        'attr' => ['class'=> 'search-input city', 'data-city' => ($data && $data->getCity()) ? $data->getCity()->getId() : null],
                        'translationDomain' => 'ApplicationSonataUserBundle',
                        'add_to_query' => array(
                            'where' => array(
                                'andWhere' => array(
                                    'country.id = 190'
                        ))),
                        'required' => true,
                        'frontend' => true,
                        'properties' => [
                            'id' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'full',
                            ),
                            'name' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'left',
                            ),
                            'area' => array(
                                'search' => false,
                                'return' => true,
                                'entry' => 'left',
                            ),
                          ],
                        'select2_constructor' => array(
                            'width' => '240px',
                            'dropdownCssClass' => 'rounded_drop',
                            'dropdownAutoWidth' => true,
                            //'placeholder' => 'form.label.address.cityPlaceholder',
                            'minimumInputLength' => 1),
                    ])
            ;
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\OrderBundle\Entity\PreOrder\PreOrder'
        ));
    }

    public function getName()
    {
        return 'pre_order_form';
    }
}