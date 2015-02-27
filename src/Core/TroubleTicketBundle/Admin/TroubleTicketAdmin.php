<?php

/**
 * Админский класс для приоритетов тикетов
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */
// TODO: реализовать требует ответа админа сортировка
namespace Core\TroubleTicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Entity\Log;
use Core\TroubleTicketBundle\Entity\Message;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Expr\Join;
use Sonata\AdminBundle\Route\RouteCollection;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Core\OrderBundle\Entity\Order;
use Doctrine\ORM\EntityRepository;

class TroubleTicketAdmin extends Admin {

    protected $translationDomain = 'CoreTroubleTicketBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $this->formOptions = array('validation_groups' => array('Backend', 'Default'));
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.'.($object->getId() ? 'edit' : 'create').'.';
        if ($object instanceof TroubleTicket) {
            $text .= 'TroubleTicket';
        } else {
            $text .= 'empty';
        }
        $text = $this->trans($text);
        $text .=  $object->getId() ? ' № '.$object->getId() : '';
        return $text;
    }

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {       
        $formMapper
                ->with('Основное')
                ->add('title', null, array(
				'label' => 'Тема'))
                ->add('body', 'textarea', array(
				'label' => 'Описание',
                                'required' => false,
                                'attr' => ['class' => 'span11', 'rows' => '5']))
                ->add('status', 'sonata_type_model', array(
                                'property' => 'captionRu',
				'label' => 'Статус',
                                'required' => true,
                                'btn_add' => false,
                                'cascade_validation' => true,
                                'empty_value'=>'form.label.empty',
                                'attr' => array('class'=>'span11')))
                /*
                ->add('manager', 'ajax_entity', [
                        'label' => 'Назначена',
                        'attr' => ['class'=>'span11'],
                        'required' => true,
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
                          ],
                        'select2_constructor' => array(
                            //'width' => '350px',
                            'placeholder' => 'Введите email или id пользователя',
                            'minimumInputLength' => 1),
                    ])
                 *
                 */
                
                ->add('manager','entity', array(
				'label' => 'Назначена',
                                'class' => 'ApplicationSonataUserBundle:User',
                                'property' => 'email',
                                'query_builder' => function (EntityRepository $er) {
                                  return $er->findManagers();
                                },
                                'required' => true,
                                'empty_value'=>'form.label.empty',
                                'attr' => array('class'=>'span11')))
                
                ->add('priority','sonata_type_model', array(
				'label' => 'Приоритет',
                                'required' => true,
                                'btn_add' => false,
                                'empty_value'=>'form.label.empty',
                                'attr' => array('class'=>'span11')))
                ->add('readiness','choice', array(
                                'choices' => $this->makePriorityChoices(),
				'label' => 'Готовность',
                                'attr' => array('class'=>'span11')))
                ->add('category', 'tree_select', array(
                        'class' => 'CoreCategoryBundle:TroubleTicketCategory',
                        'property' => 'captionRu',
                        'empty_value'=>'form.label.empty',
                        'translation_domain' => $this->translationDomain,
                        'required' => true,
                        'attr' => array('class'=>'span11'),
                        'label'=>'Категория'
                ))/*
                ->add('category','sonata_type_model', array(
				'label' => 'Категория',
                                'property' => 'indentedCaption',
                                'btn_add' => false,
                                'required' => true,
                                'empty_value'=>'form.label.empty',
                                'attr' => array('class'=>'span11')))
                 * 
                 */
                ->add('file', 'multiupload_document', array(
                            'hide_field' => array('all'),
                            'label' => 'Файлы',
                            'parent_form' => $formMapper), array(
                'sortable' => 'indexPosition',      // Поле сортировки
            ))
            ->setHelps(array(
                    'title' => 'Set the title of a web page'))
        ;
        $log = new Log();
        $object = $this->getSubject();
        if ($object) {
            $object = clone $object;
        }
        $formMapper->getFormBuilder()
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($log) {
                $container = $this->getConfigurationPool()->getContainer();
                $user = $container->get('security.context')->getToken()->getUser();
                $requestStack = $container->get('request_stack');
                $queryStr = $requestStack->getCurrentRequest()->query->all();
                $orderId = (isset($queryStr['orderId']) && $queryStr['orderId']) ? $queryStr['orderId'] : null;
                
                if (isset($queryStr['userId']) && $queryStr['userId']) {
                    $em = $container->get('doctrine.orm.entity_manager');
                    $user = $em->getRepository('ApplicationSonataUserBundle:User')->find((int)$queryStr['userId']);
                }

                $data = $event->getData();
                $form = $event->getForm();
                $dateTime = new \DateTime();
                if ($data && $data->getId()) {
                    foreach($data->getMessages() as $message) {
                        if (!$message->getBody() || $message->getId()) {
                            $data->removeMessage($message);
                        }
                    }
                    $data->addMessage(new Message());
                    $form->add('messages','collection',array(
                                'type' => 'trouble_ticket_message',
                                'prototype_name' => 'messages_',
                                'cascade_validation' => true,
                                'allow_add' => true,
                                'options'  => array(
                                    'cascade_validation' => true,
                                    'required' => true,
                                    'troubleTicket' => $data,
                                    'dateTime'  => $dateTime,
                                    'logEntity' => $log
                                 ),
                                'label' => 'Ответ'));
                } elseif ($data && !$data->getId()) {
                    $form->add('user', 'ajax_entity', [
                        'data' => $user,
                        'data_class' => null,
                        'label' => 'Автор',
                        'attr' => ['class'=>'span11'],
                        'required' => true,
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
                          ],
                        'select2_constructor' => array(
                            //'width' => '350px',
                            'placeholder' => 'Введите email или id пользователя',
                            'minimumInputLength' => 1),
                    ])
                    ->add('order','hidden', array(
                        'data' => $orderId
                    ))
                    ;
                }
                /*else {
                    $form->remove('messages');
                }*/

       });

       $formMapper->getFormBuilder()
            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($log, $object) {
                $data = $event->getData();
                $form = $event->getForm();
                if (!$data->getId()) {
                    // пересобираем поле hidden в сущность
                    if (is_string($data->getOrder()))  {
                        $order = $this->getModelManager()->find('CoreOrderBundle:Order', $data->getOrder() * 1);
                        $data->setOrder($order);
                    }
                    /*
                    $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
                    $data->setAuthorEmail($user->getEmail());
                    $data->setAuthorName($user->getUserName());
                    $data->setUser($user);
                     * 
                     */
                    $data->setAuthorEmail($data->getUser()->getEmail());
                    $data->setAuthorName($data->getUser()->getUserName());
                    $data->setHash();
                } else {
                    foreach($data->getMessages() as $message) {
                    if (!$message->getBody() || $message->getId()) {
                            $data->removeMessage($message);
                        }
                    }

                    $session = $this->getConfigurationPool()->getContainer()->get('session');
                    $objectChages = $this->changeSet($data, $object);
                    $fileChages = $session->get('uploadFiles');

                    if ($fileChages && $objectChages) {
                        $changes = array_merge($objectChages, $fileChages);
                    } elseif($fileChages && !$objectChages) {
                        $changes = $fileChages;
                    } elseif(!$fileChages && $objectChages) {
                        $changes = $objectChages;
                    } else {
                        $changes = array();
                    }
                    $log->setChanges($changes);

                    if (count($data->getMessages()) || $changes) {
                        $manager = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
                        $date = new \DateTime();
                        $log->setDate($date);
                        $log->setManager($manager);
                        $log->setTroubleTicket($data);
                        $data->addLog($log);
                    }
                    //var_dump($data);die();
                    /*
                    if ($form->isValid()) {
                        $logMailer = $this->getConfigurationPool()->getContainer()->get('core_trouble_ticket_log_mailer');

                        $message = count($data->getMessages()) ? $data->getMessages()->first() : null;

                        if (count($data->getWatchers())) {
                            $logMailer->sendNotificationEmailMessage($data, $this->getSubject(), $message);
                        }

                        if ($message || $fileChages) {
                            //$logMailer->sendEditMessage($data);
                            $data->setAdminAnswers(1);
                            $data->setIsAdminAnswer(0);
                        }

                    }
                     *
                     */
                }
       });
    }

    /**
     * Отображение списка статусов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('id', null, array('label' => '№'))
            ->add('category.captionRu', null, array('label' => 'Категория', 'sortable' => true))
            ->add('status.captionRu', null, array(
				'label' => 'Статус',
				'sortable' => true))
            ->add('priority.captionRu', null, array(
				'label' => 'Приоритет',
				'sortable' => true))
            ->addIdentifier('title', null,array('label'=>'Тема'))

            ->add('authorEmail', null, array(
                                'label' => 'Автор',
                                'template' => 'CoreTroubleTicketBundle:Admin:List/list_author_info.html.twig',
                                'sortable' => true))

            ->add('manager', null, array(
                                'label' => 'Назначена',
                                'template' => 'CoreTroubleTicketBundle:Admin:List/list_manager.html.twig',
                                'sortable' => true))
            ->add('isAdminAnswer', null, array(
                                'label' => 'Требует ответа',
                                'sortable' => true))
            ->add('readiness', null, array(
                                'label' => 'Готовность',
                                'template' => 'CoreTroubleTicketBundle:Admin:List/list_readiness.html.twig',
                                'sortable' => true))
            ->add('updatedDateTime', 'date', array(
                                'pattern' => 'dd MMM Y G',
                                'locale' => 'ru',
                                'timezone' => $this->getConfigurationPool()->getContainer()->getParameter('default_timezone'),
                                'label' => 'Обновлен',
                                'sortable' => true))
            ->add('createdDateTime', null, array(
                                'label' => 'Создан',
                                'sortable' => true))
            ->add('_action', 'actions', array(
				'label' => 'label.actions',
				'actions' => array(
					'edit' => array(),
                                        'show_on_site' => array('template' => 'CoreTroubleTicketBundle:Admin:List/list__action_show_on_site.html.twig'),
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
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID тикета',
                'callback'   => array($this, 'searchById'),
                'field_type' => 'text'),null,
                array('attr'=>array('placeholder'=>'ID тикета')
            ))
            ->add('author', 'doctrine_orm_callback', array(
                'callback'   => array($this, 'searchByEmailAndName'),
                'label' => 'Автор',
                'field_type' => 'text'),null,
                array('attr'=>array('placeholder'=>'Автор (Email или Имя/Название)')
            ))
            ->add('manager', 'doctrine_orm_callback', array(
                'label' => 'Назначена (Email или id пользователя)',
                'field_type' => 'ajax_entity',
                'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb
                ->andWhere($alias . '.manager = :manager')->setParameter('manager', $value['value']);
            }), null, array(
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
                            )
                          ],
                'select2_constructor' => array(
                    'placeholder' => 'Назначена (Email или id пользователя)',
                    'minimumInputLength' => 1),
            ))
            ->add('priority', null, array(
                'label' => 'Приоритет',
                'property' => 'captionRu'),null,
                array('attr'=>array('placeholder'=>'Приоритет')))
            ->add('status', null, array(
                'label' => 'Статус',
                'required'=>true,
                'property' => 'captionRu'),null,
                array('attr'=>array('placeholder'=>'Статус')))
            ->add('createdDateTime', 'doctrine_orm_callback',
                    array(
                        'label' => 'Создан',
                        'callback'   => array($this, 'searchByCreated'),
                        'field_type' => 'admin_date_range'), null,
                        array('placeholder'=>'Создан')
                )
            ->add('updatedDateTime', 'doctrine_orm_callback',
                    array(
                        'label' => 'Обновлен',
                        'callback'   => array($this, 'searchByUpdated'),
                        'field_type' => 'admin_date_range'), null,
                        array('placeholder'=>'Обновлен')
                )
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
                    'class' => 'CoreCategoryBundle:TroubleTicketCategory',
                    'property' => 'captionRu',
                    'is_filter'=> true,
                    'placement' => 'top'
                ))
            /*
            ->add('category', null, array(
                'label' => 'Категория',
                'required'=> true,
                'property' => 'indentedCaption'),null,
                array('attr'=>array('placeholder'=>'Категория')))
             * 
             */
            ->add('isAdminAnswer', null, array(
                'label' => 'Требует ответа Администратора'),null,
                array('attr'=>array('placeholder'=>'Требует ответа Администратора')))
            ->add('any_text_field', 'doctrine_orm_callback', array(
                'callback'   => array($this, 'searchByAnyTextField'),
                'label' => 'Содержание',
                'field_type' => 'full_text'),null,
                array('attr'=>array('placeholder'=>'Содержание'),'data'=> array('anyField' => true)

            ))

        ;
    }

    public function getTemplate($name)
    {
        switch($name) {
                // Общий список
                case 'edit':
                        return 'CoreTroubleTicketBundle:Admin\TroubleTicket:edit.html.twig';
                case 'list':
                        return 'CoreTroubleTicketBundle:Admin\TroubleTicket:list.html.twig';
                default:
                        return parent::getTemplate($name);
        }
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('copy', $this->getRouterIdParameter().'/copy');
        $collection->add('watcher', $this->getRouterIdParameter().'/watcher');
        $collection->add('articlesByCategory', 'articles-for-category');
        $collection->add('article', 'article');
        $collection->add('categories', 'all-categories');
    }

    protected function makePriorityChoices($start = 0, $end = 100, $step = 10) {
        for($i = $start; $i <= $end; $i = $i+10) {
            $choices[$i] = $i . '%';
        }

        return $choices;
    }

    public function changeSet($data, $object)
    {
        $changes = null;
        if ($data->getId()) {
            $fileds = $data->getFieldsForLog();
            foreach($fileds as $field) {
                $method = 'get' . $field;
                if (method_exists($data, $method)) {
                    $oldValue = (is_object($object->$method())) ? $object->$method()->getId() : $object->$method();
                    $newValue = (is_object($data->$method())) ? $data->$method()->getId() : $data->$method();
                    if ($oldValue != $newValue) {
                        $changes[$field][] = $oldValue;
                        $changes[$field][] = $newValue;
                    }
                    
                }
            }
        }
        if (isset($changes['category']) && $changes['category'] > 0) {
            $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
            $categories = $em->getRepository('CoreCategoryBundle:TroubleTicketCategory')->findBy(['id' => $changes['category']]);
            $categoriesDb = [];
            foreach($categories as $cat) {
                $categoriesDb[$cat->getId()] = $cat->getCaptionRu();
            }
            $changes['category'] = $categoriesDb;
        }
        if (isset($changes['manager']) && $changes['manager'] > 0) {
            //ldd($changes['manager']);
            $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
            $managers = $em->getRepository('ApplicationSonataUserBundle:User')->findForTicketLog($changes['manager']);
            $managersFromDb = [];
            foreach($managers as $manager) {
                $managersFromDb[$manager->getId()] = $manager->getEmail();
            }
            $changes['manager'] = $managersFromDb;
            /*
            foreach($changes['manager'] as $key => $val) {
                if ($val) {
                    $changes['manager'][$key] = $managersFromDb[$val];
                }
            }*/
        }
        return $changes;
        /*
        $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();

        $original = clone $data; // Create a copy of your object
        $em->detach($object); // Prevent your object from being refreshed
        $original = $em->merge($original); // Attach the copy to the EntityManager

        $uow = $em->getUnitOfWork();
        $uow->computeChangeSets();
        $changeset = $uow->getEntityChangeSet($original);
        //$changeset = array();

        $em->detach($original); // Detach the copy from the EntityManager
        $object = $em->merge($data);
        //var_dump($object);die();
        $changes = array();
        if (count($changeset)) {
            foreach($changeset as $field => $val) {
                if ($field != 'isAdminAnswer' && $field != 'createdDateTime'  && $field != 'updatedDateTime'){
                    foreach($val as $key => $content) {
                        if (is_object($content)) {
                            $changes[$field][$key] = $content->getId();
                        } else {
                            $changes[$field][$key] = $content;
                        }
                    }
                }
            }
            var_dump($changes);die();
            return $changes;
        } else {
            //var_dump($changes);die();
            return null;
        }*/
    }

    public function searchByEmailAndName($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $queryBuilder->andWhere($queryBuilder->expr()->orX(sprintf('%s.authorName', $alias) . ' = :author',
                                                        sprintf('%s.authorEmail', $alias) . ' = :author'))
                    ->setParameter('author',$value['value']);
    }

    public function searchByAnyTextField($queryBuilder, $alias, $field, $value)
    {
        if ($value['value']) {
            $fields = $value['value'];
            if (($fields['anyField'] && !$fields['fieldChooser']) || (!$fields['anyField'] && $fields['fieldChooser']) || (!$fields['anyField'] && !$fields['fieldChooser'])) {
                return;
            }
        } else {
            return;
        }

        if (in_array('messages', $value['value']['fieldChooser'])) {
            $queryBuilder->leftJoin(sprintf('%s.messages', $alias), 'm');
        }

        $expressions = array();
        foreach($value['value']['fieldChooser'] as $key => $fieldChooser) {
            if ($fieldChooser == 'messages') {
                $expressions[] = 'm.body LIKE :anyText';
            } else {
                $expressions[] = sprintf('%s.'. $fieldChooser, $alias) . ' LIKE :anyText';
            }

        }
        $queryBuilder->andWhere(implode(' OR ', $expressions));
        $queryBuilder->setParameter('anyText','%'.$value['value']['anyField'].'%');
    }

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

    public function searchByCreated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'createdDateTime', 'from'=>'fromCr', 'to'=>'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByUpdated($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field'=>'updatedDateTime', 'from'=>'fromUp', 'to'=>'toUp');
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
            /*
            if($dates['to'] != null) {
                $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
            } else {
                $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 23:59:59'));
            }*/

        }
    }

    public function getFilterParameters()
    {
        $this->datagridValues = array_merge(array(
                'any_text_field' => array(
                    'value' => array('fieldChooser'=>array(0=>'title')
                ))
            ),
            $this->datagridValues
        );
        return parent::getFilterParameters();
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        $this::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

    /**
     * Переделываем боковое меню в табы на списке записей
     *
     * @param \Knp\Menu\ItemInterface $menu
     * @param string $action
     * @param \Sonata\AdminBundle\Admin\AdminInterface $childAdmin
     * @param object $routeGenerator
     */
//    static public function configureSubMenu($menu, $action, $childAdmin, $container) {
//        $route = $container->get('request')->get('_route');
//
//        if (false === strpos($route, '_batch') && $action === 'list') {
//            // Присваеиваем класс nav-tabs вместо nav-list, чтобы меню вывелось табами, а не списком
//            $attrClass = str_replace('nav-list', 'nav-tabs', $menu->getChildrenAttribute('class'));
//            $menu->setChildrenAttribute('class', $attrClass);
//        }
//
//        $menu->addChild(
//            'Траблтикеты', array(
//            'route' => 'admin_core_troubleticket_troubleticket_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_troubleticket_troubleticket') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//            'Статусы', array(
//            'route' => 'admin_core_troubleticket_status_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_troubleticket_status') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//            'Приоритеты', array(
//            'route' => 'admin_core_troubleticket_priority_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_troubleticket_priority') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//            'Категории траблтикетов', array(
//            'route' => 'admin_core_category_troubleticketcategory_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_category_troubleticketcategory') ? 'active' : '')
//            )
//        ));
//    }
}