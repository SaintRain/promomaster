<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageType
 *
 * @author Sergeev A.M.
 */

namespace Core\TroubleTicketBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Security\Core\SecurityContext;

class MessageType extends AbstractType
{
    private $securityContext;

    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder/*->add('body', 'ckeditor', array(
				'label' => 'Описание',
                                'required' => false,
                                'config_name' => 'trouble_ticket',
                                'config' => array('width' => 767, 'height' => 100)))
         *
         */     ->add('body', 'textarea', array('required' => false, 'attr' => ['class' => 'span11', 'rows' => '5']))
                ->add('manager', 'entity', array(
                                'required' => false,
                                'class' => 'Application\Sonata\UserBundle\Entity\User'
                                ))
                ->add('troubleTicket', 'entity', array(
                                'required' => false,
                                'class' => 'Core\TroubleTicketBundle\Entity\TroubleTicket'
                                ));
        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
           $data = $event->getData();
           if ($data->getBody() && !$data->getId()) {
               $data->setTroubleTicket($options['troubleTicket']);
               $data->setManager($this->securityContext->getToken()->getUser());
               $data->setDate($options['dateTime']);
               $log = $options['logEntity'];
               $options['troubleTicket']->setIsAdminAnswer(false);
               if (!$data->getLog()){
                   $data->setLog($log);
               }
           } else {
               $event->getForm()->getParent()->remove('messages');
           }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\TroubleTicketBundle\Entity\Message',
            'cascade_validation' => true,
            'troubleTicket' => null,
            'dateTime'  => null,
            'logEntity' => null
        ));
    }
    
    public function getName()
    {
        return 'trouble_ticket_message';
    }

}

?>
