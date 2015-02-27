<?php

/**
 * Форма для редактирования составного товара
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Core\ProductBundle\Admin\Form\Mapper\CommonProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\PhysicalPropertiesMapper;

class CompositeProductFormMapper extends CommonProductFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        $em = $options['container']->get('doctrine.orm.entity_manager');

        $formMapper->add('serialsQuantity', 'text', array(
            'required' => true,
            'disabled' => true,
            'label' => 'Количество серийных номеров',
            'help' => 'Вычисляется автоматически для составного продукта. В коробке может быть несколько устройств и для каждого при оформлении вводится свой серийный номер.',
            'attr' => ['data-mask' => 'integer']
        ));

        $formMapper->with('Основное')
                ->add('price', 'money', array(
                    'required' => false,
//                    'disabled' => true,
                    'label' => 'Цена',
                    'help' => 'Заполняется автоматически по стоимости составляющих',
                    'attr' => ['data-mask' => 'money']
                ))
                ->add('compositions', 'union', array(
                    'columns' => [
                        'images' => ['label' => 'Фото', 'identifier' => true, 'width' => 64, 'type' => 'image', 'preview' => '64x64_'],
                        'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                        'captionRu' => ['label' => 'Название', 'identifier' => true],
                        'quantity' => ['label' => 'Количество', 'type' => 'quantity', 'width' => 64, 'code' => 'core_union_product_composition'],
                        'price' => ['label' => 'Цена', 'type' => 'money', 'width' => 64],
                        'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                    ],
                    'data' => new ArrayCollection(
                            $em->getRepository('CoreUnionBundle:ProductCompositionsUnion')->createQueryBuilder('u')
                            ->select('u,targetObject,img')
                            ->join('u.targetObject', 'targetObject')
                            ->leftJoin('targetObject.images', 'img')
                            ->orderBy('u.indexPosition', 'ASC')
                            ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject', $obj->getId())
                            ->getQuery()
                            ->getResult()
                    ),
                    'deleteable'=>false,
                    'parent_form' => $formMapper,
                    'edit_route' => 'admin_core_product_commonproduct_edit',
                    'create_route' => 'admin_core_product_commonproduct_create',
                    'find_route' => 'admin_core_product_commonproduct_list',
                    'label' => 'Составляющие продукта', //нужно сдеать  умолчанию
                    'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                        ), 
                    array('sortable' => 'indexPosition'));
        //добавляем поля веса и размеров
        new PhysicalPropertiesMapper($formMapper, $options);
    }

}
