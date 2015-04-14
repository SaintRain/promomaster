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

class WorldSectionAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'isEnabled'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = 'breadcrumb.' . ($object->getId() ? 'edit' : 'create') . '.' . 'WorldSection';
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

        $formMapper
            ->with('General')
            ->add('captionRu', null, array('label' => 'Название'))
            ->add('name', null, array('label' => 'Системное имя', 'required'=>false, 'help' => "Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>"))
            ->add('createdDatetime', null, array(
                'label' => 'Добавлен',
                'widget' => 'single_text',
                'required' => false,
                'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy, HH:mm',
                'disabled' => true))
            ->add('updatedDatetime', null, array(
                'label' => 'Изменен',
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
            ->add('id', null, array('label' => 'label.id'))
            ->addIdentifier('captionRu', null, array('label' => 'Название'))
            ->add('name', null, array('label' => 'Системное имя'))
            ->add('createdDatetime', null, array('label' => 'Добавлен'))
            ->add('updatedDatetime', null, array('label' => 'Изменен'))
        ;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID контрагента',
                'callback'   => array($this, 'searchById'),
                'field_type' => 'text'),null,
                array('attr'=>array('placeholder'=>'ID раздела, через запятую', 'title'=>'ID раздела, через запятую')
                ))
            ->add('captionRu', null, array('label' => 'Название'), null, array('attr'=>array('placeholder'=>'Название', 'title'=>'Название')))
            ->add('createdDatetime', 'doctrine_orm_callback',
                array(
                    'label' => 'Добавлен',
                    'callback'   => array($this, 'searchByUpdated'),
                    'field_type' => 'admin_date_range'), null,
                array('placeholder'=>'Добавлен')
            )
            ->add('updatedDatetime', 'doctrine_orm_callback',
                array(
                    'label' => 'Изменен',
                    'callback'   => array($this, 'searchByUpdated'),
                    'field_type' => 'admin_date_range'), null,
                array('placeholder'=>'Изменен')
            )
        ;
    }

    public function getTemplate($name)
    {
        switch($name) {
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
        foreach($expValue as $val) {
            $ids[] = (int)$val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                ->setParameter('id',$ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id',$ids);
        }
    }

    public function searchByCreated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'createdDateTime', 'from'=>'fromCr', 'to'=>'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByUpdated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'updatedDateTime', 'from'=>'fromUp', 'to'=>'toUp');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value, $searchParams)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }

        $dates = $value['value'];
        if($dates['to'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
        }
    }

}
