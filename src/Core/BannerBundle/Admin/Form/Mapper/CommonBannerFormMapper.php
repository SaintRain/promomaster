<?php
/**
 * Основная форма для редактирования баннера
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;


class CommonBannerFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        $formMapper ->add('user', 'ajax_entity', [
        'label' => 'Пользователь',
        'required' => true,
       // 'attr' => ['data-legal' => ($obj && $obj->getContragent() instanceof LegalContragent) ? 1 : 0],
        'properties' => [
            'id' => array(
                'search' => true,
                'return' => true,
                'entry' => 'full',
            ),
            'email' => array(
                'search' => true,
                'return' => true,
                'entry' => 'left',
            ),
            'lastName' => array(
                'search' => false,
                'return' => true,
                'entry' => 'left',
            ),
            'firstName' => array(
                'search' => false,
                'return' => true,
                'entry' => 'left',
            ),
            'surName' => array(
                'search' => false,
                'return' => true,
                'entry' => 'left'
            )
        ],
        'select2_constructor' => array(
            'width' => '40%',
            'placeholder' => 'Введите E-mail, фамилию, или ID пользователя',
            'minimumInputLength' => 1),
    ])

        ->add('name', null, ['label' => 'Название баннера'])
            ->end();
    }
}