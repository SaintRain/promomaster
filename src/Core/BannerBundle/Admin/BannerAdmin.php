<?php

/**
 * Админский класс для всех баннеров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


use Core\BannerBundle\Admin\Form\Mapper\ImageBannerFormMapper;
use Core\BannerBundle\Admin\Form\Mapper\FlashBannerFormMapper;
use Core\BannerBundle\Admin\Form\Mapper\CodeBannerFormMapper;

use Core\BannerBundle\Entity\ImageBanner;
use Core\BannerBundle\Entity\FlashBanner;
use Core\BannerBundle\Entity\CodeBanner;


class BannerAdmin extends Admin
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
        $text = null === $object->getId() ? 'Добавление нового баннера' : 'Редактирование баннера ' . $object->getName();
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


        if ($obj instanceof ImageBanner) {
            new ImageBannerFormMapper($formMapper, $options);
        } elseif ($obj instanceof FlashBanner) {
            new FlashBannerFormMapper($formMapper, $options);
        } elseif ($obj instanceof CodeBanner) {
            new CodeBannerFormMapper($formMapper, $options);
        }
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->addIdentifier('createdDateTime', null, ['label' => 'Добавлено'])
            ->addIdentifier('name', null, ['label' => 'Название баннера'])
            ->addIdentifier('user.email', null, ['label' => 'Пользователь'])
            ->add('url', null, ['label' => 'URL перехода',
                'template' => 'CoreBannerBundle:Admin\list_fields:url.html.twig'
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
                'label' => 'ID баннера, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID продукта, через запятую']])
            ->add('name', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('type', 'doctrine_orm_class', array(
                'attr' => ['placeholder' => 'Тип баннера'],
                'label' => 'Тип продукта',
                'sub_classes' => $this->getSubClasses()
            ), null, array('attr' => ['placeholder' => 'Тип баннера']))

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
