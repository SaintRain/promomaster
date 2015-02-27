<?php

/**
 *  Тип формы для отображениря/редактирвания дополнительного статуса
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
use Core\OrderBundle\Admin\Form\DataTransformer\ExtraStatusTransformer;

class ExtraStatusType extends AbstractType
{

    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new ExtraStatusTransformer($this->em);
        $builder->addModelTransformer($transformer);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['options'] = $options;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'extraStatusesData' => [],
        ));
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'extra_status';
    }

}
