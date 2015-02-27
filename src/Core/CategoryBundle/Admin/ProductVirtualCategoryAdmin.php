<?php

/**
 * Админский класс для вирутальных категорий
 *
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\CategoryBundle\Admin\Form\Mapper\ProductVirtualCategoryFormMapper;

class ProductVirtualCategoryAdmin extends Admin {

    protected $translationDomain = 'CoreCategoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        if ($object->getId()) {
            $text = 'Свойство';
        } else {
            $text = 'Добавление нового свойства';
        }

        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';

        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);
        new ProductVirtualCategoryFormMapper($formMapper, $options);
       
    }


    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('captionRu', null, array('label'=>'Название'))
                ->addIdentifier('name', null, array('label'=>'Системное имя'))
                ->add('isEnabled', null, array('label'=>'Активное', 'sortable' => true,
                    'editable' => true));
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('captionRu', null, array('label'=>'Название'))
                ->add('name', null, array('label'=>'Системное имя'))
                ->add('isEnabled', null, array('label'=>'Активное'));
        ;
    }

    

}