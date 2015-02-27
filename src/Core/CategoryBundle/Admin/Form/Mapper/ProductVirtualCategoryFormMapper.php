<?php

/**
 * Форма для редактирования виртуадьных категорий продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\Common\Collections\ArrayCollection;

class ProductVirtualCategoryFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $formMapper
                ->with('Основное');
                    $this->add('caption', null, array(
                        'label' => 'Название',
                        ));
                $formMapper->add('name', null, array(
                        'required' => false,
                        'label' => 'Сис. Имя',
                        'help' => 'Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>'
                    ))
                    ->add('isEnabled', null, array('label'=>'Активно', 'required' => false))
                ->end();
    }

}
