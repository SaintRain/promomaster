<?php

/**
 * Админский класс индивидуальных скидок на продукты
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Core\DiscountsBundle\Admin\ManufacturerDiscountAdmin;

class ContragentManufacturerDiscountAdmin extends Admin
{

    protected $translationDomain = 'CoreDiscountsBundle'; // дефолтная группа (домен) для перевода
    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $caption = [];
        if ($object->getManufacturers()) {
            foreach ($object->getManufacturers() as $b) {
                $caption[] = $b->getCaptionRu();
            }
        }
        $text = null === $object->getId() ? 'Добавление новой скидки для производителя' : 'Редактирование скидки для производителя «' . implode(', ', $caption) . '»';
        return $text;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
                ->addSelect('m, sv')
                ->leftJoin($query->getRootAlias() . '.manufacturerStepValues', 'sv')
                ->leftJoin($query->getRootAlias() . '.manufacturers', 'm')
                ->leftJoin($query->getRootAlias() . '.contragent', 'c')
        ;
        return $query;
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
            default:
                return parent::getTemplate($name);
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        $formMapper->with('Основное')
                ->add('isEnabled', null, array(
                    'required' => false,
                    'label' => 'Скидка активна',
                ))
                ->add('manufacturers', null, array(
                    'property' => 'captionRu',
                    'label' => 'Производители',
                    'help' => 'Продукт может быть произведён несколькими производителями. '
                    . 'Чтобы задать для каждого производителя свои настройки нужно для каждого производителя в отдельности добавить скидки.'
                ))
                ->add('contragent', 'ajax_entity', [
                    'label' => 'Контрагент',
                    'required' => true,
                    'help' => 'Скидка устанавливается индивидуально для контрагента',
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'user.email' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'firstName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'surName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left'
                        ),
                        'organization' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left'
                        )],
                    'select2_constructor' => array(
                        'width' => '40%',
                        'placeholder' => 'Введите E-mail, наименование организации, или ID клиента',
                        'minimumInputLength' => 1),
                ])
                ->add('manufacturerStepValues', 'sonata_type_collection', array(
                    'help' => 'Скидка расчитывается разово при оформлении заказа на основании суммы заказа. Индивидуальные скидки перекрывают скидки по производителям',
                    'required' => true,
                    'by_reference' => false,
                    'btn_add' => 'Добавить',
                    'label' => 'Значения скидки'), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition'
                ))
        ;
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->add('createdDateTime', null, array('label' => 'Дата создания'))
                ->addIdentifier('manufacturers.captionRu', null, array('label' => 'Бренды', 'template' => 'CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturers.html.twig'))
                ->addIdentifier('contragent', null, array('label' => 'Контрагент'
                    , 'template' => 'CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:contragent.html.twig'
                ))
                ->add('manufacturerStepValues', null, array('label' => 'Скидки', 'template' => 'CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturerStepValues.html.twig'))
                ->add('isEnabled', null, array('editable' => true, 'label' => 'Включено'))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array()
                    )
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid->add('manufacturers', null, array('label' => 'Производители'), null, array('property' => 'captionRu', 'attr' => [ 'placeholder' => 'Производитель'], 'multiple' => true))
                ->add('contragent', 'doctrine_orm_callback', array(
                    'label' => 'Контрагент',
                    'field_type' => 'ajax_entity',
                    'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb
                ->join($alias . '.contragent', 'c')
                ->andWhere('c.id = :contragent_id')->setParameter('contragent_id', $value['value']);
            }), null, array(
                    'class' => 'Application\Sonata\UserBundle\Entity\CommonContragent',
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'user.email' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'firstName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'surName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left'
                        ),
                        'organization' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left'
                        )],
                    'select2_constructor' => array(
                        'placeholder' => 'Введите E-mail, наименование организации, или ID клиента',
                        'minimumInputLength' => 1),
                ))
        ;
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        ManufacturerDiscountAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}
