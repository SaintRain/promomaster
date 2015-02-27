<?php

/**
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Admin;

use Core\FileBundle\Admin\CommonAdminFile;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Core\FileBundle\Entity\ImageFile;
use Core\FileBundle\Entity\DocumentFile;
use Core\FileBundle\Admin\Form\Mapper\ImageFileFormMapper;
use Core\FileBundle\Admin\Form\Mapper\DocumentFileFormMapper;
class ImageAdminFile extends CommonAdminFile {

    protected function configureFormFields(FormMapper $formMapper) {
        parent::configureFormFields($formMapper);
    }
}
