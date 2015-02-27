<?php

/**
 * Новый тип формы для выставления оценки по звездочкам c помощью STAR RATING - JQUERY PLUGIN
 * http://www.fyneworks.com/jquery/star-rating/
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;

class StarRatingType extends AbstractType
{

    public function __construct()
    {

    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['attr']['class'] = 'star';
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $stars = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        );

        // Добавляем опции в разрешимый список
        $defaults = array(
            'expanded' => true,
            'multiple' => false,
            'required' => false,
            'choices' => $stars,
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'star_rating';
    }

}
