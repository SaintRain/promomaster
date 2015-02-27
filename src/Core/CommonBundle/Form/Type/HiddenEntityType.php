<?php

/**
 * Тип формы для скрытой сущности
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;

class HiddenEntityType extends AbstractType
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
            $data = $event->getData();
            if (null !== $data) {
                $event->setData($this->transform($data));
            } else {
                $event->setData(null);
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            if (null !== $data) {
                $event->setData($this->reverseTransform($data, $options['class']));
            }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->replaceDefaults(array(
            'class' => null,
        ));
    }

    public function getName()
    {
        return 'hidden_entity_form';
    }

    public function getParent()
    {
        return 'hidden';
    }

    private function transform($value)
    {

        return ($value) ? $value->getId() : null;
    }

    private function reverseTransform($value, $class) {
        if ($value) {
            $value = $this->em->getRepository($class)->find((int)$value);
        } else {
            $value = null;
        }

        return $value;
    }
}