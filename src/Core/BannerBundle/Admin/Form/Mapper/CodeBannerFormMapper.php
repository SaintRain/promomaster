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


class CodeBannerFormMapper extends CommonBannerFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        $formMapper
            ->add('code', null, ['attr'=>['rows'=>10], 'label' => 'Код баннера'])
            ->end();
    }
}