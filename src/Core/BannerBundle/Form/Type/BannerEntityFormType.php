<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\BannerBundle\Form\Transformer\EntityToIdTransformer;


class BannerEntityFormType extends AbstractType
{

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new EntityToIdTransformer($this->objectManager, $options['class']);
        $builder->addModelTransformer($transformer);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setRequired(array('class', 'property'))
            ->setDefaults(array(
                'invalid_message' => 'The entity does not exist.',
            ))
        ;
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['field'] = $options['property'];
        $view->vars['objId'] = 0;
        $method = 'get' . ucfirst($options['property']);
        if ($form->getData() && method_exists($form->getData(), $method)) {
            $view->vars['field'] = $form->getData()->$method();
            $view->vars['objId'] = $form->getData()->getId();
        }

    }
    /*
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['field'] = $options['property'];
    }
    */

    public function getParent()
    {
        return 'hidden';
    }

    public function getName()
    {
        return 'banner_entity';
    }
}