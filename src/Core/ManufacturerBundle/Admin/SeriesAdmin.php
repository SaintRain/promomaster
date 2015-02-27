<?php

/**
 * Админский класс для серий брендов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SeriesAdmin extends Admin
{

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);
        $formMapper
                ->with('Основное')
                ->add('id', 'text', ['label' => 'ID', 'disabled'=>true, 'attr' => ['style' => 'width:60px']])
                ->add('captionRu', 'text', ['label' => 'Название', 'required'=>true, 'attr' => ['style' => 'width:300px']])
                ->add('slug', null, array(
                    'required' => false,
                    'label' => 'Системное имя', 'help' => 'Если оставить пустым, то заполниться автоматически','attr' => ['style' => 'width:300px']))
                ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
                ->end();
    }

}
