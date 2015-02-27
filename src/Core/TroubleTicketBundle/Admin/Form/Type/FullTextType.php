<?php

/**
 * Форма для поиска по в админке
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Security\Core\SecurityContext;

class FullTextType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('anyField','text',array('attr'=>array('placeholder'=>'Содержимое')))
                ->add('fieldChooser', 'choice', array(
                            'choices'=>$this->getChoices(),
                            'expanded' => true, 
                            'required' => true,
                            'data' => array(0 =>'title'),
                            'multiple' => true));
        ;
    }

    public function getName()
    {
        return 'full_text';
    }


    protected function getChoices()
    {
        return array('title'=>'Заголовок', 'body'=> 'Содержимое', 'messages'=>'Ответы');
    }

}