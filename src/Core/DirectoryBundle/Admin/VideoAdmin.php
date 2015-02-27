<?php

/**
 * Админский класс для видео
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * @todo Класс до конца не реализован (так как нет необходимости)
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use  Core\DirectoryBundle\Admin\Form\Mapper\RemoteVideoFormMapper;

class VideoAdmin extends Admin
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
            $text = 'Видео';
        } else {
            $text = 'Добавление нового видео';
        }

        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '»' : '';
        
        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);
        new RemoteVideoFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('captionRu', null, array('label' =>'Название'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array('label' =>'ID'))
            ->add('captionRu', null, array('label' =>'Название'))
        ;
    }



}