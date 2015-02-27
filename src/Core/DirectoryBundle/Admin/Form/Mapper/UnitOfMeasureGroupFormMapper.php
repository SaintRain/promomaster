<?php

/**
 * Форма для редактирования групп единиц измерений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class UnitOfMeasureGroupFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);


        $formMapper
            ->with('Основное');
        $this->add('caption', 'text', array(
                'label' => 'Название группы'));
                $formMapper->add('name' ,null, array(
                'label' => 'Системное имя',
                    'required'=>false,
                    'help'=>'Если оставить пустым, то будет заполнено автоматически'))
                ;

            $formMapper->end();
    }

}
