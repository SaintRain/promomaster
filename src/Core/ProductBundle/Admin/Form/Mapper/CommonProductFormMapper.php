<?php
/**
 * Форма для редактирования товаров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\eeBundle\Entity\ImageProductFile as Images;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\UnionBundle\Entity\Repository\ProductModificationUnionRepository;
use Core\UnionBundle\Entity\Repository\ProductSimilarUnionRepository;
use Core\UnionBundle\Entity\Repository\ProductAccessoriesUnionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Core\DirectoryBundle\Entity\Repository\CurrencyRepository;
use Core\DirectoryBundle\Entity\Repository\UnitOfMeasureRepository;

class CommonProductFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];
        $em  = $options['container']->get('doctrine.orm.entity_manager');
        if ($obj->getManufacturerMain()) {
            //берём список серий по бренду
            if ($obj->getBrand()) {
                $serieData = $em->getRepository('CoreManufacturerBundle:Series')->findByBrand($obj->getBrand()->getId(),
                    array('indexPosition' => 'ASC'));
            } else {
                $serieData = [];
            }
            foreach ($serieData as $sd) {
                $serieСhoices[$sd->getId()] = $sd->getCaptionRu();
            }
        } else {
            $serieData = [];
        }

        if ($obj->getIsNoSerials()) {
            $disableSerialsQuantity = true;
        } else {
            $disableSerialsQuantity = false;
        }

        //если только под заказ
        if ($obj->getOrderOnly()) {
            $read_onlyPrice = true;
        } else {
            $read_onlyPrice = false;
        }

        $formMapper->with('Основное');
        $this->add('caption', null,
            array(
            'label' => 'Название'
        ));
        /*
          $this->add('captionCase', 'textCase', array(
          'label' => 'Падежи'));
         */
        $formMapper->add('article', null,
                array(
                'required' => false,
                'label' => 'Артикул',
                'help' => 'Наш внутренний уникальный артикул продукта'
            ))
            ->add('sku', null,
                array(
                'required' => true,
                'label' => 'SKU производителя',
                'help' => 'Артикул продукта от производителя'
            ))
            ->add('barcode', 'collection',
                array(
                'required' => false,
                'label' => 'Штрихкод(ы)',
                'type' => 'text',
                'allow_add' => true,
                'allow_delete' => true,
                'options' => array(
                    'label' => false,
                    'required' => true,
                    'attr' => array('class' => 'span3', 'data-mask' => 'integer')
                )
            ))
            ->add('isNoSerials', null,
                array(
                'required' => false,
                'label' => 'У продукта нет серийников',
                'help' => 'Провода, джеки, всякая мелочь и другие товары могут не иметь серийных номеров.'
            ))
//        if (!$disableSerialsQuantity) {
            ->add('serialsQuantity', 'text',
                array(
                'required' => false,
//                'disabled' => $disableSerialsQuantity,
                'label' => 'Количество серийных номеров',
                'help' => 'В коробке может быть несколько устройств и для каждого при оформлении вводится свой серийный номер.',
                'attr' => ['data-mask' => 'integer']
            ))
//        }
            ->add('unitOfMeasure', null,
                array(
                'query_builder' => function (UnitOfMeasureRepository $repository) {
                    return $repository->createQueryBuilder('u')->join('u.group', 'g')->
                        where('u.isEnabled = 1 AND g.name=:name')->setParameter('name', 'quantity');
                },
                'property' => 'captionRu',
                'required' => true,
                'label' => 'Единица измерения',
                'empty_value' => 'Ничего не выбрано...'
        ));



        $formMapper->add('warrantyMonths', 'text',
                array(
                'required' => false,
                'label' => 'Гарантия',
                'attr' => ['data-mask' => 'integer'],
                'help' => 'Срок гарантии в месяцах'
            ))
            ->add('price', 'money',
                array(
                'required' => true,
                'empty_data' => null,
                'read_only' => $read_onlyPrice,
                'label' => 'Цена',
                'attr' => ['data-mask' => 'money']
            ))
            ->add('oldPrice', 'money',
                array(
                'required' => false,
                'label' => 'Старая цена',
                'attr' => ['data-mask' => 'money']
            ))
            ->add('manufacturers', null,
                array(
                'property' => 'captionRu',
                'label' => 'Производители'
            ))
            ->add('manufacturerMain', 'manufacturer_main',
                array(
                'class' => 'Core\ManufacturerBundle\Entity\Manufacturer',
                'help' => 'Основной производитель нужен для SEO и статистики.
                        В списке  выбора основного производителя появляются производители, которые выбраны для продукта ниже.',
                'property' => 'captionRu',
                'label' => 'Основной производитель'
            ))
            ->add('brand', 'shtumi_dependent_filtered_entity',
                array(
                'required' => false,
                'entity_alias' => 'brands_by_manufacturer',
                'empty_value' => 'Ничего не выбрано...',
                'parent_field' => 'manufacturerMain',
                'help' => 'Список брендов подгружается после выбора основного производителя',
                'label' => 'Бренд'
            ))
            ->add('serie', 'shtumi_dependent_filtered_entity',
                array(
                'entity_alias' => 'series_by_brand',
                'empty_value' => 'Ничего не выбрано...',
                'required' => false,
                'parent_field' => 'brand',
                'label' => 'Серия',
                'help' => 'Список серий подгружается после выбора бренда. Продукты могут входить  в общие серии определённого бренда.'
            ))
            ->add('countryOfOrigin', null,
                array('label' => 'Страна происхождения'))
            ->add('createdDateTime', null,
                array(
                'label' => 'Дата добавления',
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd.MM.yyyy, HH:mm',
                'view_timezone' => $options['container']->getParameter('default_timezone'),
                'disabled' => true
            ))
            ->add('isBest', null,
                array(
                'required' => false,
                'label' => 'Бестселлер'
            ))
            ->add('isDiscontinued', null,
                array('required' => false, 'label' => 'Снят с производства'))
            ->add('isEnabled', null,
                array(
                'required' => false,
                'label' => 'Активно',
                'help' => 'Если активно, тогда продукт доступен на сайте'
            ))
            ->add('isVisible', null,
                array(
                'disabled' => true,
                'label' => 'Показывается на сайте',
                'help' => 'Если "Да", тогда продукт отображаеться на сайте. '
                .'Если "Нет" значит продукт скрыт, вне зависимости от флага "Активно", '
                .'например: если будет выключена одна из родительских категорий'
        ));

        $formMapper->with('Под заказ')
            ->add('orderOnly', null,
                ['required' => false, 'label' => 'Только под заказ',
                    'help'=>'Назначается автоматически при загрузке прайсов'
                ])
            ->add('supplier', null,
                ['required' => false, 'property'=>'caption', 'disabled'=>true, 'label' => 'Поставщик',
                    'help'=>'Назначается автоматически при загрузке прайсов'])

            ->add('OOPBQuantity', null,
                ['required' => false,
                'label' => 'Остаток у поставщика'])
            ->add('deliveryDays', null,
                ['required' => false,
                'label' => 'Срок поставки (дней)',
                'help' => 'Через сколько дней товар может быть доставлен на склад в Ростове-на-Дону. Если поставщик сам доставляет товары 1 раз в неделю, так и пишем 7 дней. Это будет указывать максимальный срок, через сколько товар будет получен нами и отправлен получателю.',
                ])
        ->add('orderOnlyPriceBuying', null,
                ['required' => false, 'label' => 'Цена закупки','attr' => ['data-mask' => 'money']],
                ['wrapper' => [
                //'class' => 'span6',
                'style' => 'float:left'
                ]]
                )
            ->add('OOPBCurrency', null,
                array(
                'query_builder' => function (CurrencyRepository $repository) {
                    return $repository->createQueryBuilder('s')->where('s.isEnabled = 1');
                },
                'required' => false,
                'property' => 'captionRu',
                'label' => false,
                'attr' => array(
                    'data-extra' => ['currencyRUB','currencyDateTime'],
                    'style'=>'width:100%'
                ))
                    ,['wrapper'=>['style'=>'display:inline-block;margin-left:10px;width:200px']]
                    )
            ->add('OOPBCurrencyRateAdditive', null,
                ['required' => false, 'label' => 'Надбавка к курсу', 'attr' => ['data-mask' => 'money']]
                )
            ->add('isOOPBCurrencyRateAdditiveInPercent', null,
                ['required' => false, 'label' => 'Надбавка к курсу в процентах', 'attr'=>['style'=>'width:50px']])
            ->add('mrc', null,
                [
                'required' => false,
                'label' => 'МРЦ',
                'help' => 'Минимальная рознична цена',
                'attr' => ['data-mask' => 'money']
            ],['wrapper' => [
                //'class' => 'span6',
                'style' => 'float:left'
                ]])
            ->add('isMrcEnabled', null,
                ['required' => false, 'label' => 'Включить  '],
                [
                    'wrapper' => ['class' => 'pull-left'],
                    'clearfix' => ['after'],
                ]
            )
            ->add('orderOnlyShopTax', null,
                ['required' => false,  'help' => 'Наценка указывается в той же валюте, что и закупка',
                    'label' => 'Наценка магазина', 'attr' => ['data-mask' => 'money']])
            ->add('orderOnlyShopTaxInPercent', null,
                ['required' => false,
                'label' => 'Наценка в процентах']);


        $formMapper->with('Падежи');
        $this->add('captionCase', 'textCase',
            array(
            'label' => false,
            'required' => false
        ));

        $formMapper->with('Категории')
            ->add('categoryMain', 'category_main',
                array(
                'class' => 'Core\CategoryBundle\Entity\ProductCategory',
                'property' => 'captionRu',
                'label' => 'Основная категория',
//                    'help' => 'Основная категория нужна для SEO. В списке  выбора основной категории появляются категори, которые выбраны для продукта ниже.',
                'required' => true,
            ))
            ->add('categories', 'category',
                array(
                'class' => 'Core\CategoryBundle\Entity\ProductCategory',
                'property' => 'captionRu',
                'label' => 'Категории продукта',
                'required' => false,
                'multiple' => true,
                'help' => 'Категории к которым принадлежит продукт.
                 При выборе категорий будет подгружен список характеристик,
                 характерных для продуктов, входящих в эту категорию.'
            ))
            ->with('Характеристики')
            ->add('productDataProperty', 'property',
                array(
                'label' => false,
//                    'type_options' => array('delete' => true, 'add'=>true),
                //  'btn_add' => 'Добавить',
                'required' => false,
                'by_reference' => true,
                'parent_form' => $formMapper,
                //'btn_catalogue' => true,
                ),
                array(
                'edit' => 'inline',
                )
            )

            ->with('Виртуальные категории')
            ->add('virtualCategoryList', 'entity',
                array(
                'class' => 'CoreCategoryBundle:ProductVirtualCategory',
                'property' => 'captionRu',
                //'btn_add' => false,
                //'query' => $em->createQuery('SELECT s FROM CoreCategoryBundle:ProductVirtualCategory s WHERE s.isEnabled = true'),
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('vc')
                            //->where('vc.isEnabled = :isEnabled')
                            //->setParameter('isEnabled', true)
                            ->orderBy('vc.isEnabled DESC, vc.id', 'ASC')
                    ;
                },
                'attr' => ['data-extra' => ['isEnabled']],
                'label' => 'Вирт. категории',
                'required' => false,
                'multiple' => true,
                'help' => 'Виртульные категории (к примеру товар месяца)'
            ))
            ->end()
            ->with('Описание');
        $this->add('slogan', null,
            array(
            'required' => false,
            'label' => 'Слоган'
        ));
        $formMapper->add('isDescriptionSendToYandex', null,
            array(
            'required' => false,
            'label' => false,
        ));
        $this->add('shortDescription', 'textarea',
                array(
                'required' => false,
                'attr' => ['class' => 'span5', 'rows' => 5, 'spellcheck' => 'true'],
                //'config' => array('width' => 1000, 'height' => 200),
                'label' => 'Краткое описание'
            ))
            ->add('description', 'ckeditor',
                array(
                'required' => false,
                'config' => array('width' => 1000, 'height' => 500),
                'label' => 'label.description',
                'help' => 'Для отправки в Яндекс текст должен быть не менее 500 символов',
                'config' => array(
                    'removePlugins' => 'scayt,wsc',
                    'extraPlugins' => 'jqueryspellchecker',
                    'contentsCss' => 'bundles/applicationivoryckeditor/contents.css'
                ),
            ))
            ->add('complectation', 'ckeditor',
                array(
                'required' => false,
                'config' => array('width' => 1000, 'height' => 300),
                'label' => 'Комплектация',
                'config' => array(
                    'removePlugins' => 'scayt,wsc',
                    'extraPlugins' => 'jqueryspellchecker',
                    'contentsCss' => 'bundles/applicationivoryckeditor/contents.css'
                ),
        ));


        $formMapper->with('Фото товара')
            ->add('color', 'admin_form_type_color',
                array(
                'required' => false,
                'label' => 'Цвет'
            ))
            ->add('isColorSelectedByUser', 'hidden',
                array(
                'attr' => array(
                    'class' => 'is-color-selected-by-user'
                )
            ))
            ->add('colorOriginalCode', 'hidden',
                array(
                'attr' => array(
                    'class' => 'detected-dominant-color'
                )
            ))
            ->add('images', 'multiupload_image',
                array(//sonata_type_collection
                'is_main' => true,
                'parent_form' => $formMapper,
                'label' => 'label.images',
                'help' => 'Зуммирование работает только для фото с размерами больше чем 650х410',
                ),
                array(
                'sortable' => 'indexPosition',
//                'edit' => 'inline',
//                'inline' => 'table'
            ))
            //
            ->with('Модификации')
            ->add('modificationUnion.dataList', 'product_modifications',
                array(
                'class' => 'Core\ProductBundle\Entity\CommonProductModification',
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'color' => ['label' => 'Цвет', 'type' => 'color'],
                    'productDataProperty' => [
                        'label' => 'Характеристики',
                        'type' => 'product_data_property',
                        'showProperties' => ['size']
                    ],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                //'data' => ($obj->getModificationUnion()) ? $obj->getModificationUnion()->getDataList() : new ArrayCollection(),
                'data' => ($obj && $obj->getModificationUnion() && $obj->getModificationUnion()->getDataList()) ? new ArrayCollection(
                    $em
                    ->getRepository('CoreProductBundle:CommonProduct')->createQueryBuilder('p')
                    ->select('p,img,u, prop')
                    ->leftJoin('p.productDataProperty', 'prop')
                    ->leftJoin('p.images', 'img')
                    ->join('p.modificationUnion', 'u')
                    ->where('p.modificationUnion=:modificationUnion')
                    ->orderBy('p.indexPositionModification')
                    ->setParameters(['modificationUnion' => !$obj->getModificationUnion()
                                ? null : $obj->getModificationUnion()->getId()])
                    ->getQuery()
                    ->getResult()) : new ArrayCollection(),
                'deleteable' => false,
                'parent_form' => $formMapper,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'product_modification_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'label' => 'Модификации', //нужно сдеать умолчанию
                'help' => 'Модификации товара, которые чем-то немного отличаются. Например, один и тот же товар, но разного цвета. Основной продукт в модификации нужен для SEO. У неосновных товаров, описание находится в теге &lt;!-- noindex --&gt;',
                'hideSubjectInList' => true   //скрываем себя в списке выбора записей
                )
                , array('sortable' => 'indexPositionModification')
            )
            ->add('similars', 'union',
                array(
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => ($obj && count($obj->getSimilars())) ? new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:ProductSimilarsUnion')->createQueryBuilder('u')
                    ->select('u,targetObject,img')
                    ->join('u.targetObject', 'targetObject')
                    ->leftJoin('targetObject.images', 'img')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject',
                        $obj->getId())
                    ->getQuery()
                    ->getResult()
                ) : $obj->getSimilars(),
                'deleteable' => false,
                'parent_form' => $formMapper,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'admin_core_product_commonproduct_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'label' => 'Товары-заменители', //нужно сдеать  умолчанию
                'help' => 'Товары-заменители - это новые модели товара в рамках одного производителя. Могут использоваться, если товар снят с производства',
                'setThisToTargetObject' => true, //для записи которую прикрепляем ставим также исходную запись
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                )
                , array('sortable' => 'indexPosition'))
            ->add('alternative', 'union',
                array(
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => ($obj && count($obj->getAlternative())) ? new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:ProductAlternativeUnion')->createQueryBuilder('u')
                    ->select('u,targetObject,img')
                    ->join('u.targetObject', 'targetObject')
                    ->leftJoin('targetObject.images', 'img')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject',
                        $obj->getId())
                    ->getQuery()
                    ->getResult()
                ) : $obj->getAlternative(),
                'deleteable' => false,
                'parent_form' => $formMapper,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'admin_core_product_commonproduct_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'label' => 'Альтернативные товары', //нужно сдеать  умолчанию
                'help' => 'Альтернативные товары - это новые модели товаров, которые могут подходить по характеристикам',
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
            ))
            ->with('Дополнительно')
            ->add('accessories', 'union',
                array(
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => ($obj && count($obj->getAccessories())) ? new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:ProductAccessoriesUnion')->createQueryBuilder('u')
                    ->select('u,targetObject,img')
                    ->join('u.targetObject', 'targetObject')
                    ->leftJoin('targetObject.images', 'img')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject',
                        $obj->getId())
                    ->getQuery()
                    ->getResult()
                ) : $obj->getAccessories(),
                'deleteable' => false,
                'parent_form' => $formMapper,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'admin_core_product_commonproduct_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'label' => 'Аксессуары', //нужно сдеать  умолчанию
                'help' => 'Аксессуары, которые могут идти как дополнение к товару',
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                )
                , array('sortable' => 'indexPosition'))
            ->add('services', 'union',
                array(
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => ($obj && count($obj->getServices())) ? new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:ProductServicesUnion')->createQueryBuilder('u')
                    ->select('u,targetObject,img')
                    ->join('u.targetObject', 'targetObject')
                    ->leftJoin('targetObject.images', 'img')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject',
                        $obj->getId())
                    ->getQuery()
                    ->getResult()
                ) : $obj->getServices(),
                'deleteable' => false,
                'parent_form' => $formMapper,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'admin_core_product_commonproduct_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'label' => 'Дополнительные услуги', //нужно сдеать  умолчанию
                'help' => 'Для товара могут быть указаны дополнительные улуги: установка, настройка и т.д.',
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                )
                , array('sortable' => 'indexPosition'))
            ->add('quantityOfPieces', 'text',
                array(
                'label' => 'Количество одинаковых продуктов в данной фасовке/бухте',
                'help' => 'Количество кусков/частей в продукте (в упаковке может быть 100 болтов, или в бухте 200 метров)',
                'required' => false,
                'attr' => ['data-mask' => 'integer']
            ))
            ->add('quantityAlternative', 'union',
                array(
                'label' => 'Другие продукты для количественной альтернативы',
                'columns' => [
                    'images' => [
                        'label' => 'Фото',
                        'identifier' => true,
                        'width' => 64,
                        'type' => 'image',
                        'preview' => '64x64_'
                    ],
                    'article' => ['label' => 'Артикул', 'identifier' => true, 'width' => 120],
                    'captionRu' => ['label' => 'Название', 'identifier' => true],
                    'price' => ['label' => 'Стоимость', 'type' => 'money'],
//                        'quantity' => ['label' => 'Количество', 'type' => 'quantity', 'width' => 64, 'code' => 'core_union_product_quantity_alternative'],
                    'isEnabled' => ['label' => 'Активно', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => ($obj && count($obj->getQuantityAlternative())) ? new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:ProductQuantityAlternativeUnion')->createQueryBuilder('u')
                    ->select('u,targetObject,img')
                    ->join('u.targetObject', 'targetObject')
                    ->leftJoin('targetObject.images', 'img')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject',
                        $obj->getId())
                    ->getQuery()
                    ->getResult()
                ) : $obj->getQuantityAlternative(),
                'parent_form' => $formMapper,
                'deleteable' => false,
                'edit_route' => 'admin_core_product_commonproduct_edit',
                'create_route' => 'admin_core_product_commonproduct_create',
                'find_route' => 'admin_core_product_commonproduct_list',
                'help' => 'Количественная альтернатива - это N-количество того-же продукта в своём составе. '
                .'Необходимо, когда покупатель хочет купить, например, 102 метра кабеля или 39 джеков, а у нас есть продукт на 100 метров и продукт на 1 метр кабеля. '
                .'В этом случае к продукту на 1 м. добавляется количественная альтернатива - продукт на 100 метров. '
                .'При добавлении в корзину 102 м. покупатель выберет два товара на 1 м. и один товар на 100 м.',
                'cascadeUpdateToAllTargetObject' => true,
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                ), array('sortable' => 'indexPosition'))
            ->with('Файлы')
            ->add('instruction', 'multiupload_document',
                array(
                //'hide_field' => array('all'),
                'parent_form' => $formMapper,
                'label' => 'label.instruction',
                ),
                array(
                'sortable' => 'indexPosition',
            ))
            ->with('SEO')
            ->add('isCanBeInYml', null,
                array(
                    'required' => false,
                    'label' => 'Может быть в YML',
                    'help' => 'Этот флаг не последний в определении будет ли продукт находится в YML-каталоге.
                     Еще проверяется статус производителя и если продукт не под заказ, то количество в наличии.'
                ))
            ->add('slug', 'text',
                array(
                'required' => false,
                'label' => 'ЧПУ',
                'help' => 'Заполняется автоматически, если оставить пустым'
        ))
            ->add('slugHistory', 'slug_history',
                array(
                'mapped' => false,
                'label' => 'ЧПУ (старые)',
                'help' => 'Старые ЧПУ. С них происходит редирект с кодом 301.'
            ))
            ;
        $this->add('title', null,
                array(
                'required' => false,
                'label' => 'label.title'
            ))
            ->add('metadescription', 'textarea',
                array(
                'required' => false,
                'label' => 'label.metadescription'
            ))
            ->add('metakeywords', 'textarea',
                array(
                'required' => false,
                'label' => 'label.metakeywords'
        ));
        $formMapper->add('typePrefix', 'text',
                array(
                'required' => false,
                'help' => 'Используется при генерации YML-файлов',
                'label' => 'Тип префикса'
            ))
            ->add('ymlCaption', 'text',
                array(
                'required' => false,
                'help' => 'Значение передается в Яндекс Маркет в теге model',
                'label' => 'Название для YML'
            ))
            ->add('productTags', 'sonata_type_collection',
                array(
                'by_reference' => false,
                'required' => false,
                'label' => 'Теги',
                'help' => 'Поисковые теги используются для более релеватного поиска на сайте',
                'type_options' => array('delete' => true)
                ),
                array(
                'link_parameters' => array('subclass' => $formMapper->getAdmin()->getRequest()->query->get('subclass')),
                'edit' => 'inline',
                'inline' => 'table',
            ))
            ->end()
            ->with('Видео')
            ->add('remoteVideos', 'collection',
                array(
                'attr' => ['class' => 'remote-video-block'],
                'type' => 'remote_video_form',
                'required' => false,
                'by_reference' => false,
                'label' => 'Видео с хостинга',
                'prototype_name' => 'remote_videos_',
                'cascade_validation' => true,
                'allow_add' => true,
                'allow_delete' => true,
                //'options' => ['hostings' => $em->getRepository('CoreDirectoryBundle:VideoHosting')->findAll()]
            ))
            ->end();
    }
}