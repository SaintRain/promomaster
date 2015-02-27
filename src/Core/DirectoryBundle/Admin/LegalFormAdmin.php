<?php

/**
 * Админский класс для списка организационно-правовых форм
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LegalFormAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder()
    {
        if ($this->getSubject()->getId()) {
            $this->formOptions = array('validation_groups' => array('Update', 'Default'));
        } else {
            $this->formOptions = array('validation_groups' => array('Default'));
        }
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового типа организационно-правовой формы' : 'Организационно-правовая форма «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

//        $obj = $this->getSubject(); //объект для формы
//        $container = $this->getConfigurationPool()->getContainer();    //контейнер
//        $options = array('obj' => $obj, 'container' => $container);
        $obj = $this->getSubject();
        $formMapper->with('Основное')
                ->add('captionRu', null, ['label' => 'Название'])
                ->add('fullCaptionRu', null, ['label' => 'Полное название'])
                ->add('name', null, ['label' => 'Системное имя', 'help' => 'Может использоваться программистом', 'required' => ($obj->getId()) ? true : false]);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))
                ->addIdentifier('fullCaptionRu', 'string', array('label' => 'Полное название'))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(
                            'ask_confirmation' => true
                        )
                    )
                ))
        ;
    }

}
