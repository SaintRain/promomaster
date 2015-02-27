<?php

namespace Core\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentFormMapper;

class PaymentAdmin extends Admin
{

    protected $translationDomain = 'CorePaymentBundle';

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'createdAt'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового платежа' : 'Редактирование платежа';
        return $text;
    }

    public function configureRoutes(RouteCollection $collection)
    {
        //срываем кнопку удаленя
        $collection->remove('delete');
    }

    /**
     * Переписываем шаблоны
     *
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function getFormTheme()
    {
        return array_merge(
                parent::getFormTheme(), array(
                        'CorePaymentBundle:Admin\Form:form_admin_fields.html.twig',
                    )
        );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        new PaymentFormMapper($formMapper, $options);
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => '№ платежей, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'), null, ['attr' => ['placeholder' => '№ платежей, через запятую, без ведущих нулей']])
            ->add('createdAt', 'doctrine_orm_callback', array(
                'label' => 'Создан',
                'callback' => array($this, 'searchByСreatedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Создан')
            )
            ->add('updatedAt', 'doctrine_orm_callback', array(
                'label' => 'Отгружен',
                'callback' => array($this, 'searchByUpdatedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Изменен')
            )
            ->add('passedAt', 'doctrine_orm_callback', array(
                'label' => 'Отгружен',
                'callback' => array($this, 'searchByPassedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Выполнен')
            )
            ->add('isPassed', null, array(
                'label' => 'Выполнен',
                ), null, ['attr' => ['placeholder' => 'Выполнен']])
            ->add('system', null, array(
                'label' => 'Платежная система',
                'property' => 'captionRu'
                ), null, ['attr' => ['placeholder' => 'Платежная система']])
            ->add('customer', 'doctrine_orm_callback', array(
                'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb->andWhere($alias . '.customer = :customerId')->setParameter('customerId', $value['value']);
            },
                'label' => 'Контрагент',
                'field_type' => 'ajax_entity'), null, array(
                'class' => 'Application\Sonata\UserBundle\Entity\CommonContragent',
                'separator' => ' ',
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'user.email' => array(
                        'search' => true,
                        'return' => false,
                        'entry' => 'left',
                    ),
                    'firstName' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'lastName' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'surName' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'organization' => array(
                        'search' => true,
                        'return' => true,
                    )],
                'select2_constructor' => array(
                    'placeholder' => 'Контрагент (ФИО, Email, Организация)'
                ),
            ))
        ;
    }

    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id', $ids);
        }
    }

    public function searchByСreatedAt($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'createdAt', 'from' => 'fromCreatedAt', 'to' => 'toCreatedAt');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByUpdatedAt($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'updatedAt', 'from' => 'fromUpdatedAt', 'to' => 'toUpdatedAt');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByPassedAt($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'passedAt', 'from' => 'fromPassedAt', 'to' => 'toPassedAt');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value, $searchParams)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }

        $dates = $value['value'];
        if ($dates['to'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if ($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
        }
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'label' => 'Номер платежа',
                'template' => 'CorePaymentBundle:Admin/List:list_id.html.twig',
            ))
            ->add('createdAt', null, array(
                'label' => 'Создан',
                'format' => 'dd.MM.yyyy в HH:mm',
            ))
            ->add('updatedAt', null, array(
                'label' => 'Обновлен',
                'format' => 'dd.MM.yyyy в HH:mm',
            ))
            ->add('isPassed', null, array(
                'label' => 'Выполнен',
            ))
            ->add('system', null, array(
                'label' => 'Платежная система',
                'associated_property' => 'captionRu'
            ))
            ->add('customer', null, array(
                'label' => 'Контрагент',
                'associated_property' => 'listName'
            ))
//            ->add('type', null, array(
//                'label' => 'Тип операции',
//            ))
            ->add('amount', 'money', array(
                'label' => 'Сумма операции',
                'template' => 'CorePaymentBundle:Admin\List:list_payment_amount.html.twig',
            ))
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                )
            ))
        ;
    }

    /**
     * Переписываем запрос на выборку для списка
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $query
            ->leftJoin($rootAlias . '.customer', 'customer')->addSelect('customer')
            ->leftJoin($rootAlias . '.system', 'system')->addSelect('system')
        ;
        return $query;
    }

}
