<?php

/**
 * Админский класс для логов тикетов
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Core\TroubleTicketBundle\Entity\Log;

class LogAdmin extends Admin {

  protected $translationDomain = 'CoreTroubleTicketBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $this->formOptions = array('validation_groups' => array('Backend', 'Default'));
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }
    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.'.($object->getId() ? 'edit' : 'create').'.';
        if ($object instanceof Log) {
            $text .= 'Log';
        } else {
            $text .= 'empty';
        }
        $text = $this->trans($text);
        $text .=  $object->getId() ? ' № '.$object->getId() : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('General')
                ->add('manager',null)
                ->add('message',null)
                ->add('date',null)
                ->add('troubleTicket',null,array('empty_value'=>'dffd'))
        ;

    }


    /**
     * Отображение списка статусов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('manager',null)
                ->add('message',null)
                ->add('date',null)
                ->add('oldPriority',null)
                ->add('newPriority',null)
        ;
    }

    /**
     * Настройки фильтра для списка статусов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('manager',null)
                ->add('message',null)
                ->add('date',null)
                ->add('oldPriority',null)
                ->add('newPriority',null)
        ;
    }

    
}