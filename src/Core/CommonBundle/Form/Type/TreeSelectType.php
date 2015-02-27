<?php

/**
 * Селект для древовидных списков
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
use Symfony\Component\Translation\Translator;

class TreeSelectType extends AbstractType {

    protected $em;

    protected $translator;

    public function __construct(EntityManagerInterface $em, Translator $translator)
    {
        $this->em = $em;
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$transfromer = new EntityToIdTransformer($this->em);
        //$builder->addModelTransformer($transfromer);
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $data = $event->getData();
            if (null !== $data) {
                $event->setData($this->transform($data));
            } else {
                $event->setData(0);
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            if (!$options['is_filter'] && (null !== $data)) {
                $event->setData($this->reverseTransform($data, $options['class']));
            }
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $count = 0;
        $treeOptions = array(
            'decorate' => true,
            'rootOpen' => function($tree) use ($view, $options) {
                if(count($tree) && ($tree[0]['lvl'] == 0)){
                    $html = '<ul class="mcdropdown_menu" id="category_' . $view->vars['id'] . '">';
                    $emptyValue = $this->translator->trans($options['empty_value'], [], $options['translation_domain']);
                    if ($options['required'] == true) {
                        $html .= '<li rel="">' . $emptyValue . '</li>';
                    } else {
                        $html .= '<li rel="0">' . $emptyValue . '</li>';
                    }
                    return $html;
                } else {
                    return '<ul>';
                }
            },
            'rootClose' => '</ul>',
            'childOpen' => function($node) use ($count) {
                return '<li rel="' . $node['id'] . '">';
            },
            'childClose' => '</li>',
            'nodeDecorator' => function($node) use ($options) {
                return $node[$options['property']];
            }
        );
        $tree = $this->em->getRepository($options['class'])
                ->childrenHierarchy(
                        null,
                        false,
                        $treeOptions
                );
        $view->vars['tree'] = $tree;
        $view->vars['empty_value'] = $this->translator->trans($options['empty_value'], [], $options['translation_domain']);
        $view->vars['placement'] = $options['placement'];
        $view->vars['allow_parent_select'] = $options['allow_parent_select'];
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->replaceDefaults(array(
            'class' => null,
            'property' => null,
            'empty_value' => 'form.label.empty_value',
            'allow_parent_select' => true,
            'is_filter' => false,
            'translation_domain' => null,
            'placement' => 'right'
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
        return 'tree_select';
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
