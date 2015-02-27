<?php

/**
 * Админский класс редактирование тегов для продукта
 *
 * @author  Sergeev A.M,
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\DirectoryBundle\Admin\Form\Mapper\ProductTagsFormMapper;

class ProductTagsAdmin extends Admin {

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
    public function toString($object) {
        $text = ($object->getId() ? 'Редактирование тега' : 'Добавление тега');
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
        new ProductTagsFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('captionRu', null, array(
                    'label' => 'Название тегов'
                ))
        ;
    }

}
