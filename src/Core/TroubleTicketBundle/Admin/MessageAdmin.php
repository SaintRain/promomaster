<?php

/**
 * Админский класс для переписки в тикетах
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

use Core\TroubleTicketBundle\Entity\Message;

class MessageAdmin extends Admin {

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
        if ($object instanceof Message) {
            $text .= 'Message';
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
                ->add('body', 'textarea', array('required' => false, 'attr' => ['class' => 'span11', 'rows' => '5']))
                ->add('manager', 'sonata_type_model_hidden', array('required'=>true))
                ->add('log', 'sonata_type_model_hidden', array('required'=>true))
                ->add('troubleTicket', 'sonata_type_model_hidden', array('required'=>true))
                //->add('date', null)
        ;

    }

    /**
     * Отображение списка статусов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'id'))
            ->add('body', null, array('label' => 'label.caption'))
            ->addIdentifier('manager', null, array('label' => 'label.isEnabled'))
            ->add('log', null, array('label' => 'label.log'))
            ->addIdentifier('troubleTicket', null, array(
                                'label' => 'label.indexPosition',
                                'sortable' => true))
            ->add('_action', 'actions', array(
				'label' => 'label.actions',
				'actions' => array(
					'edit' => array(),
					'delete' => array(
						'ask_confirmation' => true
					 )
				)
			))
        ;
    }

    /**
     * Настройки фильтра для списка статусов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('manager', null, array('label' => 'label.caption'))
            ->add('troubleTicket', null)
            ->add('date', null, array('label' => 'label.date'))
            ->add('log', null, array('label' => 'label.log'))
        ;
    }

    public function getTemplate($name)
    {
            switch($name) {
                    // Общий список
                    case 'edit':
                            return 'CoreTroubleTicketBundle:Admin\Message:edit.html.twig';
                    default:
                            return parent::getTemplate($name);
            }
    }

}