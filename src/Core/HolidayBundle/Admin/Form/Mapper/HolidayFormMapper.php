<?php
/**
 * Форма редактирования праздников
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class HolidayFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $formMapper
            ->with('Основные')
            ->add('isEnabled', null, array(
                'label' => 'Активность'));

        $this
            ->add('caption', null, array(
                'label' => 'Название'));
        $formMapper
            ->add('startedAt', null, [
            ])
            ->add('startedAt', null,
                [
                'label' => 'Дата начала',
                'required' => true,
                'help' => 'Включительно (c 00:00:00)',
                'widget' => 'single_text',
                //'view_timezone' => $options['container']->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )], [
                'wrapper' => [
                    'class' => 'pull-left'
            ]])
            ->add('endedAt', null,
                [
                'label' => 'Дата окончания',
                'required' => true,
                'help' => 'Включительно (до 23:59:59)',
                'widget' => 'single_text',
                //'view_timezone' => $options['container']->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )], [
                'wrapper' => [
                    'class' => 'pull-left',
                ],
                'clearfix' => ['after']
            ])
            ->add('logo', 'multiupload_image',
                [
                'parent_form' => $formMapper,
                'required' => true,
                'label' => 'Логотип (240x104)',
                'width' => '700px',
                'attr' => array(
                    'multiple' => false,
        )]);

        $formMapper->end();
    }
}