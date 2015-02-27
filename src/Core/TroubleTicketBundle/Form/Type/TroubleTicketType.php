<?php

/**
 * Форма для создания тикетов
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityRepository;

class TroubleTicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('authorName', null, array('label'=>'Имя:', 'attr' => array('size' => '40', 'class' => 'text_input')))
                ->add('authorEmail', null, array('label'=>'E-mail:', 'attr' => array('size' => '40', 'class' => 'text_input')))
                ->add('category', null, array('label'=>'Категория вопроса:', 'empty_value' => 'Необходимо выбрать' , 'attr' => array('class' => 'text_input')))
                ->add('title', null, array('label'=>'Ваш вопрос:', 'attr' => array('class' => 'text_input', 'size' => 40)))
                ->add('body','textarea', array('label'=>'Подробное описание:', 'required' => false, 'attr' => array('class' => 'text_input textarea', 'rows' => 5, 'cols' => '50')))
                //->add('captcha', 'captcha',array('label' => 'Введите код с картинки:', 'attr' => array('class' => 'text_input', 'size' => 10)))
                ->add('file', 'multiupload_file_frontend', array(
                    'required' => false,
                    "label"=>"Прикрепить файлы (каждый до 5Mb):",
                    'attr' => array(
                        'multiple' => true,
                        ),
                    'type' => 'document',
                    'namespace_to_attach' => 'Core\TroubleTicketBundle\Entity\TroubleTicket',
                    'namespace_to_insert' => 'Core\FileBundle\Entity\DocumentFile',
                    'btnName' => 'Прикрепить файлы',
                    'btnAttr' => array(
                        'class' => 'common_button',
                    ),
                    'showStatusOfUpload' => true,
                    'showCounterOfFiles' => true,
                    'showAttachedFiles' => true,
                ))
            ->add('order', null, array(
                'required' => $options['order'] ? true : false,
                'read_only' => true,
                'attr' => array('class' => 'hidden'),
                'label' => false,
                'property' => 'id',
                'choices' => $options['order'] ? [$options['order']] : [],
//                'query_builder' => function(EntityRepository $er) use ($options) {
//                    $orderId = is_object($options['order']) ? $options['order']->getId() : 0;
//                    return $er->createQueryBuilder('o')
//                            ->where('o.id = :orderId')
//                            ->setParameter('orderId', $orderId);
//                    },
                ))
            ->add('product', null, array(
                'required' => $options['product'] ? true : false,
                'read_only' => true,
                'attr' => array('class' => 'hidden'),
                'label' => false,
                'property' => 'id',
                'choices' => $options['product'] ? [$options['product']] : [],
//                'query_builder' => function(EntityRepository $er) use ($options) {
//                    $orderId = is_object($options['order']) ? $options['order']->getId() : 0;
//                    return $er->createQueryBuilder('o')
//                            ->where('o.id = :orderId')
//                            ->setParameter('orderId', $orderId);
//                    },
                ))
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $data->setUser($options['user']);
            if ($options['user']) {
                $data->setAuthorEmail($options['user']->getEmail());
                if ($options['user']->getFullName()) {
                    $data->setAuthorName($options['user']->getFullName());
                }
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $data->setBody($data->getBody());
            $data->setStatus($options['status']);
            $data->setPriority($options['priority']);
            $data->setHash();
        });

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'Core\TroubleTicketBundle\Entity\TroubleTicket',
            'validation_groups' => array('Frontend', 'Default'),
            'status' => null, // статус по умолчанию
            'priority' => null, // приоритет по умолчанию
            'user' => null, // текущий пользователь
            'order' => null, // заказ для связи с тикетом
            'product' => null, // продукт для связи с тикетом
        ));
    }

    public function getName()
    {
        return 'trouble_ticket';
    }

    public function nl2p($str) {
        $arr = explode("\n",$str);
        $out='';

        for($i=0;$i<count($arr);$i++) {
            if(strlen(trim($arr[$i]))>0)
                $out.='<p>'.trim($arr[$i]).'</p>';
        }
        return $out;
    }

}
