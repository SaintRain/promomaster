<?php

/**
 * Форма редактирования файлов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Core\FileBundle\Entity\ImageFile;
use Core\FileBundle\Entity\DocumentFile;
use Core\FileBundle\Admin\Form\Mapper\ImageFileFormMapper;
use Core\FileBundle\Admin\Form\Mapper\DocumentFileFormMapper;
use Core\FileBundle\Admin\Form\Mapper\FlashFileFormMapper;

class CommonAdminFile extends Admin {

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
//            'disabled' => 1,
//            'class' => $this->getClass(),
        );

        if ($obj instanceof ImageFile) {
            new ImageFileFormMapper($formMapper, $options);
        } elseif ($obj instanceof DocumentFile) {
            new DocumentFileFormMapper($formMapper, $options);
        }
        elseif ($obj instanceof FlashFile) {
            new FlashFileFormMapper($formMapper, $options);
        }
    }

}
