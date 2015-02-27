<?php
/**
 * форма для редактирования баннера кода
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Core\BannerBundle\Admin\Form\Mapper\CommonBannerFormMapper;



class FlashBannerFormMapper extends  CommonBannerFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        $formMapper
            ->add('file', 'multiupload_document',
                array(
                    'parent_form' => $formMapper,
                    'label' => 'Файл баннера',
                    'width' => '700px',
                    'attr' => array(
                        'multiple' => false, // для одного файла
                    )))
            ->end();


    }
}