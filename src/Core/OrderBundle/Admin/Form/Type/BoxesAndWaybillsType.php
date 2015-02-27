<?php

/**
 *  Тип формы для отображениря/редактирования
 *  траспортных накладных и упаковок
 *
 * @author Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\CoreBundle\Form\EventListener\ResizeFormListener;

class BoxesAndWaybillsType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        $listener = new ResizeFormListener(
            $builder->getFormFactory(),
            $options['type'],
            $options['type_options'],
            $options['modifiable']
        );
         *
         */
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


        /*
        // Объект для инициализации формы и ее расширения
        $listener = new ResizeFormListener(
                $builder->getFormFactory(), 'sonata_type_admin', array(
            'sonata_field_description' => $fieldDescription,
            'data_class' => $associoation['targetEntity'],
            'auto_initialize' => $options['type_options']['auto_initialize']
                ), true // запрещаем/разрешаем изменение формы (modifiable)
        );
         * 
         */
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['btn_add'] = $options['btn_add'];
        $view->vars['btn_catalogue'] = $options['btn_catalogue'];
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'modifiable'    => false,
            'type'          => 'text',
            'type_options'  => array(
                'auto_initialize' => false
            ),
            'btn_add'       => 'link_add',
            'btn_catalogue' => 'SonataCoreBundle'
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'boxes_and_waybills_type';
    }

    /**
     * Родительский тип формы
     */
    public function getParent() {
        return 'sonata_type_collection';
    }
}
