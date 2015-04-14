<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityManagerInterface;
use Core\DirectoryBundle\Entity\Country;

class CountryFormType extends  AbstractType
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $form = $event->getForm();
            ldd($form);
        });

        /*
        $builder->add('country', 'entity', [
            'class'     => 'CoreDirectoryBundle:Country',
            //'property'  => 'name',
            'choices'   => $this->getChoices(),
            'expanded'  => true,
            'multiple'  => true
        ]);
        */
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'entity_class' => 'Core\DirectoryBundle\Entity\Country'
        ]);
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'country_form_frontend';
    }

    public function getChoices()
    {
        $result = [];
        $data = $this->em->getRepository('CoreDirectoryBundle:Country')->findForForm();
        for($i=1; $i<3; $i++) {
            $cur = 5*$i;

            foreach($data as $val) {
                if ($cur-- == 0) {
                    break;
                }
                if (!isset($result[($i-1) .'string'][$val->getId()])) {
                    $result[$i .'string'][$val->getId()] = $val;
                }
            }
        }

        return $result;

    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $curForm = reset($view->children);

        $views = [];

        foreach($curForm->vars['choices'] as $wrapKey => $wrapper) {
            foreach($wrapper as $key => $val) {
                $views[$wrapKey][$key] = $curForm->children[$key];
            }
        }

        $view->vars['views'] = $views;
    }

    public function getParent()
    {
        return 'entity';
    }


}