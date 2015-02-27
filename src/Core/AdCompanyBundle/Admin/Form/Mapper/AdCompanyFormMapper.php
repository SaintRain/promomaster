<?php
/**
 * форма для редактирования рекламной компании
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;



class AdCompanyFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        $formMapper
            ->with('Основное')
            ->add('name', null, ['label' => 'Название компании', 'required' => true])
            ->add('user', 'ajax_entity', [
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
            ->add('isEnabled', null, ['label' => 'Компания включена', 'required' => false])
            ->with('Размещения')
            ->add('placements', 'sonata_type_collection',
                array(
                    'by_reference' => false,
                    'required' => false,
                    'label' => 'Размещения',
                    'type_options' => array('delete' => true)
                ), array(
                    'sortable' => 'indexPosition',
                    'edit' => 'inline',
                    'inline' => 'table',
                ))


            ;
    }
}