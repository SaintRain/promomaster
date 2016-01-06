<?php

/**
 * Админский класс для баннеров размещений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;





class PlacementBannerAdmin extends Admin
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
        $text = null === $object->getId() ? 'Добавление баннера размещения' : 'Редактирование баннера размещения № ' . $object->getId();
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
            ->add('banner', null, ['label'=>'Баннер', 'empty_value'=>'Ничего не выбрано', 'property'=>'name'])
            ->add('preoritet', null, ['label'=>'Преоритет'])
            ->with('Дефолтные настройки показа')
           // ->add('defaultCountries', null, ['label'=>'Страны', 'property'=>'id']);
        ;


    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->add('banner.name', null, ['label'=>'Баннер'])
            ->add('placement.id', null, ['label'=>'Размещение ID'])
            ->add('preoritet', null, ['label'=>'Преоритет'])

            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )        ));
    }


    /**
     * Настройки фильтра для списка баннеров
     */
//    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
//    {
//        $datagridMapper
//            ->add('id', 'doctrine_orm_callback', array(
//                'label' => 'ID компании, через запятую',
//                'callback' => array($this, 'searchById'),
//                'field_type' => 'text'
//            ), null, ['attr' => ['placeholder' => 'ID сайта, через запятую']])
//            ->add('name', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
//            ->add('isEnabled', null, array('label' => 'Включено'), null, ['attr' => ['placeholder' => 'Включено']])
//
//            ->add('user', 'doctrine_orm_callback',
//                array(
//                    'label' => 'Введите E-mail, фамилию, ID клиента',
//                    'field_type' => 'ajax_entity',
//                    'callback' => function($qb, $alias, $field, $value) {
//                        if (!count($value['value'])) {
//                            return;
//                        }
//                        $qb
//                            ->andWhere($alias.'.user IN(:user) ')->setParameter('user',
//                                explode(',', $value['value']));
//                    }), null,
//                array(
//                    'class' => 'Application\Sonata\UserBundle\Entity\User',
//                    'properties' => [
//                        'id' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'full',
//                        ),
//                        'email' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'firstName' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'surName' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left'
//                        )
//                        ],
//                    'select2_constructor' => array(
//                        'placeholder' => 'Введите E-mail, фамилию, ID клиента',
//                        'minimumInputLength' => 1),
//                ))
//        ;
//
//    }


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
