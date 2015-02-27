<?php

/**
 * Админский класс для всей продукции
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ProductBundle\Admin\Form\Mapper\ProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\ServiceProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\DigitalProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\CompositeProductFormMapper;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\ServiceProduct;
use Core\ProductBundle\Entity\DigitalProduct;
use Core\ProductBundle\Entity\CompositeProduct;

class ProductAdmin extends Admin
{
    //protected $maxPerPage = 1;
    protected $translationDomain = 'CoreProductBundle'; // дефолтная группа (домен) для перевода

    public function getTemplate($name)
    {

        switch ($name) {
            case 'list':
                return 'CoreProductBundle:Admin\Form:list.html.twig';
            case 'edit':
                return 'CoreProductBundle:Admin\Form:edit.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function prePersist($object)
    {
        $this->setPriceForCompositeProduct($object);
        parent::prePersist($object);
    }

    public function preUpdate($object)
    {
        $this->setPriceForCompositeProduct($object);
        parent::preUpdate($object);
    }

    /**
     * Для составного товара вычисляем и проставляем цену
     * @param \Core\ProductBundle\Entity\CompositeProduct $object
     */
    public function setPriceForCompositeProduct($object)
    {
        if ($object instanceof CompositeProduct) {
            $object->setPrice($object->computeDynamicPrice());
        }
    }

    public function getFormBuilder()
    {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        $query->select('partial '.$query->getRootAlias().'.{id,captionRu,article,barcode,orderOnly,isEnabled,isCanBeInYml,price}')
        ->addSelect('partial s_categories.{id,parent,captionRu},
        partial s_manufacturers.{id, captionRu},
        partial s_virtualCategoryList.{id, captionRu},
        partial pa.{id,quantity, quantityVirtual, quantityVirtualReal},
        partial img.{id,name,halfPath}')
            ->leftJoin($query->getRootAlias() . '.productAvailability', 'pa')
            ->leftJoin($query->getRootAlias() . '.images', 'img');

        return $query;
    }

    /**
     * Переписываем запрос на выборку редактируемого объекта
     */
    public function getObject($id)
    {
        $container = $this->getConfigurationPool()->getContainer();
        $em = $container->get('doctrine.orm.entity_manager');
        $object = $em->getRepository('CoreProductBundle:CommonProduct')->getOneWithJoins($id);
        return $object;
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(), array(
                'CoreProductBundle:Admin\Form:form_admin_fields.html.twig',
                'CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig'
            )
        );
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = 'breadcrumb.' . ($object->getCaptionRu() ? 'edit' : 'create') . '.';
        if ($object instanceof Product) {
            $text .= 'Product';
        } elseif ($object instanceof ServiceProduct) {
            $text .= 'ServiceProduct';
        } elseif ($object instanceof CompositeProduct) {
            $text .= 'CompositeProduct';
        } elseif ($object instanceof DigitalProduct) {
            $text .= 'DigitalProduct';
        } else {
            $text .= 'empty';
        }
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        //контейнер
        $container = $this->getConfigurationPool()->getContainer();

        $disabled = 1;
        $options = array('disabled' => $disabled, 'obj' => $obj, 'container' => $container);

        $optionsForExtraBlocks = array(
            'sides' => ['left' => [1], 'bottom' => [1]],
            'tabs' => ['tickets', 'audit'],
        );
        $container->get('application_sonata_admin_extra_blocks_logic')->setWhatShow($optionsForExtraBlocks);

        if ($obj instanceof Product) {
            new ProductFormMapper($formMapper, $options);
        } elseif ($obj instanceof ServiceProduct) {
            new ServiceProductFormMapper($formMapper, $options);
        } elseif ($obj instanceof DigitalProduct) {
            new DigitalProductFormMapper($formMapper, $options);
        } elseif ($obj instanceof CompositeProduct) {
            new CompositeProductFormMapper($formMapper, $options);
        }
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'label.id'))
            ->add('images', null,
                ['label' => 'Фото', 'template' => 'CoreProductBundle:Admin\list_fields:imageMain.html.twig'])
            ->addIdentifier('manufacturers', null, ['associated_property' => 'captionRu', 'label' => 'Производитель'])
            ->addIdentifier('article', null, ['label' => 'Артикул'])
            ->add('barcode', null,
                ['label' => 'Штрихкод', 'template' => 'CoreProductBundle:Admin\list_fields:barcode.html.twig'])
            ->addIdentifier('captionRu', null, array('label' => 'label.caption'))
            ->add('price', null,
                array('label' => 'Цена', 'template' => 'CoreProductBundle:Admin\list_fields:price.html.twig'))
            ->add('ostatok', null,
                array('label' => 'Остаток', 'template' => 'CoreProductBundle:Admin\list_fields:ostatok.html.twig'))
            ->add('categories', null,
                ['label' => 'Категории', 'template' => 'CoreProductBundle:Admin\list_fields:categories.html.twig'])
            
            ->add('virtualCategoryList', null, [
                'label' => 'Вирт. Категории',
                'template' => 'CoreProductBundle:Admin\list_fields:virtual_categories.html.twig'
            ])
             
            ->add('orderOnly', null, array(
                'label' => 'Под заказ',
                'sortable' => true,
                'editable' => false
            ))
            ->add('isCanBeInYml', null, array(
                'label' => 'YML',
                'sortable' => false,
                // 'editable' => true,
                'template' => 'CoreProductBundle:Admin\list_fields:yml.html.twig'
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активен',
                'sortable' => true,
                'editable' => true
            ))

            ->add('isVisible', null, array(
                'label' => 'Доступно',
                'sortable' => true,
                'editable' => false
            ));

//            ->add('isBest', null, array(
//                'label' => 'label.isBest',
//                'sortable' => true,
//                'editable' => true))
//            ->add('_action', 'actions', array(
//                    'label' => 'label.actions',
//                    'actions' => array(
//                          'edit' => array(),
////                        'dublicate' => array(
////                            'ask_confirmation' => true
////                        )
//                    )
//                )
//            );
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID продукта, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID продукта, через запятую']])
            ->add('captionRu', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('article', null, array('label' => 'Артикул'), null, ['attr' => ['placeholder' => 'Артикул']])
            ->add('sku', null, array('label' => 'SKU'), null, ['attr' => ['placeholder' => 'SKU']])
            ->add('barcode', null, array('label' => 'Штрихкод'), null, ['attr' => ['placeholder' => 'Штрихкод']])
            ->add('isEnabled', null, array('label' => 'Активно'), null, ['attr' => ['placeholder' => 'Активно']])
            ->add('isVisible', null, array('label' => 'Доступно на сайте'), null, ['attr' => ['placeholder' => 'Доступно на сайте']])
            ->add('isBest', null, array('label' => 'Бестселлер'), null, ['attr' => ['placeholder' => 'Бестселлер']])
            ->add('orderOnly', null, array('label' => 'Под заказ'), null, ['attr' => ['placeholder' => 'Под заказ']])
            ->add('isDiscontinued', null, array('label' => 'Снято с производства'), null,
                ['attr' => ['placeholder' => 'Снято с производства']])
            ->add('without_weight_and_size', 'doctrine_orm_callback', array(
                    'label' => 'Товары с массой и размерами',
                    'callback' => array($this, 'searchByWithoutWeightAndSize'),
                    'field_type' => 'choice'
                ), null, [
                    'attr' => [
                        'placeholder' => 'Товары с массой и размерами'
                    ],
                    'choices' => [
                        1 => 'Да',
                        0 => 'Нет'
                    ]
                ]
            )
            ->add('with_bad_size_or_wieght', 'doctrine_orm_callback', array(
                    'label' => 'Товары с неправильной массой',
                    'callback' => array($this, 'searchByBadSize'),
                    'field_type' => 'choice'
                ), null, [
                    'attr' => [
                        'placeholder' => 'Товары с неправильной массой'
                    ],
                    'choices' => [
                        1 => 'Да',
                        0 => 'Нет'
                    ]
                ]
            )
            ->add('type', 'doctrine_orm_class', array(
                'attr' => ['placeholder' => 'Тип продукта'],
                'label' => 'Тип продукта',
                'sub_classes' => $this->getSubClasses()
            ), null, array('attr' => ['placeholder' => 'Тип продукта']))
            ->add('countryOfOrigin', null, array('label' => 'Страна происхождения'), null,
                array('property' => 'captionRu', 'attr' => ['placeholder' => 'Страна происхождения']))
            ->add('manufacturers', null, array('label' => 'Производитель'), null,
                array('attr' => ['placeholder' => 'Производитель'], 'property' => 'captionRu', 'multiple' => true))
            ->add('brand', null, array('label' => 'Бренд'), null,
                array('attr' => ['placeholder' => 'Бренд'], 'property' => 'captionRu', 'multiple' => true))
            ->add('virtualCategoryList', null, array('label' => 'Виртуальные категории'), null, array(
                'attr' => ['placeholder' => 'Виртуальные категории'],
                'property' => 'captionRu',
                'multiple' => true
            ))
            ->add('categories', null, array('label' => 'Категории'), null,
                array('attr' => ['placeholder' => 'Категории'], 'property' => 'indentedCaption', 'multiple' => true))
            ->add('isCanBeInYml', 'doctrine_orm_callback', array(
                    'label' => 'Включено в YML',
                    'callback' => array($this, 'searchByIsInYml'),
                    'field_type' => 'choice'
                ), null, [
                    'attr' => [
                        'placeholder' => 'Включено в YML'
                    ],
                    'choices' => [
                        1 => 'Да',
                        0 => 'Нет'
                    ]
                ]
            );


    }

    public function searchByIsInYml($queryBuilder, $alias, $field, $value)
    {
        // ld($value['value']);
        if (!isset($value['value'])) {
            return;
        }
        $em = $this->configurationPool->getContainer()->get('doctrine')->getManager();
        $qb2 = $em->getRepository('CoreLogisticsBundle:ProductAvailability')
            ->createQueryBuilder('pa2')->select('
            CASE WHEN ' . $alias . '.orderOnly=1
                THEN 1
                ELSE
                 CASE WHEN SUM(pa2.quantity) > 0 THEN 1 ELSE 0 END
                 END
            ')
            ->where('pa2.product=' . $alias . '.id');


        if ($value['value']) {
            $queryBuilder
                ->join($alias . '.manufacturerMain', 'manufacturerMain')
                ->andWhere($alias . '.isCanBeInYml=:isCanBeInYml')
                ->andWhere('manufacturerMain.isCanBeInYml=:isCanBeInYml')
                ->andWhere('1=(' . $qb2->getDQL() . ')'
                );
        } else {
            $queryBuilder
                ->join($alias . '.manufacturerMain', 'manufacturerMain')
                ->orWhere($alias . '.isCanBeInYml=:isCanBeInYml')
                ->orWhere('manufacturerMain.isCanBeInYml=:isCanBeInYml')
                ->orWhere('1!=(' . $qb2->getDQL() . ')');
        }

        $queryBuilder->setParameter('isCanBeInYml' , $value['value']);
      //  ld($queryBuilder->getDQL());
    }

    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int)$val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id', $ids);
        }
    }

    /**
     * Collbak для поиска товаров без веса и размеров
     *
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     * @author Sergeev A.M.
     */
    public function searchByWithoutWeightAndSize($queryBuilder, $alias, $field, $value)
    {

        if ($value['value'] === 0) {
            $queryBuilder
                ->andWhere($alias . '.grossWeight = 0 OR ' . $alias . '.grossWeight IS NULL OR '
                    . $alias . '.lengthOfBox = 0 OR ' . $alias . '.lengthOfBox IS NULL OR '
                    . $alias . '.widthOfBox = 0 OR ' . $alias . '.widthOfBox IS NULL OR '
                    . $alias . '.heightOfBox = 0 OR ' . $alias . '.heightOfBox IS NULL');
        } elseif ($value['value'] === 1) {
            $queryBuilder
                ->andWhere($alias . '.grossWeight > 0')
                ->andWhere($alias . '.lengthOfBox > 0')
                ->andWhere($alias . '.widthOfBox > 0')
                ->andWhere($alias . '.heightOfBox > 0');
        }
    }

    /**
     * Callbak для поиска товаров с неправлиной массой или размерами
     *
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     * @author Sergeev A.M.
     */
    public function searchByBadSize($queryBuilder, $alias, $field, $value)
    {
        if ($value['value'] === 1) {
            $queryBuilder
                ->andWhere($alias . '.netWeight > ' . $alias . '.grossWeight');
        } elseif ($value['value'] === 0) {
            $queryBuilder
                ->orWhere($alias . '.netWeight <= ' . $alias . '.grossWeight');
        }

    }
}
