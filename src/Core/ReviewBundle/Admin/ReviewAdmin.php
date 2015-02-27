<?php

namespace Core\ReviewBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Core\ReviewBundle\Admin\Form\Mapper\ReviewFormMapper;

class ReviewAdmin extends Admin
{

    protected $translationDomain = 'CoreReviewBundle';

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
        $text = null === $object->getId() ? 'Добавление нового отзыва' : 'Редактирование отзыва';
        return $text;
    }

    public function configureRoutes(RouteCollection $collection)
    {
        //срываем кнопку удаленя
//        $collection->remove('delete');
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
                'CoreReviewBundle:Admin\Form:form_admin_fields.html.twig',
                'CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig'
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

        new ReviewFormMapper($formMapper, $options);
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID отзывов, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'), null, ['attr' => ['placeholder' => '№ отзывов, через запятую']])
            ->add('isEnabled', null, array(
                'label' => 'Выполнен',
                ), null, ['attr' => ['placeholder' => 'Выполнен']])
            ->add('product', 'doctrine_orm_callback', array(
                'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb->andWhere($alias . '.product = :productId')->setParameter('productId', $value['value']);
            },
                'label' => 'Продукт',
                'field_type' => 'ajax_entity'), null, array(
                'class' => 'Core\ProductBundle\Entity\CommonProduct',
                'properties' => array(
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'sku' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'article' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'captionRu' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'images' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'price' => array(
                        'search' => false,
                        'return' => true,
                    )),
                'template_customise_functions' => 'product.html.twig',
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Продукт к которому написаны отзывы',
                    'minimumInputLength' => 1,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                )
            ))
            ->add('user', 'doctrine_orm_callback', array(
                'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb->andWhere($alias . '.user = :userId')->setParameter('userId', $value['value']);
            },
                'label' => 'Пользователь',
                'field_type' => 'ajax_entity'), null, array(
                'class' => 'Application\Sonata\UserBundle\Entity\User',
                'separator' => ' ',
                'properties' => array(
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
                    'firstname' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'lastname' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ),
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Пользователь который написал отзывы',
                    'minimumInputLength' => 1,
                )
            ))
            ->add('createdAt', 'doctrine_orm_callback', array(
                'label' => 'Создан',
                'callback' => array($this, 'searchByСreatedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Создан')
            )
            ->add('updatedAt', 'doctrine_orm_callback', array(
                'label' => 'Изменен',
                'callback' => array($this, 'searchByUpdatedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Изменен')
            )
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'label' => 'ID',
            ))
            ->add('review', null, array(
                'label' => 'Отзыв',
                'template' => 'CoreReviewBundle:Admin\List:list_text.html.twig',
            ))
            ->add('pros', null, array(
                'label' => 'Плюсы',
                'template' => 'CoreReviewBundle:Admin\List:list_text.html.twig',
            ))
            ->add('cons', null, array(
                'label' => 'Минусы',
                'template' => 'CoreReviewBundle:Admin\List:list_text.html.twig',
            ))
            ->add('rating', null, array(
                'label' => 'Оценка',
                'template' => 'CoreReviewBundle:Admin\List:list_rating.html.twig',
            ))
            ->add('createdAt', null, array(
                'label' => 'Создан',
                'format' => 'dd.MM.yyyy в HH:mm',
            ))
            ->add('updatedAt', null, array(
                'label' => 'Обновлен',
                'format' => 'dd.MM.yyyy в HH:mm',
            ))
            ->add('user', null, array(
                'label' => 'Пользователь',
            ))
            ->add('product', null, array(
                'label' => 'Продукт',
                'template' => 'CoreReviewBundle:Admin\List:list_product.html.twig',
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'editable' => true,
            ))
            ->add('parent', null, array(
                'label' => 'Ответ к отзыву',
                'editable' => true,
                'template' => 'CoreReviewBundle:Admin\List:list_parent.html.twig',
            ))
            ->add('likes', null, array(
                'label' => 'Лайки',
                'editable' => true,
                'template' => 'CoreReviewBundle:Admin\List:list_likes.html.twig',
            ))
            ->add('photos', null, array(
                'label' => 'Фото (шт.)',
                'editable' => true,
                'template' => 'CoreReviewBundle:Admin\List:list_count_collection.html.twig',
            ))
            /*->add('videos', null, array(
                'label' => 'Видео (шт.)',
                'editable' => true,
                'template' => 'CoreReviewBundle:Admin\List:list_count_collection.html.twig',
            ))*/
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                )
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
     * Переписываем запрос на выборку для списка
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $query
            ->leftJoin($rootAlias . '.user', 'user')->addSelect('user')
            ->leftJoin($rootAlias . '.product', 'product')->addSelect('product')
            ->leftJoin($rootAlias . '.likes', 'likes')->addSelect('likes')
            ->leftJoin($rootAlias . '.photos', 'photos')->addSelect('photos')
//            ->leftJoin($rootAlias . '.videos', 'videos')->addSelect('videos')
        ;
        return $query;
    }

    /**
     * Переписываем запрос на выборку редактируемого объекта
     */
    public function getObject($id)
    {
        $object = $this
            ->getModelManager()->createQuery($this->getClass(), 'r')
            ->addSelect('user', 'product', 'likes', 'photos', /*'videos',*/ 'children','childrenUser','childrenProduct','childrenLikes','childrenPhotos'/*,'childrenVideos'*/)
            ->leftJoin('r.user', 'user')
            ->leftJoin('r.product', 'product')
            ->leftJoin('r.likes', 'likes')
            ->leftJoin('r.photos', 'photos')
//            ->leftJoin('r.videos', 'videos')
            ->leftJoin('r.children', 'children')
            ->leftJoin('children.user', 'childrenUser')
            ->leftJoin('children.product', 'childrenProduct')
            ->leftJoin('children.likes', 'childrenLikes')
            ->leftJoin('children.photos', 'childrenPhotos')
//            ->leftJoin('children.videos', 'childrenVideos')
            ->where('r.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();

        return $object;
    }
}
