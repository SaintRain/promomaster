<?php

/**
 * Форма для редактирования статусов единиц товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class CanceledReasonFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное');
        $this->add('caption', null, array(
            'required' => true,
            'label' => 'Название причины'));
        $formMapper->add('name', null, array(
                    'required' => false,
                    'label' => 'Системное имя',
                    'help' => 'Если оставить пустым, тогда заполниться автоматически. Используется программистом'
                ))
                ->end();
    }

}
