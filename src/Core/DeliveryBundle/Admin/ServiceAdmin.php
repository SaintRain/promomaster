<?php

/**
 * Админский класс для типов услуг транспортных компаний
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
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Sonata\AdminBundle\Route\RouteCollection;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;
use Core\DeliveryBundle\Admin\Form\Mapper\ServiceFormMapper;
use Core\DeliveryBundle\Admin\Form\Mapper\ServiceWithAddressFormMapper;
use Core\DeliveryBundle\Admin\Form\Mapper\ServiceInCityFormMapper;


class ServiceAdmin extends Admin {


    protected $translationDomain = 'CoreDeliveryBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = (null === $object->getId()) ? 'Добавление новой доставки' : 'Доставка '. $object->getCaptionRu();
        
        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $options = array(
            'buyerTypes' => $this->getBuyerTypes(),
            'container' => $this->getConfigurationPool()->getContainer()
        );
        $object = $this->getSubject();
        if ($object instanceof ServiceWithAddress) {
            new ServiceWithAddressFormMapper($formMapper, $options);
        } elseif ($object instanceof ServiceInCity) {
            new ServiceInCityFormMapper($formMapper, $options);
        } else {
            new ServiceFormMapper($formMapper, $options);
        }
        $formMapper->getFormBuilder()
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();
                $disabled = true;
                $choices = null;
                $required = false;
                
                if ($data && $data->getId()) {
                    $companyName = $data->getCompany()->getName();
                    if ($companyName == 'dpd' || $companyName == 'cdek') {
                        $disabled = false;
                        $required = true;
                        $choices = $this->getDeliveryInternalCodes($companyName);
                    } 
                    
                }
                
                $form->add('internalCode', 'choice', array(
                                    'required' => $required,
                                    'attr' => array('class' => 'html-error span5', 'disabled' => $disabled),
                                    'empty_value' => 'Необходимо выбрать',
                                    'choices' => $choices,
                                    'label' => 'Сис-ное имя внутри компании'))
                ;
                
            })->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();

                $disabled = true;
                $required = false;
                $choices = null;
                $id = $data['company'];
                $em = $this->getConfigurationPool()->getContainer()->get('Doctrine')->getManager();
                $company = $em->getRepository('CoreDeliveryBundle:Company')->find($id);
                $companyName = $company->getName();
                $form->remove('internalCode');
                
                if ($companyName == 'dpd' || $companyName == 'cdek') {
                    $disabled = false;
                    $required = true;
                    $choices = $this->getDeliveryInternalCodes($companyName);
                }

                $form->add('internalCode', 'choice', array(
                                    'required' => $required,
                                    'attr' => array('class' => 'html-error span5', 'disabled' => $disabled),
                                    'empty_value' => 'Необходимо выбрать',
                                    'choices' => $choices,
                                    'label' => 'Сис-ное имя внутри компании'))
                ;
            });
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
				'label' => '№'))
                    ->addIdentifier('captionRu', null, array(
                                    'label' => 'Название'))
                    /*
                    ->add('name', null, array(
                                    'label' => 'Системное имя'))
                    */
                    ->addIdentifier('company.captionRu', null, array(
                        'label' => 'Компания'
                    ))
                    ->addIdentifier('serviceType.captionRu', null, array(
                        'label' => 'Тип доставки'
                    ))
                    ->add('buyerType', null, array(
                                    'template' => 'CoreDeliveryBundle:Admin:List/list_buyer_type.html.twig',
                                    'label' => 'Ограничения по типу покупателя'))
                    /*
                    ->add('minSum', null, array(
                                    'template' => 'CoreDeliveryBundle:Admin:List/list_min_sum.html.twig',
                                    'label' => 'Мин. суммма заказа'))
                    ->add('maxSum', null, array(
                                    'template' => 'CoreDeliveryBundle:Admin:List/list_max_sum.html.twig',
                                    'label' => 'Макс. сумма заказа'))
                     * 
                     */
                    ->add('minMaxSum', null, array(
                                    'template' => 'CoreDeliveryBundle:Admin:List/list_min_max_sum.html.twig',
                                    'label' => 'Мин./Макс. суммма заказа'))
                    
                    ->add('isCashOnDelivery', null, array(                                        
                                    'editable' => true,
                                    'label' => 'Наложный платеж'))
                    ->add('serviceVariant', null, array(
                                    'template' => 'CoreDeliveryBundle:Admin:List/list_service_variant.html.twig',
                                    'label' => 'Вариант доставки'))
                    ->add('isShowOnProduct', null, array(
                                    'label' => 'На странице продукта'))

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id', null, array(
				'label' => '№'), null,
                                    array('attr' => ['placeholder' => 'ID'])
                        )
                    ->add('captionRu', null, array(
                                    'label' => 'Название'), null,
                                    array('attr' => ['placeholder' => 'Название'])
                        )
                    ->add('name', null, array(
                                    'label' => 'Системное имя'), null,
                                    array('attr' => ['placeholder' => 'Системное имя'])
                        )
                    ->add('buyerType', null, array(
                                    'label' => 'Ограничения по типу покупателя'), null,
                                    array('attr' => ['placeholder' => 'Ограничения по типу покупателя'])
                        )
                    ->add('company', null, array(
                                    'label' => 'Компания'), null,
                                    array('attr' => ['placeholder' => 'Компания'])
                        )
                    ->add('serviceType', null, array(
                                    'label' => 'Тип доставки'), null,
                                    array('attr' => ['placeholder' => 'Тип доставки'])
                        )
                    ->add('minSum', null, array(
                                    'label' => 'Мин. суммма заказа'), null,
                                    array('attr' => ['placeholder' => 'Мин. суммма заказа'])
                        )
                    ->add('maxSum', null, array(
                                    'label' => 'Макс. сумма заказа'), null,
                                    array('attr' => ['placeholder' => 'Макс. сумма заказа'])
                        )
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('intenalCodes', 'internal_codes');
        $collection->add('deliveryPrice', 'delivery_price');
        $collection->add('printWaybill', $this->getRouterIdParameter() .'/print_waybill');
        $collection->add('cancel', 'cancel_order');
        $collection->add('waybill', 'waybill');
        $collection->add('deliveryCity', 'delivery_city');
    }

    public function getTemplate($name)
    {
            switch($name) {
                    // Общий список
                    case 'list':
                            return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
                    case 'edit':
                            return 'CoreDeliveryBundle:Admin\Service:edit.html.twig';
                    case 'waybill':
                            return 'CoreDeliveryBundle:Admin\Service:waybill.html.twig';
                    default:
                            return parent::getTemplate($name);
            }
    }

    /**
     * Типы ограничений по типу покупателя(контрагенту)
     * @return array
     */
    private function getBuyerTypes()
    {
        return  array(
            'IndiContragent' => 'Физ. лица',
            'LegalContragent' => 'Юр. лица'
        );
    }

    /**
     * Внутренние системные имена типов доставки
     * для определенных ТК
     * @return array
     */
    public function getDeliveryInternalCodes($companyName, $catchError = false)
    {
        $params = array();
        $container = $this->getConfigurationPool()->getContainer();
        $param = 'core_delivery.' . $companyName . '.InternalCodes';
        $sysNames = [];

        if ($container->hasParameter($param)) {
            $params = $container->getParameter($param);
        } elseif ($catchError) {
            return array();
        } else {
            throw new \Exception($param . 'Not Found');
        }
       
        foreach($params as $key => $val) {
            if ($val['isActive']) {
                if (isset($val['group'])) {
                    $sysNames[$val['group']][$val['id']] = $val['name'];
                } else {
                    $sysNames[$val['id']] = $val['name'];
                }

            } 
        }
        return $sysNames;
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
        $queryBuilder->leftJoin($rootAlias . '.company', 'company')
            ->leftJoin($rootAlias . '.serviceType', 'serviceType')
            ->addSelect('company','serviceType');

        return $queryBuilder;
    }

}