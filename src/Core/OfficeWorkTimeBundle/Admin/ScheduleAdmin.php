<?php

namespace Core\OfficeWorkTimeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ScheduleAdmin extends Admin
{

    protected $translationDomain = 'CoreOfficeWorkTimeBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'dateTime'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        if ($object->getId()) {
            $dz = new \DateTimeZone($this->getConfigurationPool()->getContainer()->getParameter('default_timezone'));
            $object->getDateTime()->setTimeZone($dz);
        }
        $text = null === $object->getId() ? 'Добавление новой даты' : 'Редактирование даты от «' . $object->getDateTime()->format('d-m-Y') . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('dateTime', null, [
                'label' => 'Дата',
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr' => ['class' => 'datepicker']
            ])
            ->add('type', 'choice', [
                'label' => 'Тип дня',
                'empty_value' => 'Необходимо выбрать',
                'required' => false,
                'choices' => $this->getDayType()
            ])
            ->add('updatedDateTime', null, [
                'label' => 'Дата обновления',
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'disabled' => true,
                //'data' => ($this->getSubject()) ? $this->getSubject()->getUpdatedDateTime() : new \DateTime(),
                'attr' => ['class' => 'datepicker']
            ])
        ;
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('dateTime', null, [
                'label' => 'Дата',
                'format' => 'dd MMMM yyyy',
            ])
            ->add('type', 'choice', [
                'label' => 'Тип дня',
                'empty_value' => 'Необходимо выбрать',
                'required' => false,
                'choices' => $this->getDayType()
            ])
            ->add('updatedDateTime', null, [
                'label' => 'Дата обновления',
                'format' => 'dd MMMM yyyy',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('dateTime', null, [
                'label' => 'Дата',
                'attr' => ['class' => 'datepicker']
            ], null, [
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd.MM.yyyy',
                'widget' => 'single_text',
                //'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
            ])
            ->add('type', 'doctrine_orm_callback', [
                'callback'   => [$this, 'searchByDayType'],
                'field_type' => 'choice',
                'label' => 'Тип дня',
            ], null, ['choices' => $this->getDayType()])
            ->add('updatedDateTime', 'doctrine_orm_callback', [
                'callback'   => [$this, 'searchByDate'],
                'field_type' => 'datetime',
                'label' => 'Дата обновления',
            ], null, [
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd.MM.yyyy',
                'widget' => 'single_text',
                //'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
            ])
        ;
    }

    /**
     * Поиск по типу дня
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return boolean
     */
    public function searchByDayType($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }

        $queryBuilder->andWhere(sprintf('%s.type = :type', $alias));
        $queryBuilder->setParameter('type', $value['value']);

        return true;
    }

    /**
     * Поиск по дате
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return boolean
     */
    public function searchByDate($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $dateTime = $value['value'];
        $start = $dateTime->format('Y-m-d 00:00');
        $end = $dateTime->format('Y-m-d 23:59');
        $queryBuilder->andWhere(sprintf('%s.updatedDateTime >= :start OR %s.updatedDateTime <= :end', $alias, $alias));
        $queryBuilder->setParameter('start', $start)
                    ->setParameter('end', $end);

        return true;
    }

    protected function getDayType()
    {
        return [
            '-1'    => 'Сокращенный день',
            '0'     => 'Рабочий день',
            '1'     => 'Выходной день'
        ];
    }
}
