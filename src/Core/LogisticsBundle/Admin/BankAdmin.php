<?php

/**
 * Админский класс для банков
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\BankFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class BankAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового банка' : 'Редактирование банка «' . $object->getCaption() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new BankFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->addIdentifier('caption', 'string', array('label' => 'Название банка'))
                ->add('bic', 'string', array('label' => 'БИК/SWIFT', 'template' => 'CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig'))
                ->add('correspondentAccount', null, ['label' => 'Кор. счет'])
                ->add('idIn1c', null, ['label' => 'ID 1С-Бухг.'])
                ->add('license', null, ['label' => 'Лицензия'])
                ->add('address', null, ['label' => 'Адрес'])
                ->add('phones', null, ['label' => 'Телефон(ы)'])
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
    protected function configureDatagridFilters(DatagridMapper $datagrid) {
        $datagrid->add('id', null, ['label'=>'ID банка'], null,
                    array('attr'=> ['placeholder' => 'ID банка']
                ))
                ->add('bic', null, ['label'=>'БИК'], null,
                    array('attr'=> ['placeholder' => 'БИК']
                ))
                ->add('correspondentAccount', null, ['label'=>'Кор. счет'], null,
                    array('attr'=> ['placeholder' => 'Кор. счет']
                ))
                ->add('caption', null, ['label'=>'Название'], null,
                    array('attr'=> ['placeholder' => 'Название']
                ))
                ->add('okpo', null, ['label'=>'ОКПО'], null,
                    array('attr'=> ['placeholder' => 'ОКПО']
                ))
                ->add('swift', null, ['label'=>'SWIFT'], null,
                    array('attr'=> ['placeholder' => 'SWIFT']
                ))
                ->add('license', null, ['label'=>'Номер лицензии'], null,
                    array('attr'=> ['placeholder' => 'Номер лицензии']
                ))
                ->add('isLicenseCanceled', null, ['label'=>'Лицензия аннулирована'], null,
                    array('attr'=> ['placeholder' => 'Лицензия аннулирована']
                ))
                ->add('idIn1c', null, ['label'=>'ID 1С-Бухгалтерия'], null,
                    array('attr'=> ['placeholder' => 'ID 1С-Бухгалтерия']
                ))
                ->add('parentBank', null, ['label'=>'Банк-родитель'], null,
                    array('attr'=> ['placeholder' => 'Банк-родитель']
                ))
        ;
    }

    public function getTemplate($name)
    {
        switch($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}