<?php

/**
 * Админский класс для регионов
 *
 * @author  Sergeev A.M./.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RegionAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

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
        $text = ($object->getId() ? 'Редактирование' : 'Добавление нового') . ' ' . 'региона';
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
                    'required' => true
                ))
                ->add('name', 'text', array(
                    'label' => 'Навзвание'
                ))
                ->add('timeZone', null, array(
                    'label' => 'Временная зона'
                ))
                ->add('geoipName', null, array('label' => 'ID GEOIP'))
                ->end()
                ->with('ID траспортных кампаний')
                ->add('emsId', null, array('label' => 'ID EMS'))
                ->add('dpdId', null, array('label' => 'ID DPD'))
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
                ->addIdentifier('name', null, array(
                    'label' => 'Название'
                ))
                ->add('citiesAmount', null, array(
                    'label' => 'Кол-во городов',
                    'template' => 'CoreDirectoryBundle:Admin:List/cities_amount_by_region.html.twig'
                ))
                ->add('timeZone', null, array(
                    'label' => 'Временная зона'
                ))
                ->add('emsId', null, array('label' => 'ID EMS'))
                ->add('dpdId', null, array('label' => 'ID DPD'))
                ->add('geoipName', null, array('label' => 'ID GEOIP'))
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
                ->add('name', 'doctrine_orm_callback', array(
                    'label' => 'Название',
                    'callback' => array($this, 'searchByName'),
                    'field_type' => 'filter_name_type')
                )
        /*
          ->add('timeZone', null, array(
          'label' => 'Временная зона'
          ))
          ->add('emsId', null,array('label' => 'ID EMS'))
          ->add('dpdId', null,array('label' => 'ID DPD'))
          ->add('geoipName', null,array('label' => 'ID GEOIP'))
         *
         */
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
     * Получить Регионы с городами
     * @param string $context
     * @return Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery
     */
    public function createQuery($context = 'list')
    {
        $queryBuilder = parent::createQuery($context);
        $queryBuilder->addSelect('c')
                ->innerJoin(sprintf('%s.cityList', $queryBuilder->getRootAlias()), 'c');

        return $queryBuilder;
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
