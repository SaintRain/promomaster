<?php

/**
 * Админский класс для стран
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CountryAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'isEnabled'
    );

    protected function configureRoutes(RouteCollection $collection)
    {
        // Убираем кнопку добавления стран
        $collection->remove('create');
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = 'breadcrumb.' . ($object->getId() ? 'edit' : 'create') . '.' . 'Country';
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . ' (' . $object->getAlpha2() . ')»' : '';
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

        $formMapper
            ->with('General')
            ->add('id', null, array(
                'label' => 'label.id',
                'disabled' => true))
            ->add('isEnabled', null, array(
                'label' => 'label.isEnabled',
                'required' => false))
            ->add('captionRu', 'text', array(
                'label' => 'label.caption',
                'disabled' => true,
                'data' => $obj->getId() ? $obj->getCaptionRu() : ''
                ))
            ->add('alpha2', null, array(
                'label' => 'label.alpha2',
                'disabled' => true))
            ->add('numeric', null, array(
                'label' => 'label.numeric',
                'disabled' => (null !== $obj && strlen($obj->getNumeric()) === 3)))
            ->add('indexPosition', null, array(
                'label' => 'label.indexPosition'))
            ->add('updatedAt', null, array(
                'label' => 'label.updatedAt',
                'widget' => 'single_text',
                'required' => false,
                'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy, HH:mm',
                'disabled' => true))
            ->end();
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'label.id'))
            ->addIdentifier('captionRu', null, array('label' => 'label.caption', 'template' => 'CoreDirectoryBundle:Admin:List/get_caption_ru.html.twig'))
            ->addIdentifier('alpha2', null, array('label' => 'label.alpha2'))
            ->addIdentifier('numeric', null, array('label' => 'label.numeric'))
            ->add('regionsAmount', null, array('label' => 'label.regionsAmount', 'template' => 'CoreDirectoryBundle:Admin:List/regions_amount_by_country.html.twig'))
            ->add('citiesAmount', null, array('label' => 'label.citiesAmount', 'template' => 'CoreDirectoryBundle:Admin:List/cities_amount_by_country.html.twig'))
            ->add('indexPosition', null, array(
                'label' => 'label.indexPosition',
                'editable' => true
            ))
            ->add('isEnabled', null, array(
                'label' => 'label.isEnabled',
                'sortable' => true,
                'editable' => true))
            ->add('_action', 'actions', array(
                'label' => 'label.actions',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )
        ));
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('alpha2', null, array('label' => 'label.alpha2'))
            ->add('indexPosition', null, array('label' => 'label.indexPosition'))
            ->add('isEnabled', null, array('label' => 'label.isEnabled'))
        ;
    }

    /**
     * Получить Регионы с городами
     * @param string $context
     * @return Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery
     * select
      (select count(*) from core_directory_region as region WHERE region.country_id = country.id) as regionCount,
      (select count(*) from  core_directory_city AS city WHERE city.country_id = country.id) as cityCount,
      country.* FROM core_directory_country AS country
      #   WHERE country.id = 190
      ;
     * @param type $context
     * @return type
     */
    public function createQuery($context = 'list')
    {
        $queryBuilder = parent::createQuery($context);
        $queryBuilder
            ->addSelect('r')
            ->leftJoin(sprintf('%s.regionList', $queryBuilder->getRootAlias()), 'r')
        ;
        return $queryBuilder;
    }

}
