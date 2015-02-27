<?php
/**
 * форма для редактирования баннера с изображением
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Core\BannerBundle\Admin\Form\Mapper\CommonBannerFormMapper;



class ImageBannerFormMapper extends  CommonBannerFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper
            ->add('isOpenUrlInNewWindow', null, ['label'=>'Открывать в новом окне'])
            ->add('image', 'multiupload_image',
                array(
                    'parent_form' => $formMapper,
                    'label' => 'Изображение баннера',
                    'width' => '700px',
                    'attr' => array(
                        'multiple' => false, // для одного файла
                    )))
            ->end();
    }
}