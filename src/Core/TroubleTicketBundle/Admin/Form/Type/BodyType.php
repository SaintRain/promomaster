<?php

/**
 * Форма тела траблтикета (Не испольузется)
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Core\TroubleTicketBundle\Form\DataTransformer\TicketBodyTransformer;

class BodyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new TicketBodyTransformer();
        $builder->add($builder->create('body', 'ckeditor', array(
				'label' => 'Описание',
                                'required' => false,
                                'config_name' => 'trouble_ticket',
                                'config' => array('width' => 767, 'height' => 300)))//->addViewTransformer($transformer)
                       )
        ;
    }

    public function getName()
    {
        return 'trouble_ticket_body';
    }
}
