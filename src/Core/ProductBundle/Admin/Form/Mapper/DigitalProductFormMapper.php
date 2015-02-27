<?php

/**
 * Форма для редактирования цифровых товаров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
//use Core\FileBundle\Entity\ImageProductFile as Images;
//use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
//use Core\UnionBundle\Entity\Repository\ProductModificationUnionRepository;
//use Core\UnionBundle\Entity\Repository\ProductSimilarUnionRepository;
//use Core\UnionBundle\Entity\Repository\ProductAccessoriesUnionRepository;
//use Doctrine\Common\Collections\ArrayCollection;
use  Core\ProductBundle\Admin\Form\Mapper\CommonProductFormMapper;

class DigitalProductFormMapper extends CommonProductFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);


        $obj = $options['obj'];
        $em = $options['container']->get('doctrine.orm.entity_manager');
        //$id = $obj->getId();



    }

}
