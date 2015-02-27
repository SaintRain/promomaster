<?php

/**
 * Админский класс для редактирования настроек
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AdminInterface;
use Core\ConfigBundle\Entity\Config;

class ConfigAdmin extends Admin
{

    protected $translationDomain = 'messages'; // дефолтная группа (домен) для перевода

    public $supportsPreviewMode = true;

    /**
     * Форма редактирования
     * {@inheritdoc}
     */

    public function toString($object)
    {
        $text = ($object->getId() ? 'Редактирование настройки' : 'Cоздание новой настройки') . ' ';
        $text .= $object->getCaption() ? '«' . $object->getCaption() . '»' : '';

        return $text;
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
            case 'edit':
                return 'CoreConfigBundle:Admin\Form:edit.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Основное')
            ->add('caption', null, ['label' => 'Название', 'required' => true])
            ->add('name', null, [
                'label' => 'Системное имя',
                'required' => false,
                'help' => 'Если оставить пустым, то будет заполнено автоматически'
            ])
            ->add('description', 'textarea', ['label' => 'Примечание', 'required' => false])
            ->add('group', null, [
                'property' => 'caption',
                'help'=>'Используется для группировки настроек и у добства фильтрации',
                'label' => 'Группа',
                'required' => false,
            ])
            ->add('type', 'choice', [
                'label' => 'Тип настройки',
                'required' => true,
                'empty_value' => 'Ничего не выбрано...',
                'choices' => Config::getEditTypes(true)
            ])
            ->add('highlight', 'choice', [
                'label' => 'Фоматирование',
                'help' => 'Подсветка кода как в редакторе',
                'required' => false,
                'empty_value' => 'Без форматирования',
                'choices' => Config::getHighlightTypes(true),
            ])
            ->add('data', 'config_data', ['label' => 'Значение', 'required' => false, 'attr' => ['class' => 'span5 textarea']])
            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           // ->add('id', null, array('label' => 'ID'))
            ->add('caption', null,
                array('label' => 'Название', 'template' => 'CoreConfigBundle:Admin\Form\list_fields:caption.html.twig'))
            ->add('name', null, array(
                'label' => 'Системное имя',
                'template' => 'CoreConfigBundle:Admin\Form\list_fields:name.html.twig'
            ))
            ->add('type', null, array(
                'label' => 'Тип настройки',
                'template' => 'CoreConfigBundle:Admin\Form\list_fields:type.html.twig'
            ))
            ->add('data', null,
                array('label' => 'Значение', 'template' => 'CoreConfigBundle:Admin\Form\list_fields:data.html.twig'))
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
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('group', null, array('label' => 'Группа', ), null,
                ['property' => 'caption', 'attr' => ['placeholder' => 'Группа']])
            ->add('caption', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('type', 'doctrine_orm_string', array(), 'choice',
                array('attr' => ['placeholder' => 'Тип настройки'], 'choices' => Config::getEditTypes(true)));

    }

}
