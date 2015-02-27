<?php

/**
 * Админский класс для статусов тикетов
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;

use Core\TroubleTicketBundle\Entity\Status;

class StatusAdmin extends Admin {

  protected $translationDomain = 'CoreTroubleTicketBundle'; // дефолтная группа (домен) для перевода

  public function getFormBuilder() {
      //  $this->setUniqid('product');   //ставим имя формы

        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }
    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.'.($object->getId() ? 'edit' : 'create').'.';
        if ($object instanceof Status) {
            $text .= 'Status';
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
                ->add('captionRu', null)
                ->add('sysName', null, array('required'=>false, 'help' => "Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>"))
                ->add('indexPosition', null)
                ->add('isEnabled', null, array('required'=>false))
                ->end()
        ;

    }

    /**
     * Отображение списка статусов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'id'))
            ->addIdentifier('captionRu', null, array('label' => 'label.caption'))
            ->add('sysName', null, array(
				'label' => 'label.sysName',
				'sortable' => true,
				'editable' => true))
            ->add('isEnabled', null, array('label' => 'label.isEnabled'))
            ->add('indexPosition', null, array(
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
            ->add('captionRu', null, array('label' => 'label.caption'))
            ->add('isEnabled', null)
            ->add('sysName', null, array('label' => 'label.sysName'))
        ;
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        \Core\TroubleTicketBundle\Admin\TroubleTicketAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }
}