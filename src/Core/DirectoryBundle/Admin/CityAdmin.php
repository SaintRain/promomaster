<?php

/**
 * Админский класс для городов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CityAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    protected $formOptions = array(
        'cascade_validation' => true,
    );
    
    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        if ($object->getId()) {
            $text = 'Город';
        } else {
            $text = 'Добавление нового города';
        }

        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getName() . '»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        $formMapper
                ->with('Основное')
                    ->add('country', 'sonata_type_model', array(
                        'property' => 'captionRu',
                        'empty_value' => 'Необходимо выбрать',
                        'label' => 'Страна',
                        'required' => true))
                    ->add('region', 'sonata_type_model', array(
                        'empty_value' => 'Необходимо выбрать',
                        'label' => 'Регион',
                        'required' => true))
                    ->add('area', null, array(
                        'label' => 'Район',
                        'required' => false))
                    ->add('name', 'text', array(
                        'label' => 'Навазвание',
                    ))
                    ->add('timeZone', null, array(
                        'label' => 'Временная зона'
                    ))
                    ->add('isCapitalOfCountry', 'choice', array(
                        'choices' => array(
                            0 => 'Нет',
                            1 => 'Да'
                        ),
                        'attr' => array('class' => ''),
                        'label' => 'Столица страны'
                    ))
                    ->add('isCapitalOfRegion', 'choice', array(
                        'choices' => array(
                            0 => 'Нет',
                            1 => 'Да'
                        ),
                        'label' => 'Столица региона',
                        'attr' => array('class' => '')
                    ))
                    ->add('postIndex', null, array('label' => 'Почтовый индекс'))
                    ->add('latitude', 'number', array('label' => 'Широта', 'precision' => 6, 'required' => false))
                    ->add('longitude', 'number', array('label' => 'Долгота', 'precision' => 6, 'required' => false))
                    ->add('geoipName', 'collection', array(
                        'required' => false,
                        'label' => 'ID GEOIP',
                        'type' => 'text',
                        'allow_add' => true,
                        'allow_delete' => true,
                        'prototype_name' => '__geoip__',
                        'options' => array(
                            'required' => false,
                            'attr' => array('class' => 'collection-element')
                        )
                    ))
                ->end()
                ->with('ID траспортных компаний')
                    ->add('emsId', null, array('label' => 'EMS'))
                    ->add('dellinId', null, array('label' => 'Деловые линии'))
                    ->add('pekId', null, array('label' => 'ПЭК'))
                    ->add('baikalServiceId', null, array('label' => 'Байкал сервис'))
                    ->add('gruzovozoffId', null, array('label' => 'Грузофф'))
                    ->add('energyId', null, array('label' => 'Энергия'))
                    ->add('cdekId', null, array('label' => 'СДЭК'))
                    ->add('dpdId', null, array('label' => 'DPD'))
                ->end()
                ->with('ГЕО название')
                
                    ->add('geoCityList', 'sonata_type_collection',
                        array(
                            'by_reference' => false,
                            'cascade_validation' => true,
                            'type_options' => array('delete' => true),
                            'label' => 'Название',
                        ), array(
                            'edit' => 'inline',
                            'inline' => 'table',
                            'sortable' => 'position',
                        )
                    )
                ->end()

        ;
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->add('id', null, array(
                    'label' => '№'
                ))
                ->add('country', null, array(
                    'property' => 'captionRu',
                    'label' => 'Страна'
                ))
                ->add('region', null, array(
                    'label' => 'Регион'
                ))
                ->addIdentifier('name', null, array(
                    'label' => 'Название'
                ))
                ->add('isCapitalOfCountry', null, array(
                    'label' => 'Столица города'
                ))
                ->add('isCapitalOfRegion', null, array(
                    'label' => 'Столица региона'
                ))
                ->add('timeZone', null, array(
                    'label' => 'Врем. зона'
                ))
                ->add('postIndex', null, array(
                    'label' => 'Почт. индекс'
                ))
                ->add('emsId', null, array('label' => 'ID EMS'))
                ->add('dellinId', null, array('label' => 'ID Деловые линии'))
                ->add('pekId', null, array('label' => 'ID ПЭК'))
                ->add('baikalServiceId', null, array('label' => 'ID Байкал сервис'))
                ->add('gruzovozoffId', null, array('label' => 'ID Грузофф'))
                ->add('energyId', null, array('label' => 'ID Энергия'))
                ->add('cdekId', null, array('label' => 'ID СДЭК'))
                ->add('dpdId', null, array('label' => 'ID DPD'))
                ->add('coordinates', null, array(
                    'label' => 'Широта Долгота',
                    'template' => 'CoreDirectoryBundle:Admin:List/list_coordinates.html.twig'
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('id', 'doctrine_orm_callback', array(
                    'label' => 'ID',
                    'callback' => array($this, 'searchById'),
                    'field_type' => 'text'), null, array('attr' => array('placeholder' => 'ID через запятую', 'title' => 'ID контрагента')
                ))
                ->add('country', null, array(
                    'property' => 'captionRu',
                    'label' => 'Страна'
                ))
                ->add('region', null, array(
                    'label' => 'Страна'
                ))
                ->add('name', 'doctrine_orm_callback', array(
                    'label' => 'Название',
                    'callback' => array($this, 'searchByName'),
                    'field_type' => 'filter_name_type'
                ))
                ->add('isCapital', 'doctrine_orm_callback', array(
                    'label' => 'Столица',
                    'callback' => array($this, 'searchByCapitals'),
                    'field_type' => 'filter_capitals_type'
                ))
                /*
                  ->add('isCapitalOfCountry', null, array(
                  'label' => 'Столица страны'
                  ))

                  ->add('isCapitalOfRegion', null, array(
                  'label' => 'Столица региона'
                  ))
                 * 
                 */
                ->add('postIndex', null, array(
                    'label' => 'Почтовый индекс'), null, array(
                    'attr' => array('placeholder' => 'Почтовый индекс', 'class' => 'sdsd')
                ))
        ;
    }

    /**
     * Переопределяем некоторые шаблоны
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    /**
     * Поиск по id сразу по нескольким через запятую
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                    ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                    ->setParameter('id', $ids);
        }
    }

    public function searchByCapitals($queryBuilder, $alias, $field, $value)
    {
        $fields = array('isCapitalOfCountry', 'isCapitalOfRegion');
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }
        if (count($result['isCapital']) > 1) {
            $where = array_map(function($val) use ($alias) {
                return sprintf('%s.%s', $alias, $val) . ' = :isCapital';
            }, $result['isCapital']);
            $queryBuilder
                    ->andWhere(implode(' AND ', $where))
                    ->setParameter('isCapital', true)
            ;
        } else {
            $val = array_shift($result['isCapital']);
            $queryBuilder
                    ->andWhere($queryBuilder->expr()->eq(sprintf('%s.%s', $alias, $val), ':isCapital'))
                    ->setParameter('isCapital', true)
            ;
        }
    }

    /**
     * Поиск по названию региона
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchByName($queryBuilder, $alias, $field, $value)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }
        if (isset($result['full'])) {
            $queryBuilder
                    ->andWhere($queryBuilder->expr()->eq(sprintf('%s.name', $alias), ':name'))
                    ->setParameter('name', $result['name'])
            ;
        } else {
            $queryBuilder
                    ->andWhere($queryBuilder->expr()->like(sprintf('%s.name', $alias), ':name'))
                    ->setParameter('name', '%' . $result['name'] . '%')
            ;
        }
    }

    /**
     * Преодпределенная подстановка для фильтра
     * @return type
     */
    public function getFilterParameters()
    {
        $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
        $country = $em->getRepository('CoreDirectoryBundle:Country')->findOneBy(array('alpha2' => 'RU'));
        if ($country) {
            $this->datagridValues = array_merge(array(
                'country' => array(
                    'value' => $country->getId()
                )
                    ), $this->datagridValues
            );
        }
        return parent::getFilterParameters();
    }

}
