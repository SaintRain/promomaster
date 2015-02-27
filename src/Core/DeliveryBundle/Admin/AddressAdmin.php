<?php

/**
 * Админский класс пунктов доставок
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AddressAdmin extends Admin {


    protected $translationDomain = 'CoreDeliveryBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = (null === $object->getId()) ? 'Добавление нового пункта доставки' : 'Пункт доставки '. $object->getFullCaptionRu();

        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('city', 'ajax_entity', [
                'label' => 'Город',
                'required' => true,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'name' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'region.name' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ],
                'select2_constructor' => array(
                    'width' => '40%',
                    'placeholder' => 'Введите название города',
                    'minimumInputLength' => 1),
            ])
            ->add('captionRu', null, array(
                            'label' => 'Адрес'))
            ->add('name', null, array(
                            'help' => "<b>ВАЖНО!!!</b> Может быть использовано программистом",
                            'label' => 'Системное имя'))
            ->add('description', null, array(
                            'required' => false,
                            'label' => 'Описание'))
            ->add('mapLink', null, array(
                            'required' => false,
                            'label' => 'Ссылка на карту'))
            ->add('latitude', null, array(
                            'required' => false,
                            'label' => 'Широта'))
            ->add('longitude', null, array(
                            'required' => false,
                            'label' => 'Долгота'))
            ->add('isSupplyPlacticCard', 'choice', array(
                                    'attr' => array('class' => 'choice-inline with-min-width'),
                                    'expanded' => true,
                                    'choices' => array(
                                      1 => 'Да',
                                      0 => 'Нет',
                                    ),
                            'label' => 'Возможна оплата пластиковой картой'))
            ->add('status', 'choice', array(
                                    'attr' => array('class' => 'choice-inline with-min-width'),
                                    'expanded' => true,
                                    'choices' => array(
                                      1 => 'Вкл.',
                                      0 => 'Выкл.',
                                    ),
                            'label' => 'Статус'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
				'label' => '№'))
                    ->addIdentifier('city.name', null, array(
                            'label' => 'Город'))
                    ->addIdentifier('captionRu', null, array(
                            'label' => 'Адрес'))
                    ->add('name', null, array(
                                    'label' => 'Системное имя'))
                    ->add('isSupplyPlacticCard', null, array(
                                    'editable' => true,
                                    'label' => 'Возможна оплата пластиковой картой'))
                    ->add('status', null, array(
                                    'editable' => true,
                                    'label' => 'Вкл.'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id', null, array(
                            'label' => '№'), null,
                            array('attr' => ['placeholder' => 'ID'])
                        )
                    ->add('city.name', 'doctrine_orm_callback', array(
                        'label' => 'Город',
                        'field_type' => 'ajax_entity',
                        'callback' => function($qb, $alias, $field, $value) {
                                if (!count($value['value'])) {
                                    return;
                                }
                                $qb
                                    ->andWhere($alias . '.city = :city')->setParameter('city', $value['value'])->setParameter('city', $value['value']);
                            }), null, array(
                        'class' => 'Core\DirectoryBundle\Entity\City',
                        'properties' => [
                            'id' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'full',
                            ),
                            'name' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'left',
                            ),
                            'area' => array(
                                'search' => false,
                                'return' => true,
                                'entry' => 'left',
                            ),
                        ],
                        'select2_constructor' => array(
                            'placeholder' => 'Введите название города',
                            'minimumInputLength' => 1),
                    ))
                    ->add('captionRu', null, array(
                            'label' => 'Адрес'), null,
                        array('attr' => ['placeholder' => 'Адрес'])
                    )
                    ->add('name', null, array(
                                    'label' => 'Системное имя'), null,
                                    array('attr' => ['placeholder' => 'Системное имя'])
                    )
                    ->add('isSupplyPlacticCard', null, array(
                                    'label' => 'Возможна оплата пластиковой картой'), null,
                                    array('attr' => ['placeholder' => 'Возможна оплата пластиковой картой'])
                    )
                    ->add('status', null, array(
                                    'label' => 'Вкл.'), null,
                                    array('attr' => ['placeholder' => 'Включено'])
                    )

        ;
    }

    /**
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }

    }

    /**
     *
     * @param string $context
     * @return Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery
     */
    public function createQuery($context = 'list')
    {
        $queryBuilder = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $queryBuilder->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $queryBuilder->leftJoin($rootAlias . '.city', 'city')
            ->addSelect('city');

        return $queryBuilder;
    }

}