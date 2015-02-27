<?php

/**
 * Админский класс для видео
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
use  Core\DirectoryBundle\Admin\Form\Mapper\VideoHostingFormMapper;

class VideoHostingAdmin extends Admin
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
            $text = 'Видео-хостинг';
        } else {
            $text = 'Добавление нового видео-хостинга';
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
        new VideoHostingFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array('label' =>'ID'))
            ->addIdentifier('name', null, array('label' =>'Сис. Имя'))
            ->add('captionRu', null, array('label' =>'Название'))
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array('label' =>'ID'))
            ->add('name', null, array('label' =>'Сис. Имя'))
            ->add('captionRu', null, array('label' =>'Название'))
        ;
    }

}