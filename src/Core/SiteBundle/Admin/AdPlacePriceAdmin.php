<?php

 /**
 * Админский класс для цен рекламные места
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AdPlacePriceAdmin extends Admin
{
    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * Переписываем шаблоны
     *
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление новой цены' : 'Редактирование цены рекламного места ' . $object->getAdPlace()->getName();
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj = $this->getSubject();

        $formMapper
            ->with('Основное')
            ->add('adPlace', null, ['label' => 'Рекламное место', 'property' => 'name'])
            ->add('priceModel', null, ['label' => 'Рекламное место', 'property' => 'captionRu'])
            ->add('cost', 'money', ['label' => 'Стоимость'])
            ->end()
            ->with('Скидки')
                ->add('discounts', 'sonata_type_collection', array(
                    'label' => 'Скидки',
                    'by_reference' => false,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'label' => '№'
            ))
            ->add('createdDateTime', null, ['label' => 'Дата создания'])
            ->add('priceModel.captionRu', null, ['label' => 'Рекламное место'])
            ->add('adPlace.name', null, ['label' => 'Рекламное место'])
            ->add('cost', 'money', ['label' => 'Стоимость'])
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
            //->add('createdDateTime', null, ['label' => 'Дата создания'])
            ->add('priceModel', null, ['label' => 'Рекламное место'], null, array('attr' => ['placeholder' => 'Ценовая модель']))
            ->add('adPlace', null, ['label' => 'Рекламное место'], null, array('property' => 'name', 'attr' => ['placeholder' => 'Рекламное место']))
            ->add('cost', null, ['label' => 'Стоимость'], null, array('attr' => ['placeholder' => 'Стоимость']))
        ;
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
}