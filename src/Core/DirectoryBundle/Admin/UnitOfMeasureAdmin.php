<?php

/**
 * Админский класс для единиц измерения
 *
 * @author  Sergeev A.M,
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Core\DirectoryBundle\Admin\Form\Mapper\UnitOfMeasureFormMapper;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UnitOfMeasureAdmin extends Admin {

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
    );

    /**
     * Переписываем шаблон, чтобы встроить свой JS
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
                break;
        }
    }
    
    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = ($object->getId() ? 'Редактирование единицы измерения' : 'Добавление единицы измерения');
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';
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

        new UnitOfMeasureFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
                $listMapper
                ->addIdentifier('captionRu', null, array('label' => 'Название единицы измерения'))
                ->addIdentifier('shortCaptionRu', null, array('label' => 'Краткое обозначение'))
                ->addIdentifier('code', null, array('label' => 'Международное обозначение'))
                ->add('okeiCode', null, array(
                    'label' => 'Код ОКЕИ',
                    'required' => true
                ))
                ->add('group.captionRu', null, array(
                    'label' => 'Группа'))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки',
                'editable' => true))
                ->add('isEnabled', null, array(
                    'label' => 'Активно',
                    'sortable' => true,
                    'editable' => true))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
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
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                //->add('group', null, array('label' => 'Группа', array('property'=>'captionRu')))
                        

                ->add('group', null, array('label' => 'Группа'), null, array('attr' => ['placeholder' => 'Группа'], 'property' => 'captionRu'))
                ->add('code', null, array('label' => 'Между. обозначение'), null,['attr' => ['placeholder' => 'Между. обозначение'] ])
                ->add('captionRu', null, array('label' => 'Название'), null,['attr' => ['placeholder' => 'Название'] ])
                ->add('isEnabled', null, array('label' => 'Активно'), null,['attr' => ['placeholder' => 'Активно'] ])
        ;
    }
    
}
