<?php

/**
 * Форма для редактирования статусов единиц товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class UnitStatusFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное');
        $this->add('caption', null, array(
            'required' => true,
            'label' => 'Название статуса'));
        $formMapper->add('name', null, array(
                    'required' => false,
                    'label' => 'Системное имя',
                    'help' => 'Если оставить пустым, тогда заполниться автоматически. Может использоваться программистом.'
                ))
                ->end();
    }

}
