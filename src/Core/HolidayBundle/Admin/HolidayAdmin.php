<?php
/**
 * Админский класс для праздников
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Core\HolidayBundle\Admin\Form\Mapper\HolidayFormMapper;

class HolidayAdmin extends Admin
{
    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'startedAt'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового праздника' : 'Редактирование праздника «'.$object->getCaptionRu().'»';
        return $text;
    }

    /**
     * Переписываем шаблон, чтобы переделать фильтр
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
     * Форма редактирования
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

        new HolidayFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('logo', null, array(
                'label' => 'Логотип',
                'template' => 'CoreFileBundle:Admin\List:list_image.html.twig'
            ))
            ->addIdentifier('captionRu', null, array('label' => 'Название'))
            ->addIdentifier('startedAt', null, array(
                'label' => 'Дата начала',
                'template' => 'CoreHolidayBundle:Admin\List:list_date_GMT.html.twig'))
            ->addIdentifier('endedAt', null, array(
                'label' => 'Дата окончания',
                'template' => 'CoreHolidayBundle:Admin\List:list_date_GMT.html.twig'
                ))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'editable' => true
            ))
            ->add('_action', 'actions',
                array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )
        ));
    }

    /**
     * Переписываем запрос на выборку
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всех логотипов
        $query
            ->leftJoin($rootAlias.'.logo', 'logo')->addSelect('logo');
        return $query;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('captionRu', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('startedAt', 'doctrine_orm_callback',
                array(
                'label' => 'Дата начала',
                'callback' => array($this, 'searchByStartedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Дата начала'))
            ->add('endedAt', 'doctrine_orm_callback',
                array(
                'label' => 'Дата окончания',
                'callback' => array($this, 'searchByEndedAt'),
                'field_type' => 'admin_date_range'), null, array('placeholder' => 'Дата окончания'))
            ->add('isEnabled', null, array('label' => 'Активность'), null, ['attr' => ['placeholder' => 'Активность']])
        ;
    }

    public function searchByStartedAt($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'startedAt', 'from' => 'fromStartedAt', 'to' => 'toStartedAt');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByEndedAt($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'endedAt', 'from' => 'fromEndedAt', 'to' => 'toEndedAt');
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
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']), ':'.$searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if ($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']), ':'.$searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
        }
    }
}