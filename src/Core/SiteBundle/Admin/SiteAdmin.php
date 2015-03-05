<?php

/**
 * Админский класс для сайтов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Core\SiteBundle\Admin\Form\Mapper\WebSiteFormMapper;
use Core\SiteBundle\Entity\WebSite;




class SiteAdmin extends Admin
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
        $text = null === $object->getId() ? 'Добавление новой площадки' : 'Редактирование площадки ' . $object->getId();
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        if ($obj instanceof WebSite) {
            //контейнер
            $container = $this->getConfigurationPool()->getContainer();
            $options = array('obj' => $obj, 'container' => $container);

            new WebSiteFormMapper($formMapper, $options);
        }
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->addIdentifier('createdDateTime', null, ['label' => 'Добавлено'])
//            ->add('domain', null, ['label' => 'Сайт',
//            'template' => 'CoreSiteBundle:Admin\Site\list_fields:domain.html.twig'
//            ])
//            ->add('mirrors', null, ['label' => 'Зеркала',
//                'required'=>false,
//                'template' => 'CoreSiteBundle:Admin\Site\list_fields:mirrors.html.twig'
//            ])
            ->add('user.email', null, ['label' => 'Пользователь',
                'template' => 'CoreSiteBundle:Admin\Site\list_fields:user.html.twig'
            ])
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
                'label' => 'ID площадки, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID площадки, через запятую']])
//            ->add('domain', null, array('label' => 'Сайт'), null, ['attr' => ['placeholder' => 'Название']])
//            ->add('mirrors', null, array('label' => 'Зеркало'), null, ['attr' => ['placeholder' => 'Зеркало']])

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
