<?php

/**
 * Админский класс для цветов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ColorBundle\Entity\Color;
use Core\ColorBundle\Admin\Form\Mapper\ColorFormMapper;

class ColorAdmin extends Admin {

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового цвета' : 'Цвет «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        if ($obj instanceof Color) {
            new ColorFormMapper($formMapper, $options);
        }
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->addIdentifier('captionRu', null, array('label' => 'Название'))
            ->add('hex', null, array(
                'label' => 'Цвет (HEX)',
                'template' => 'CoreColorBundle:Admin\List:list_color_preview.html.twig',))
            ->add('count_hue', null, array(
                'label' => 'Кол-во оттенков',
                'mapped' => false,
                'template' => 'CoreColorBundle:Admin\List:list_count_hue.html.twig',))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки',
                'editable' => true))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'sortable' => true,
                'editable' => true))
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )
        ));
    }

    /**
     * Переписываем запрос на выборку для списка
     */
    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $query->leftJoin($rootAlias . '.palette', 'palette')->addSelect('palette');
        return $query;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('captionRu', null, array('label' => 'Название'))
            ->add('hex', null, array('label' => 'Цвет (HEX)'))
            ->add('indexPosition', null, array('label' => 'Позиция сортировки'))
            ->add('isEnabled', null, array('label' => 'Активность'))
        ;
    }

}