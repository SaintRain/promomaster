<?php

/**
 * Форма для редактирования итегов продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\Common\Collections\ArrayCollection;

class ProductTagsFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);
        $formMapper->with('Основное');
        $this->add('caption', null, array(
            'label' => 'Тег',
            'attr' => ['style' => 'width:95%', 'class' => 'tagsAutocomplete ']));
        $formMapper->end();
    }

}
