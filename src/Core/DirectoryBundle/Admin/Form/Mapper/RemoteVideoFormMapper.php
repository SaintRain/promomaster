<?php

/**
 * Форма для редактирования видео с хостингов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\Common\Collections\ArrayCollection;

class RemoteVideoFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $formMapper
                ->with('Основное')
                    ->add('videoHosting', null, array('label' => 'Видео-хостинг'));
                    $this->add('caption', null, array(
                        'label' => 'Название',
                        ));
                $formMapper->add('code', null, array(
                    'label' => 'Код видео',
                    ))
                ->end();
    }

    private function getVideoHostings()
    {
        return array(
            'vimeo' => 'Vimeo',
            'youtube' => 'Youtube',
            'dailymotion' => 'Dailymotion'
        );
    }

}
