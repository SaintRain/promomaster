<?php

/**
 * Админский класс для контрагентов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Application\Sonata\UserBundle\Admin\Form\Mapper\IndiContragentFormMapper;
use Application\Sonata\UserBundle\Admin\Form\Mapper\LegalContragentFormMapper;

use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ContragentAdmin extends Admin {

    protected $formOptions = array(
        'cascade_validation' => true
    );

    protected $translationDomain = 'ApplicationSonataUserBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }
    public function getFormTheme() {
        return array_merge(
                parent::getFormTheme(), array('ApplicationSonataUserBundle:Admin/Form:contragent_form_admin_fields.html.twig')
        );
    }
    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = '';
        if ($object instanceof IndiContragent) {
            $text .= ($object->getListName()) ? 'Физическое лицо «' . $object->getListName() . "»" : 'Создание физического лица';
        } elseif ($object instanceof LegalContragent) {
            $text .= ($object->getListName()) ? 'Юридическое лицо «' . $object->getListName() . '»' : 'Создание юридическго лица';
        } else {
            $text .= 'empty';
        }
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        //объект для формы
        $obj = $this->getSubject();
        $options = array();
        //контейнер
        if ($obj instanceof LegalContragent) {
            new LegalContragentFormMapper($formMapper, $options);
        } elseif ($obj instanceof IndiContragent) {
            new IndiContragentFormMapper($formMapper, $options);
        }
    }
    /*
    public function getNewInstance()
    {
        $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
        $defaultCountry = $em->getRepository('CoreDirectoryBundle:Country')->findOneBy(array('alpha2' => 'RU'));
        $instance = parent::getNewInstance();

        $instance->setCountry($defaultCountry);

        return $instance;
    }
     *
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
				'label' => '№',
				'sortable' => true))
                ->addIdentifier('listName', null, array('label' => 'Имя/Название'))
                ->add('type', null, array('label' => 'Тип',
                                            'template' => 'ApplicationSonataUserBundle:Admin:List/list_type.html.twig',
                    ))
                ->add('inn', null, array('label' => 'ИНН'))
                ->add('kpp', null, array('label' => 'КПП'))
                //->add('oneC', null, array('label' => 'ID 1С-Бухг.'))
                ->add('balance', null, array(
                    'label' => 'Баланс',
                    'template' => 'ApplicationSonataUserBundle:Admin:List/list_balance.html.twig',
                    ))

                ->addIdentifier('user.email', null, array('label' => 'Аккаунт'))
                ->add('createdDateTime', null, array('label' => 'Добавлен'))
                ->add('updatedDateTime', null, array('label' => 'Изменен'))
                ->add('_action', 'actions', array(
				'label' => 'Действия',
				'actions' => array(
					'edit' => array(),
					'delete' => array(
						'ask_confirmation' => true
					 )
				)
			))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID контрагента',
                'callback'   => array($this, 'searchById'),
                'field_type' => 'text'),null,
                array('attr'=>array('placeholder'=>'ID контрагента, через запятую', 'title'=>'ID контрагента, через запятую')
            ))
            ->add('user.email', 'doctrine_orm_callback', array(
                    'label' => 'E-mail пользователя',
                    'field_type' => 'ajax_entity',
                    'callback' => function($qb, $alias, $field, $value) {
                                    if (!$value['value']) {
                                        return;
                                    }
                                    $qb
                                    ->andWhere($alias . '.user = :user ')->setParameter('user', $value['value']);
                    }
            ), null, array(
                    'class' => 'Application\Sonata\UserBundle\Entity\User',
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'email' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'username' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        )],
                    'select2_constructor' => array(
                        'placeholder' => 'E-mail, логин или ID пользователя',
                        'minimumInputLength' => 1),
                ))
            ->add('listName', 'doctrine_orm_callback', array(
                    'label' => 'Название',
                    'callback'   => array($this, 'searchByListName'),
                    'field_type' => 'text'),null,
                    array('attr'=>array('placeholder'=>'Название', 'title'=>'Имя/Название ')
                ))
            ->add('phone', 'doctrine_orm_callback', array(
                    'label' => 'Телефон',
                    'callback'   => array($this, 'searchByPhone'),
                    'field_type' => 'text'),null,
                    array('attr'=>array('placeholder'=>'Телефон', 'title'=>'Телефон')
                ))
            ->add('inn', 'doctrine_orm_callback', array(
                    'label' => 'ИНН',
                    'callback'   => array($this, 'searchByInn'),
                    'field_type' => 'text'), null, 
                    array('attr'=>array('placeholder'=>'ИНН', 'title'=>'ИНН')
                ))
            ->add('kpp', 'doctrine_orm_callback', array(
                    'label' => 'КПП',
                    'callback'   => array($this, 'searchByKpp'),
                    'field_type' => 'kpp_type'
                ))
            /*
            ->add('oneC', 'doctrine_orm_callback', array(
                    'label' => 'ID 1C-Бухгалтерии',
                    'callback'   => array($this, 'searchByOnec'),
                    'field_type' => 'onec_type'
                ))
             *
             */
            ->add('type', 'doctrine_orm_callback', array(
                    'label' => 'Тип заказчика',
                    'callback'   => array($this, 'searchBySubclasses'),
                    'field_type' => 'subclasses_type'),
                null, array(
                    'subclasses' => $this->getTransSubclasess()
                ))
        ;
    }

    /**
     * Переписываем шаблон, чтобы встроить свой JS
     * @param type $name
     * @return string
     */
    public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
        default:
                return parent::getTemplate($name);
                break;
        }

    }

    /**
     * Перевод subclasses
     * @return array
     */
    protected function getTransSubclasess()
    {
        $subclasses = array();
        foreach($this->getSubClasses() as $key => $val) {
            $subclasses[$this->getTranslator()->trans($key, array(), $this->translationDomain)] = $val;
        }

        return $subclasses;
    }


    /**
     * Поиск по id сразу по нескольким через запятую
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach($expValue as $val) {
            $ids[] = (int)$val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                        ->setParameter('id',$ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                    ->setParameter('id',$ids);
        }
    }

    /**
     * Поиск по номеру телефона
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchByPhone($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $queryBuilder->andWhere($queryBuilder->expr()->orX(sprintf('%s.phone1', $alias) . ' = :phone',
                                                        sprintf('%s.phone2', $alias) . ' = :phone',
                                                        sprintf('%s.phone3', $alias) . ' = :phone'))
                    ->setParameter('phone', $value['value']);
    }


    /**
     * Поиск по имени или названию
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */

    public function searchByListName($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $queryBuilder
            ->andWhere($queryBuilder->expr()->orX(
                        $queryBuilder->expr()->like('i.firstName', ':listName'),
                        $queryBuilder->expr()->like('i.lastName', ':listName'),
                        $queryBuilder->expr()->like('l.organization', ':listName')
                    ))
            ->setParameter('listName', '%' . $value['value'] . '%')
        ;
    }

    /**
     * Поиск по номеру КПП
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchByKpp($queryBuilder, $alias, $field, $value) {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }
        if (isset($result['kppOnOff'])) {
            $queryBuilder->andWhere($queryBuilder->expr()->orX(
                        $queryBuilder->expr()->isNull('l.kpp'),
                        $queryBuilder->expr()->eq('l.kpp',':kpp')
                    ))
                    ->setParameter('kpp','')
            ;
        } else {
            $queryBuilder->andWhere('l.kpp = :kpp')
                        ->setParameter('kpp',$result['kpp'])
            ;
        }

    }

    /**
     * Поиск по email пользователя
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchByEmail($queryBuilder, $alias, $field, $value) {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }
        if (isset($result['full'])) {
           $queryBuilder
                ->andWhere($queryBuilder->expr()->eq('u.email', ':email'))
                ->setParameter('email', $result['email'])
            ;
        } else {
           $queryBuilder
                ->andWhere($queryBuilder->expr()->like('u.email', ':email'))
                ->setParameter('email', '%' . $result['email'] . '%')
            ;
        }
    }

    /**
     * Поиск по номеру 1C бухгалтерия
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchByOnec($queryBuilder, $alias, $field, $value) {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }
    }

    public function excludeSearch($queryBuilder, $alias, $field, $value) {

    }

    public function searchBySubclasses($queryBuilder, $alias, $field, $value) {
        $result = array_filter($value['value']);
        if (empty($result) || (isset($result['type']) && count($result['type']) > 1)) {
            return;
        }
        $type = $value['value']['type'][0];
        $queryBuilder->andWhere(sprintf('%s', $alias) . ' INSTANCE OF :type')
                    ->setParameter('type', $type)
        ;
    }

    public function searchByInn($queryBuilder, $alias, $field, $value) {
        if (!$value['value']) {
            return;
        }
        $queryBuilder->andWhere($queryBuilder->expr()->eq('l.inn',':inn'))
                    ->setParameter('inn', $value['value']);
    }


    /**
     *
     * @param string $context
     * @return Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery
     */
    public function createQuery($context = 'list')
    {
        $queryBuilder = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $queryBuilder->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $queryBuilder->leftJoin($rootAlias . '.payments', 'payments')
            ->leftJoin('payments.system', 'system')
            ->addSelect('payments','system');
//
//        $queryBuilder
//                ->leftJoin($rootAlias . '.orders', 'orders')
//                //->leftJoin('orders.compositions', 'compositions')
//                //->leftJoin('compositions.product', 'product')
//                //->leftJoin('compositions.units', 'units')
//                //->leftJoin('compositions.booking', 'booking')
//                //->leftJoin('product.manufacturers', 'manufacturers')
//                ->leftJoin('orders.deliveryMethod', 'deliveryMethod')
//                ->addSelect('partial orders.{id}', 'deliveryMethod'/*, 'compositions','units', 'booking', 'product', 'manufacturers', */);
//
//        $queryBuilder->leftJoin($rootAlias . '.manufacturerDiscounts', 'manufacturerDiscounts')
//            ->addSelect('manufacturerDiscounts');



        $queryBuilder->addSelect('partial u.{id, email}')
                ->innerJoin(sprintf('%s.user', $queryBuilder->getRootAlias()), 'u');
        $filter = $this->getRequest()->get('filter');
        if ($filter) {
            $queryBuilder->leftJoin(
                    'Application\Sonata\UserBundle\Entity\LegalContragent',
                    'l',
                    \Doctrine\ORM\Query\Expr\Join::WITH,
                    (sprintf('%s.id', $queryBuilder->getRootAlias())) . ' = l.id'
                )
            ->leftJoin(
                    'Application\Sonata\UserBundle\Entity\IndiContragent',
                    'i',
                    \Doctrine\ORM\Query\Expr\Join::WITH,
                    (sprintf('%s.id', $queryBuilder->getRootAlias())) . ' = i.id'
                );
        }
        return $queryBuilder;
    }

}