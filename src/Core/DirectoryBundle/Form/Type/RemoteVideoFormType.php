<?php

/**
 * Форма для видео с хостингов
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityManager;

class RemoteVideoFormType extends AbstractType
{
    protected $em;

    protected $hostings;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->hostings = $this->em->getRepository('CoreDirectoryBundle:VideoHosting')->findAll();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('captionRu', null, array('label' => 'Название'))
            ->add('code', null, array('label' => 'Код', 'attr' => ['class' => 'remote_code']))
            ->add('videoHosting', 'entity', array(
                                'empty_value' => 'Необходимо выбрать',
                                'label' => 'Видео-хостинг',
                                'choices' => $this->hostings,
                                'class' => 'CoreDirectoryBundle:VideoHosting',
                                'property' => 'name',
                                'attr' => ['class' => 'video_hosting', 'data-extra' => ['name']]
                ))
        ;
        /*
        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            echo 'here';
            ldd($data);
        });
        */

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\DirectoryBundle\Entity\RemoteVideo',
            'hostings' => array()
        ));
    }

    public function getName()
    {
        return 'remote_video_form';
    }

    public function buildView(\Symfony\Component\Form\FormView $view, \Symfony\Component\Form\FormInterface $form, array $options)
    {
        $view->vars['hostings'] = $this->hostings;
    }

    private function getHostings($hostings, $isChoices = true)
    {
        $result = [];
        foreach($hostings as $hosting) {
            if ($isChoices) {
                $result[$hosting->getId()] = $hosting;
            } else {
                $result[$hosting->getId()] = $hosting->getName();
            }
            
        }

        return $result;
    }
}
