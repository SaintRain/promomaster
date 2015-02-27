<?php

namespace Core\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Core\PaymentBundle\Entity\PaymentSystem\Qiwi;
use Core\PaymentBundle\Entity\PaymentSystem\PayPal;
use Core\PaymentBundle\Entity\PaymentSystem\WebMoney;
use Core\PaymentBundle\Entity\PaymentSystem\Robokassa;
use Core\PaymentBundle\Entity\PaymentSystem\YandexMoney;
use Core\PaymentBundle\Entity\PaymentSystem\PlasticCard;
use Core\PaymentBundle\Entity\PaymentSystem\BankTransfer;
use Core\PaymentBundle\Entity\PaymentSystem\PaymentOnDelivery;
use Core\PaymentBundle\Entity\PaymentSystem\PlasticCardTerminal;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\QiwiFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\PayPalFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\WebMoneyFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\RobokassaFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\YandexMoneyFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\PlasticCardFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\BankTransferFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\PaymentOnDeliveryFormMapper;
use Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem\PlasticCardTerminalFormMapper;

class CommonPaymentSystemAdmin extends Admin {

    protected $translationDomain = 'CorePaymentBundle';

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление новой платежной системы' : 'Редактирование платежной системы «' . $object->getCaptionRu() . '»';
        return $text;
    }

    public function configureRoutes(RouteCollection $collection) {
        //срываем кнопку удаленя
        $collection->remove('delete');
        $collection->remove('create');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        switch (true) {
            case ($obj instanceof WebMoney):
                new WebMoneyFormMapper($formMapper, $options);
                break;
            case ($obj instanceof Robokassa):
                new RobokassaFormMapper($formMapper, $options);
                break;
            case ($obj instanceof Qiwi):
                new QiwiFormMapper($formMapper, $options);
                break;
            case ($obj instanceof YandexMoney):
                new YandexMoneyFormMapper($formMapper, $options);
                break;
            case ($obj instanceof PlasticCard):
                new PlasticCardFormMapper($formMapper, $options);
                break;
            case ($obj instanceof PlasticCardTerminal):
                new PlasticCardTerminalFormMapper($formMapper, $options);
                break;
            case ($obj instanceof BankTransfer):
                new BankTransferFormMapper($formMapper, $options);
                break;
            case ($obj instanceof PaymentOnDelivery):
                new PaymentOnDeliveryFormMapper($formMapper, $options);
                break;
            case ($obj instanceof PayPal):
                new PayPalFormMapper($formMapper, $options);
                break;
            default:break;
        }
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки',
                'editable' => true
            ))
            ->addIdentifier('captionRu', null, array(
                'label' => 'Название',
            ))
            ->add('commission', null, array(
                'label' => 'Комиссия',
                'template' => 'CorePaymentBundle:Admin\List:list_percent.html.twig',
            ))
            ->add('isCollectCommission', null, array(
                'label' => 'Взимать комиссию с клиента',
                'editable' => true,
            ))
            ->add('isCustomerIndividual', null, array(
                'label' => 'Доступность физ. лицам',
                'editable' => true
            ))
            ->add('isCustomerCorporate', null, array(
                'label' => 'Доступность юр. лицам',
                'editable' => true
            ))
            ->add('isInFooter', null, array(
                'label' => 'Показывать в футере',
                'editable' => true,
                'required' => false))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'editable' => true
            ))
            ->add('payments', null, array(
                'label' => 'Общая внесенная сумма',
                'template' => 'CorePaymentBundle:Admin\List:list_total_amount.html.twig',
            ))
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                )
            ))
        ;
    }

    /**
     * Переписываем запрос на выборку для списка
     */
    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всей палитры
        $query
            ->leftJoin($rootAlias . '.payments', 'payments')->addSelect('payments')
            ->leftJoin('payments.customer', 'customer')->addSelect('customer');
        return $query;
    }
}
