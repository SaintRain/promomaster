<?php

/**
 * Форма для редактирования видео-хостингов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\Common\Collections\ArrayCollection;

class VideoHostingFormMapper extends LanguageSwitcherFormMapper
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
                        'help' => 'Если оставить пустым, то будет заполнено автоматически'
                    ))
                    ->add('playerUri', null, array(
                        'label' => 'Урл плеера',
                        'help' => 'Урл плеера видео-хостинга'
                    ))
                ->end();
    }

}
