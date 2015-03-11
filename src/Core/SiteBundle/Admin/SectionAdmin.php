<?php

/**
 * Админский класс для разделов под рекламные места
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;




class SectionAdmin extends Admin
{

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
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

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового раздела' : 'Редактирование раздела ' . $object->getName();
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        //контейнер
        $container = $this->getConfigurationPool()->getContainer();
        $options = array('obj' => $obj, 'container' => $container);


        $formMapper
            ->add('name', null, ['label'=>'Название раздела','required'=>true])
            ->add('isAllPage', null, ['label'=>'Для всех страниц','required'=>false])
            ->add('urlTemplate', 'text', ['attr'=>['rows'=>7], 'label'=>'Шаблон страниц','required'=>false, 'help'=>'Таргетинг по адресу страницы задается с помощью шаблона. Шаблон нужен, чтобы система могла отнести определенную страницу сайта к какому-либо разделу. Шаблон задается подстрокой или регулярным выражением. Для того чтоб шаблон трактовался как регулярное выражение, его нужно заключить в *, например: *регулярное выражение*.В простейшем случае, если адрес страницы содержит шаблон раздела, то такая страница будет отнесена к этому разделу.Например, есть страница http://www.test.com/news.php?id=1. Наш шаблон: news.php. В этом случае эта страница будет отнесена к разделу.'])

        ->add('user', 'ajax_entity', [
            'label' => 'Пользователь',
            'required' => true,
            // 'attr' => ['data-legal' => ($obj && $obj->getContragent() instanceof LegalContragent) ? 1 : 0],
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
                'lastName' => array(
                    'search' => false,
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
                )
            ],
            'select2_constructor' => array(
                'width' => '40%',
                'placeholder' => 'Введите E-mail, фамилию, или ID пользователя',
                'minimumInputLength' => 1),
        ])
            ->add('adPlaces', null, ['label'=>'Рекламные места', 'property'=>'name', 'required'=>false, 'by_reference' => false])
            ->add('isEnabled', null, ['label'=>'Активно','required'=>false])

        ;


    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->add('name', null, ['label' => 'Название раздела'])
            ->add('urlTemplate', null, ['label' => 'Шаблон',
                'required'=>false,
                'template' => 'CoreSiteBundle:Admin\list_fields\Section:urlTemplate.html.twig'
            ])
            ->add('user.email', null, ['label' => 'Пользователь',
                'template' => 'CoreSiteBundle:Admin\list_fields\Section:user.html.twig'
            ])
            ->add('isEnabled', null, ['label' => 'Активно'])

            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )        ))
        ;
    }


    /**
     * Настройки фильтра для списка баннеров
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID раздела, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID сайта, через запятую']])
            ->add('name', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('isEnabled', null, array('label' => 'Активно'), null, ['attr' => ['placeholder' => 'Активно']])
            ->add('user', 'doctrine_orm_callback',
                array(
                    'label' => 'Введите E-mail, фамилию, ID клиента',
                    'field_type' => 'ajax_entity',
                    'callback' => function($qb, $alias, $field, $value) {
                        if (!count($value['value'])) {
                            return;
                        }
                        $qb
                            ->andWhere($alias.'.user IN(:user) ')->setParameter('user',
                                explode(',', $value['value']));
                    }), null,
                array(
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
                        'firstName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'surName' => array(
                            'search' => false,
                            'return' => true,
                            'entry' => 'left'
                        )
                        ],
                    'select2_constructor' => array(
                        'placeholder' => 'Введите E-mail, фамилию, ID клиента',
                        'minimumInputLength' => 1),
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
            $ids[] = (int)$val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id', $ids);
        }
    }

}
