<?php

/**
 * Админский класс для размеров рекламных мест
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AdPlaceSizeAdmin extends Admin
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
        if ($object->getId()) {
            $text = 'Редактирование размера';
        } else {
            $text = 'Добавление нового размера';
        }

        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->with('Основное')
            ->add('captionRu', null, ['label' => 'Название'])
            ->add('name', null, ['label' => 'Системное имя', 'required'=>false, 'help'=>'Если оставить пустым, то будет сгенерировано автоматически'])
            ->add('width', null, ['label' => 'Ширина (px)'])
            ->add('height', null, ['label' => 'Высота (px)'])
            ->add('isEnabled', null, ['label' => 'Выводить на сайте', 'required'=>false])
            ->end();
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'label' => 'ID'
            ))
            ->addIdentifier('captionRu', null, array(
                'label' => 'Название'
            ))
            ->addIdentifier('name', null, array(
                'label' => 'Системное имя'
            ))
            ->add('width', null, array(
                'label' => 'Ширина'
            ))
            ->add('height', null, array(
                'label' => 'Высота'
            ))
            ->add('isEnabled', null, array(
                'label' => 'Выводить на сайт'
            ))

          ;
    }



}
