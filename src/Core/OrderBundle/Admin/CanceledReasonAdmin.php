<?php

/**
 * Админский класс для причин отмены
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\WaybillsFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\OrderBundle\Admin\Form\Mapper\CanceledReasonFormMapper;
use Core\LogisticsBundle\Admin\StockAdmin;

class CanceledReasonAdmin extends Admin
{

    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление новой причины' : 'Редактирование причины «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new CanceledReasonFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка 
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))
                ->add('name', null, ['label' => 'Сис. имя'])
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(
                            'ask_confirmation' => true
                        )
                    )
        ));
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                ->add('captionRu', null, ['label' => 'Название'])
                ->add('name', null, [
                    'label' => 'Системное имя',
                    'disabled' => !$this->isGranted('UPDATE_NAME'),
        ]);
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}
