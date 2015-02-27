<?php

/**
 * Админский класс для брендов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ManufacturerBundle\Entity\Certificate;
use Core\ManufacturerBundle\Admin\Form\Mapper\CertificateFormMapper;


class CertificateAdmin extends Admin {

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового сертификата' : 'Сертификат «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        if ($obj instanceof Certificate) {
            new CertificateFormMapper($formMapper, $options);
        }
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->addIdentifier('logo', null, array(
                'label' => 'Логотип',
                'template' => 'CoreFileBundle:Admin\List:list_image.html.twig'
            ))
            ->addIdentifier('captionRu', null, array('label' => 'Название'))
            ->add('url', null, array(
                'label' => 'Сайт',
                'template' => 'CoreManufacturerBundle:Admin\List:list_url.html.twig'
            ))
            ->add('manufacturer', null, array(
                'label' => 'Вендор',
                'associated_property' => 'captionRu'
            ))
            ->add('dateOfReceipt', null, array(
                'label' => 'Дата получения',
                'format' => 'dd.MM.yy'))
            ->add('document', null, array(
                'label' => 'Подтверждающий документ',
                'template' => 'CoreFileBundle:Admin\List:list_document.html.twig'
            ))
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
     * Переписываем запрос на выборку
     */
    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всех логотипоп, документов и брандов
        $query
            ->leftJoin($rootAlias . '.logo', 'logo')->addSelect('logo')
            ->leftJoin($rootAlias . '.document', 'document')->addSelect('document')
            ->leftJoin($rootAlias . '.manufacturer', 'manufacturer')->addSelect('manufacturer')
        ;
        return $query;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('captionRu', null, array('label' => 'Название'))
            ->add('manufacturer', null, array('label' => 'Производитель'), null, array('property' => 'captionRu'))
        ;
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        \Core\ManufacturerBundle\Admin\ManufacturerAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}