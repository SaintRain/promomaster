<?php

/**
 * Админский класс для редактирования групп настроек
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

class GroupAdmin extends Admin
{

    protected $translationDomain = 'messages'; // дефолтная группа (домен) для перевода

    /**
     * Форма редактирования
     * {@inheritdoc}
     */

    public function toString($object)
    {
        $text = ($object->getId() ? 'Редактирование группы' : 'Создание новой группы') . ' ';
        $text .= $object->getCaption() ? '«' . $object->getCaption() . '»' : '';

        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Основное')
            ->add('caption', null, ['label' => 'Название группы', 'required' => true])
            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array('label' => 'ID'))
            ->addIdentifier('caption', null, array('label' => 'Название'))
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



}
