<?php

/**
 * Админскйи класс юзеров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\UserBundle\Admin\Entity\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class UserAdmin extends BaseUserAdmin
{
    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id'
    );
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('username')
                ->add('email')
                ->add('groups')
                ->add('enabled', null, array('editable' => true))
                ->add('locked', null, array('editable' => true))
                ->add('createdAt')
                ->add('contragents', null, array(
                    'label' => 'Заказы',
                    'template' => 'ApplicationSonataUserBundle:Admin:List/list_contragents_info.html.twig',
                    'sortable' => false))
                ->add('contragentCount', null, array(
                    'label' => 'Больше 1го контрагента',
                    'template' => 'ApplicationSonataUserBundle:Admin:List/list_contragents_count.html.twig',
                    'sortable' => false))
                ->add('logs', null, array(
                    'label' => 'Данные об авторизации',
                    'template' => 'ApplicationSonataUserBundle:Admin:List/list_log_history.html.twig',
                    'sortable' => false))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
//        parent::configureFormFields($formMapper);

        $container = $this->getConfigurationPool()->getContainer();    //контейне
        $optionsForExtraBlocks = array(
            'sides' => ['left' => [1]],
            'tabs' => ['comments'],
        );
        $container->get('application_sonata_admin_extra_blocks_logic')->setWhatShow($optionsForExtraBlocks);

        $formMapper
                ->with('General')
                ->add('username', null, ['label' => 'Логин'])
                ->add('email', null, ['label' => 'E-mail'])
                ->add('plainPassword', 'text', array(
                    'required' => (!$this->getSubject() || is_null($this->getSubject()->getId()))
                ))
                ->add('ip', null, array('required' => false, 'label' => 'IP адрес', 'disabled' => true))
                ->with('Groups')
                ->add('groups', null, array(
                    'required' => false,
                    'expanded' => true,
                    'multiple' => true
                ))
                ->with('Profile')
//                  ->add('dateOfBirth', 'birthday', array('required' => false))
                ->add('firstname', null, array('required' => false))
                ->add('lastname', null, array('required' => false))
                ->add('website', 'text', array('required' => false, 'attr' => ['data-mask' => 'url']))
                //                ->add('biography', 'text', array('required' => false))
                //                ->add('gender', 'sonata_user_gender', array(
                //                    'required' => true,
                //                    'translation_domain' => $this->getTranslationDomain()
                //                ))
                //                ->add('locale', 'locale', array('required' => false))
                //                ->add('timezone', 'timezone', array('required' => false))
                ->add('phone', null, array('required' => false))
                ->add('notation', null, array('required' => false, 'label' => 'Примечание'))
                ->add('isRssNews', null, array('required' => false, 'label' => 'Подписка', 'help' => 'Получать новости OliKids и информацию о товарах и услугах'))
                ->with('Security')
                ->add('enabled', null, array('label' => 'Активен', 'required' => false))
                ->add('locked', null, array('label' => 'Заблокирован', 'required' => false))
                ->add('token', null, array('required' => false))
                ->add('twoStepVerificationCode', null, array('required' => false))
                ->end();
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
        $queryBuilder->leftJoin($rootAlias . '.contragents', 'contragent')
//                ->leftJoin('contragent.orders', 'orders')
//                ->leftJoin('orders.deliveryMethod', 'd')
                ->leftJoin($rootAlias . '.groups', 'g')
                ->leftJoin($rootAlias . '.logs', 'logs')
//                ->addSelect('contragent', 'orders', 'logs' ,'g', 'd')
                //->addSelect('partial contragent.{id}', 'partial orders.{id}', 'partial logs.{id, loginDateTime, ip, loginBySocial}' ,'partial g.{id, name}', 'partial d.{id, name, captionRu}')
        ;
        return $queryBuilder;
    }

    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
                ->add('id', null, array('label' => 'ID'), null,
                                    array('attr'=> ['placeholder' => 'ID'])
                )
                ->add('username', null, array('label' => 'Имя пользователя'), null,
                                    array('attr'=> ['placeholder' => 'Имя пользователя'])
                )
                ->add('locked', null, array('label' => 'Заблокирован'), null,
                                     array('attr'=> ['placeholder' => 'Заблокирован'])
                )
                ->add('email', null, array('label' => 'E-mail'), null,
                                    array('attr'=> ['placeholder' => 'E-mail'])
                )
                ->add('groups', null, array('label' => 'Группа'), null,
                                    array('attr'=> ['placeholder' => 'Группа'])
                )
        ;
    }

    public function getTemplate($name)
    {
            switch($name) {
                    // Общий список
                    case 'edit':
                            return 'ApplicationSonataUserBundle:Admin\User:edit.html.twig';
                    case 'list':
                        return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
                    default:
                            return parent::getTemplate($name);
            }
    }

    public function getObject($id)
    {
        $object = $this
                ->getModelManager()->createQuery($this->getClass(), 'o')
                ->addSelect('log')
                ->leftJoin('o.logs', 'log')
                ->where('o.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult()
        ;
        return $object;
    }

}
