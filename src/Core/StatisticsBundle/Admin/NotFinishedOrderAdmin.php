<?php
/**
 * Created by PhpStorm.
 * User: iscream
 * Date: 06.08.14
 * Time: 12:49
 */

namespace Core\StatisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class NotFinishedOrderAdmin extends Admin
{
    public $supportsPreviewMode = true;

    protected $translationDomain = 'CoreStatisticsBundle'; // дефолтная группа (домен) для перевода

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'createdDateTime';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    public function toString($object)
    {
        if ($object->getId()) {
            $dz = new \DateTimeZone($this->getConfigurationPool()->getContainer()->getParameter('default_timezone'));
            $object->getCreatedDateTime()->setTimeZone($dz);
        }
        $text = (null === $object->getId()) ? 'Добавление незавершенный заказа' : 'Незавершенный заказ от '. $object->getCreatedDateTime()->format('d-m-Y');

        return $text;
    }
    /*
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('contragent', 'sonata_type_model', ['label' => 'Покупатель', 'disabled' => true, 'btn_add' => false],[ 'property' => 'listName'])
                   //->add('compositions', 'sonata_type_collection', ['label' => 'Состав заказа', 'disabled' => true])
                   ->add('deliveryMethod', 'sonata_type_model', ['label' => 'Способ доставки', 'disabled' => true, 'btn_add' => false])
                   ->add('createdDateTime', null, ['label' => 'Создан', 'disabled' => true])
        ;

    }*/

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id', null, array('label' => '№',
                                    'sortable' => true,
                                    'template' => 'CoreStatisticsBundle:Admin\Form\list_fields:not_finished_order_id.html.twig'
                    ))
                    ->addIdentifier('contragent.listName', null, array('label' => 'Покупатель',
                                    'sortable' => true,
                                    'template' => 'CoreStatisticsBundle:Admin\Form\list_fields:contragent.html.twig'
                    ))
                    ->addIdentifier('deliveryMethod.captionRu', null, array('label' => 'Способ доставки',
                                    'sortable' => true,
                                    'template' => 'CoreStatisticsBundle:Admin\Form\list_fields:deliverymethod.html.twig'
                    ))
                    ->add('createdDateTime', null, array('label' => 'Создан','sortable' => true))
                    //->addIdentifier('createdDatetime', null, array('label' => 'Создан'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id', null, array('label' => 'ID'), null,
            array('attr'=> ['placeholder' => 'ID']
            ))
            ->add('contragent', null, array('label' => 'Покупатель'), null,
                array('attr'=> ['placeholder' => 'Покупатель'],
                'property' => 'listName'
                ))
            ->add('deliveryMethod', null, array('label' => 'Способ доставки'), null,
                array('attr'=> ['placeholder' => 'Способ доставки']
            ))
            ->add('createdDateTime', 'doctrine_orm_callback',
                array(
                    'label' => 'Обновлен',
                    'callback'   => array($this, 'searchByCreated'),
                    'field_type' => 'admin_date_range'), null,
                array('placeholder'=>'Создан')
            )
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('contragent', null, ['label' => 'Покупатель', 'disabled' => true])
            //->add('compositions', null, ['label' => 'Состав заказа', 'disabled' => true])
            ->add('deliveryMethod', null, ['label' => 'Способ доставки', 'disabled' => true, 'btn_add' => false])
            ->add('createdDateTime', null, ['label' => 'Создан', 'disabled' => true])
        ;
    }

    /**
     * Переписываем запрос на выборку редактируемого объекта
     */
    public function getObject($id)
    {
        $object = $this
            ->getModelManager()->createQuery($this->getClass(), 'o')
            ->addSelect('contr', 'deliveryMethod', 'product', 'comp')
            ->leftJoin('o.contragent', 'contr')
            ->leftJoin('o.compositions', 'comp')
            ->leftJoin('comp.product', 'product')
            ->leftJoin('o.deliveryMethod', 'deliveryMethod')
            ->where('o.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();

        return $object;
    }


    public function getTemplate($name)
    {
        switch($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            case 'show':
                return 'CoreStatisticsBundle:Admin:NotFinishedOrder/show.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create')
                    ->remove('edit')
        ;
    }

    public function searchByCreated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'createdDateTime', 'from'=>'fromCr', 'to'=>'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value, $searchParams)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }

        $dates = $value['value'];
        if($dates['to'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
        }
    }

} 