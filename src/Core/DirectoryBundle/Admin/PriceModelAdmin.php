<?php

/**
 * Админский класс типа размщения
 *
 * @author  Kaluzhny N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


class PriceModelAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода
    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = ($object->getId() ? 'Редактирование' : 'Добавление нового') . ' ' . 'типа показа';
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';
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
            ->add('captionRu', null, array(
                'label' => 'Название'
            ))
            ->add('name', null, array(
                'label' => 'Системно имя',
                'required' => false,
                'help' => "Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>"
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активно'
            ))
            ->add('indexPosition', null, array('label' => 'Позиция сортировки', 'required' => false))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array(
                'label' => '№'
            ))
            ->addIdentifier('captionRu', null, array(
                'label' => 'Название'
            ))
            ->add('name', null, array(
                'label' => 'Системно имя'
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активно'
            ))
            ->add('indexPosition', null, array('label' => 'Позиция сортировки'))
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
            ->add('captionRu', null, array(
                'label' => 'Название'
            ))
            ->add('name', null, array(
                'label' => 'Системно имя'
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активно'
            ))
            ->add('indexPosition', null, array('label' => 'Позиция сортировки'))
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
}