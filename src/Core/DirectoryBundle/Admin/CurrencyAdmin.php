<?php

/**
 * Админский класс для валют
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CurrencyAdmin extends Admin {

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'isEnabled'
    );

    protected function configureRoutes(RouteCollection $collection)
    {
        // Убираем кнопку добавления валют
        $collection->remove('create');
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.' . ($object->getId() ? 'edit' : 'create') . '.' . 'Currency';
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . ' (' . $object->getCurrency() . ')»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        //объект для формы
        $obj = $this->getSubject();

        //контейнер
        $container = $this->getConfigurationPool()->getContainer();

        $formMapper
            ->with('Основное')
            ->add('id', null, array(
                'label' => 'label.id',
                'disabled' => true))
            ->add('isEnabled', null, array(
                'label' => 'label.isEnabled',
                'required' => false))
            ->add('captionRu', 'text', array(
                'label' => 'label.caption',
                'disabled' => true,
                'data' => $obj->getId() ? $obj->getCaptionRu() : ''
                ))
            ->add('currency', null, array(
                'label' => 'label.currency',
                'disabled' => true))
            ->add('symbol', null, array(
                'label' => 'label.symbol'))
            ->add('indexPosition', null, array(
                'label' => 'label.indexPosition'))
            ->add('updatedAt', null, array(
                'label' => 'label.updatedAt',
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd.MM.yyyy, HH:mm',
                'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
                'disabled' => true))
            ->end()
            ->with('Курс к Рублю')
                ->add('currencyRUB', 'money', array(
                    'label' => 'Курс в рублях',
                    'precision' => 5,
                    'attr' => ['data-mask' => 'money'],
                    'required' => false,
                    'disabled' => true))
                ->add('currencyDateTime', null, array(
                    'label' => 'Дата курса',
                    'widget' => 'single_text',
                    'required' => false,
                    'format' => 'dd.MM.yyyy, HH:mm',
                    'view_timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
                    'disabled' => true))
            ->end();
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'label.id'))
            ->addIdentifier('captionRu', null, array('label' => 'label.caption', 'template' => 'CoreDirectoryBundle:Admin:List/get_caption_ru.html.twig'))
            ->addIdentifier('symbol', null, array('label' => 'label.symbol'))
            ->addIdentifier('currency', null, array('label' => 'label.currency'))
            ->addIdentifier('currencyRUB', null, array('label' => 'Курс в рублях', 'template' => 'CoreDirectoryBundle:Admin/List:list_currency_rub.html.twig'))
            ->add('indexPosition', null, array(
                'label' => 'label.indexPosition',
                'editable' => true
            ))
            ->add('isEnabled', null, array(
                'label' => 'label.isEnabled',
                'sortable' => true,
                'editable' => true))
            ->add('_action', 'actions', array(
                'label' => 'label.actions',
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
            ->add('currency', null, array('label' => 'label.currency'))
            ->add('isEnabled', null, array('label' => 'label.isEnabled'))
            ->add('indexPosition', null, array('label' => 'label.indexPosition'))
        ;
    }

}