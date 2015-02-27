<?php
/**
 * Новый тип формы для админки
 * Редактирование URL для редиректов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SlugHistoryType extends AbstractType
{
    private $container;
    private $configs;

    public function __construct($container)
    {
        $this->container = $container;
        $this->configs   = $container->getParameter('core_slug_history')['namespaces'];
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $em  = $this->container->get('doctrine')->getManager();
        $obj = $view->parent->vars['value'];

        $class = isset($this->configs[get_class($obj)]) ? get_class($obj) : get_parent_class($obj);

        $history = $em->getRepository('CoreSlugHistoryBundle:SlugHistory')->findBy(['className' => [$class], 'targetId' => [$obj->getId()]], ['createdAt' => 'DESC']);

        $view->vars['required']  = false;
        $view->vars['history']   = $history;
        $view->vars['className'] = $class;
        $view->vars['target_id'] = $obj->getId();
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'slug_history';
    }
}