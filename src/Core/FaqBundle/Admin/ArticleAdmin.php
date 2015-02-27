<?php

namespace Core\FaqBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\FaqBundle\Admin\Form\Mapper\ArticleFormMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class ArticleAdmin extends Admin
{
    protected $translationDomain = 'CoreFaqBundle'; // дефолтная группа (домен) для перевода
    
    public $supportsPreviewMode = true;

    public function getFormBuilder()
    {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    public function toString($object)
    {
        $text = ($object->getId() ? 'Редактирование статьи' : 'Cоздание новой статьи') . ' ';
        $text .=  $object->getCaptionRu() ? '«' . $object->getCaptionRu() . '»' : '';
        
        return $text;
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {
       //формируем опции для формы
        $obj = $this->getSubject();
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer()
        );
       new ArticleFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->add('id', null, array('label'=> 'ID'))
                ->addIdentifier('captionRu', null, array('label'=> 'Название'))
                ->add('category', null, array('label'=> 'Категория'))
                ->add('isActive', null, array('label'=> 'Включена', 'editable'=> true))
                ->add('isOnMain', null, array('label'=> 'Показывать ссылку на главной', 'editable'=> true))
                ->add('isPredifinedAnswer', null, array('label'=> 'В преопределенных ответах', 'editable'=> true))
                //->add('rating', null, array('label'=> 'Рейтинг', 'template' => 'CoreFaqBundle:Admin:List/list_rating.html.twig'))
                ->add('createdDatetime', null, array('label'=> 'Дата создания'))
                ->add('_action', 'actions', array(
				'label' => 'Действия',
				'actions' => array(
					'edit' => array(),
                                        'show_on_site' => array('template' => 'CoreFaqBundle:Admin:List/list__action_show_on_site.html.twig'),
					'delete' => array(
						'ask_confirmation' => true
					 )
				)
			))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //ldd($datagridMapper->getAdmin()->getModelManager()->getEntityManager('CoreCategoryBundle:FaqCategory')->getRepository('CoreCategoryBundle:FaqCategory')->find(3));
        $datagridMapper
                ->add('id', null, array('label'=> 'ID'), null, ['attr' => ['placeholder'=>'ID']])
                ->add('captionRu', null, array('label'=> 'Название'), null, ['attr' => ['placeholder'=>'Название']])
                ->add('bodyRu', null, array('label'=> 'Тело статьи'), null, ['attr' => ['placeholder'=>'Тело статьи']])
                //->add('category', null, array('label'=> 'Категория'), null, ['attr' => ['placeholder'=>'Категория']])
                ->add('category', 'doctrine_orm_callback', array(
                    'propery' => 'id',
                    'label'=>'Категория',
                    'field_type' => 'tree_select',
                    'callback' => function($qb, $alias, $field, $value) {
                                    if (!$value['value']) {
                                        return;
                                    }
                                    $qb
                                    ->andWhere($alias . '.category = :id')->setParameter('id', $value['value']);
                    }
                ), null, array(
                    'attr' => ['placeholder'=>'Категория'],
                    'class' => 'CoreCategoryBundle:FaqCategory',
                    'property' => 'captionRu',
                    'is_filter'=> true,
                    'placement' => 'top'
                ))
                ->add('isActive', null, array('label'=> 'Включена'), null, ['attr' => ['placeholder'=>'Включена']])
                ->add('isOnMain', null, array('label'=> 'Показывать ссылку на главной'), null, ['attr' => ['placeholder'=>'Показывать ссылку на главной']])
                ->add('createdDateTime', 'doctrine_orm_callback',
                    array(
                        'label' => 'Создан',
                        'callback'   => array($this, 'searchByCreated'),
                        'field_type' => 'admin_date_range'), null,
                        array('placeholder'=>'Создан')
                )
        ;
    }
    
    public function getTemplate($name)
    {
            switch($name) {
                    case 'list':
                        return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
                    case 'preview':
                        return 'CoreFaqBundle:Admin:Article/preview.html.twig';
                    default:
                            return parent::getTemplate($name);
            }
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('article', 'ajax-article')
            ->add('ajaxCreate', 'ajax-article-create');
    }

    public function searchByCreated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'createdDatetime', 'from'=>'fromCr', 'to'=>'toCr');
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