<?php

/**
 * Админский класс для размещений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class PlacementAdmin extends Admin
{

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'id';
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
        $text = null === $object->getId() ? 'Добавление размещения' : 'Редактирование размещения № ' . $object->getId();
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
            //->add('adCompany', null, ['label' => 'Кампания', 'empty_value'=>'Ничего не выбрано...', 'property' => 'id'])
//            ->add('adPlace.id', 'hidden', ['label' => 'Рекламное место'])

            ->add('placementBannersList', 'sonata_type_collection',
                array(
                    'by_reference' => false,
                    'required' => false,
                    'label' => 'Баннеры размещения',
                    'type_options' => array('delete' => true)
                ), array(
                    'sortable' => 'indexPosition',
                    'edit' => 'inline',
                    'inline' => 'table',
                ))
            ->add('adPlace', 'entity', [
                'required'=>true,
                'label'=>'Рекламное место',
                'empty_value'=>'Ничего не выбрано...',
                'class' => 'CoreSiteBundle:AdPlace',
                'property' => 'name'
            ])

            ->add('startDateTime', 'date', array(
                'required' => true,
                'label' => 'Дата начала',
                'attr' => ['class' => 'datepicker'],
                'widget' => 'single_text',
                //'view_timezone' => $options['container']->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy'))

            ->add('finishDateTime', 'date', array(
                'required' => true,
                'label' => 'Дата окончания',
                'attr' => ['class' => 'datepicker'],
                'widget' => 'single_text',
                //'view_timezone' => $options['container']->getParameter('default_timezone'),
                'format' => 'dd.MM.yyyy'))
            ->add('quantity', null, ['label' => 'Количество'])
            ->add('isEnabled', null, ['label' => 'Активно'])


        ->with('Дефолтные настройки показа')
        ->add('defaultCountries', null, ['label'=>'Страны']);


    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->add('adCompany.name', null, ['label' => 'Кампания'])
            ->add('adPlace.name', null, ['label' => 'Рекламное место'])
            ->add('placementBannersList', null, ['label' => 'Баннеры размещения',
                'template' => 'CoreAdCompanyBundle:Admin\list_fields\AdCompany:placementBannersList.html.twig'
            ])
            ->add('startDateTime', null, ['label' => 'Дата начало'])
            ->add('finishDateTime', null, ['label' => 'Дата окончания'])
            ->add('quantity', null, ['label' => 'Количество', 'required'=>true])
            ->add('isEnabled', null, ['label' => 'Активно'])
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
//    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
//    {
//        $datagridMapper
//            ->add('id', 'doctrine_orm_callback', array(
//                'label' => 'ID кампании, через запятую',
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
