<?php
/**
 * Форма для редактирования предзаказов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\FileBundle\Entity\ImageProductFile as Images;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\UnionBundle\Entity\Repository\ProductModificationUnionRepository;
use Core\UnionBundle\Entity\Repository\ProductSimilarUnionRepository;
use Core\UnionBundle\Entity\Repository\ProductAccessoriesUnionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class PreOrderFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];
        $em  = $options['container']->get('doctrine.orm.entity_manager');
        if ($obj && ($obj->getOrder() || ($obj->getStatus() && $obj->getStatus()->getName()
            == 'canceled'))) {
            $disabled = true;
        } else {
            $disabled = false;
        }

        if ($obj->getOrder() || $disabled) {
            $composition_disabled = true;
        } else {
            $composition_disabled = false;
        }


        $formMapper->with('Основное')
            ->add('id', 'text',
                array(
                'required' => false,
                'disabled' => true,
                'label' => ' '))
            ->add('compositions', 'sonata_type_collection',
                array(
                'disabled' => $composition_disabled,
                'required' => true,
                'by_reference' => false,
                'btn_add' => !$composition_disabled ? 'Добавить товар' : false,
                'label' => false),
                array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'indexPosition'
            ))

            ->add('user', 'ajax_entity',
                [
                'disabled' => $disabled,
                'label' => 'Пользователь',
                'required' => false,
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
                ],
                'select2_constructor' => array(
                    //'width' => '350px',
                    'placeholder' => 'Введите email или id пользователя',
                    'minimumInputLength' => 1),
            ])
            ->add('contragent', 'shtumi_dependent_filtered_entity',
                array(
                'disabled' => $disabled,
                'attr' => ['class' => 'span5'],
                'required' => false,
                'entity_alias' => 'contragents_by_user',
                'empty_value' => 'Ничего не выбрано...',
                'parent_field' => 'user',
                'help' => 'Список контрагентов появится после выбора пользователя',
                'label' => 'Контрагент'))
            ->add('email', null,
                ['disabled' => $disabled, 'label' => 'Email', 'attr' => ['class' => 'contactEmail span5']])
            ->add('phone', null,
                ['required' => false, 'disabled' => $disabled, 'label' => 'Телефон',
                'attr' => ['class' => 'phone span5']])
            ->add('lastName', null,
                ['disabled' => $disabled, 'label' => 'Фамилия', 'attr' => ['class' => 'lastName span5']])
            ->add('firstName', null,
                ['disabled' => $disabled, 'label' => 'Имя', 'attr' => ['class' => 'firstName span5']])
            ->add('surName', null,
                ['required' => false, 'disabled' => $disabled, 'label' => 'Отчество',
                'attr' => ['class' => 'surName span5']])
            ->add('city', 'ajax_entity',
                [
                'label' => 'Город',
                'attr' => ['class' => 'city span5'],
                'required' => true,
                'disabled' => $disabled,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'name' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'region.name' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ],
                'select2_constructor' => array(
                    'width' => '40%',
                    'placeholder' => 'Введите название города',
                    'minimumInputLength' => 1),
            ])
            ->add('address', null,
                ['disabled' => $disabled, 'label' => 'Адрес', 'attr' => ['class' => 'address span5']])
            ->add('status', 'entity',
                ['disabled' => $disabled,
                'class' => 'CoreOrderBundle:PreOrder\PreOrderStatus',
                'attr' => ['data-extra' => ['name']],
                'required' => false,
                'label' => 'Статус',
                'property' => 'captionRu',
                'empty_value' => 'Новый'
            ])
            // важно чтобы cancelReason был выше чем preDefinedAnswers
            // чтобы можно было рендерить preDefinedAnswers внутри блока cancelReason
            ->add('cancelReason', null,
                ['disabled' => $disabled,
                'required' => false,
                'attr' => ['class' => 'span12', 'style' => 'height:100px;'],
                'label' => 'Причина отмены',
            ])
            ->add('preDefinedAnswers', 'entity',
                ['disabled' => $disabled,
                'class' => 'CoreFaqBundle:Article',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('pa')
                        ->join('pa.category', 'c')
                        ->where('c.slug = :catSlug')
                        ->setParameter('catSlug', 'cancel-reason');
                },
                'property' => 'captionRu',
                'required' => false,
                'mapped' => false,
                'empty_value' => 'Добавить ответ',
                'attr' => ['class' => 'span8', 'data-extra' => ['compressed']],
                'label' => 'Готовые ответы',
            ])
            ->add('isSendCancelMsg', null,
                ['disabled' => $disabled,
                'attr' => ['class' => 'checkbox-input-msg'],
                'required' => false,
                'label' => 'Отсылать письмо',
            ])
            ->end();
    }
}