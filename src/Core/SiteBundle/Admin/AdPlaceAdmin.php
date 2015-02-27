<?php

/**
 * Админский класс для рекламных мест
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Core\SiteBundle\Admin\Form\Mapper\SiteFormMapper;


class AdPlaceAdmin extends Admin
{

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    public function preUpdate($object)
    {
        $this->getConfigurationPool()->getContainer()->get('core_adplace_logic')->setAuthoSize($object);

    }

    public function prePersist($object)
    {
        $this->getConfigurationPool()->getContainer()->get('core_adplace_logic')->setAuthoSize($object);
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
        $text = null === $object->getId() ? 'Добавление нового рекламного места' : 'Редактирование рекламного места ' . $object->getName();
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
            ->add('site', 'ajax_entity', [
                'label' => 'Сайт',
                'required' => true,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'domain' => array(
                        'search' => true,
                        'return' => true,
                    )
                ],
                'select2_constructor' => array(
                    'width' => '40%',
                    'placeholder' => 'Введите название домена',
                    'minimumInputLength' => 1),
            ])
            ->add('user', 'ajax_entity', [
                'label' => 'Пользователь',
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
            ->add('size', null, ['label' => 'Размер', 'property' => 'captionRu',
                'empty_value' => 'Ничего не выбрано...',
                'required' => true])
            ->add('name', null, ['label' => 'Название', 'required' => true])
            ->add('width', null, ['label' => 'Ширина'])
            ->add('height', null, ['label' => 'Высота'])
            ->add('isShowInCatalog', null, ['label' => 'Выводить в общий каталог', 'required' => false]);


    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->addIdentifier('createdDateTime', null, ['label' => 'Добавлено'])
            ->addIdentifier('name', null, ['label' => 'Название'])
            ->add('size.captionRu', null, ['label' => 'Размер', 'property' => 'captionRu'])
            ->add('site.domain', null, ['label' => 'Сайт', 'property' => 'domain'])
            ->add('user.email', null, ['label' => 'Пользователь',
                'template' => 'CoreSiteBundle:Admin\list_fields\AdPlace:user.html.twig'
            ])
            ->add('isShowInCatalog', null, ['label' => 'В каталоге'])
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )));
    }


    /**
     * Настройки фильтра для списка баннеров
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID сайта, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID сайта, через запятую']])
            ->add('name', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('size', null, array('label' => 'Размер'), null, ['property' => 'captionRu', 'attr' => ['placeholder' => 'Размер']])
            ->add('isShowInCatalog', null, array('label' => 'В каталоге'), null, ['attr' => ['placeholder' => 'В каталоге']])
            ->add('site', 'doctrine_orm_callback',
                array(
                    'label' => 'Введите название домена',
                    'field_type' => 'ajax_entity',
                    'callback' => function ($qb, $alias, $field, $value) {
                        if (!count($value['value'])) {
                            return;
                        }
                        $qb
                            ->andWhere($alias . '.site IN(:site) ')->setParameter('site',
                                explode(',', $value['value']));
                    }), null,
                array(
                    'class' => 'Core\SiteBundle\Entity\Site',
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'domain' => array(
                            'search' => true,
                            'return' => true
                        )
                    ],
                    'select2_constructor' => array(
                        'placeholder' => 'Введите название домена',
                        'minimumInputLength' => 1),
                ))
            ->add('user', 'doctrine_orm_callback',
                array(
                    'label' => 'Введите E-mail, фамилию, ID клиента',
                    'field_type' => 'ajax_entity',
                    'callback' => function ($qb, $alias, $field, $value) {
                        if (!count($value['value'])) {
                            return;
                        }
                        $qb
                            ->andWhere($alias . '.user IN(:user) ')->setParameter('user',
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
                ));

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
