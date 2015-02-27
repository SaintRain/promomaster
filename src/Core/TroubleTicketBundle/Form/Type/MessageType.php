<?php

/**
 * Форма для ответов на тикеты
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Core\TroubleTicketBundle\Entity\Log;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('body','textarea',array('attr' => array('class' => 'text_input','placeholder' => 'Ваш комментарий...')));

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $data->setTroubleTicket($options['troubleTicket']);
            $data->setBody($data->getBody());
            $options['troubleTicket']->setUpdatedDateTime(new \DateTime());
            $options['troubleTicket']->setAdminAnswers();
            $options['troubleTicket']->setIsAdminAnswer(true);
            $log = new Log();
            $log->setDate(new \DateTime());
            $log->setChanges(array());
            $log->setTroubleTicket($options['troubleTicket']);
            $options['troubleTicket']->addLog($log);
            $data->setLog($log);
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'Core\TroubleTicketBundle\Entity\Message',
            'validation_groups' => array('Frontend', 'Default'),
            'troubleTicket' => null
        ));
    }
    
    public function getName()
    {
        return 'message';
    }

}
