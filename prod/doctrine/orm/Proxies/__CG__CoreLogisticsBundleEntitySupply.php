<?php

namespace Proxies\__CG__\Core\LogisticsBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Supply extends \Core\LogisticsBundle\Entity\Supply implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'status', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'dateTime', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'supplier', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'seller', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'stock', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'countryOfSupply', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'countryOfOrigin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'gtdNumber', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'note', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'products', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isProductUnitsWasCreated', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isProductUnitsWasUpdated', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isVirtual', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'additionalCosts', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'order', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isCreatedForOrderOnly');
        }

        return array('__isInitialized__', 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'status', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'dateTime', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'supplier', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'seller', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'stock', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'countryOfSupply', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'countryOfOrigin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'gtdNumber', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'note', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'products', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isProductUnitsWasCreated', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isProductUnitsWasUpdated', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isVirtual', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'additionalCosts', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'order', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Supply' . "\0" . 'isCreatedForOrderOnly');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Supply $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateTime', array());

        return parent::getDateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateTime($dateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateTime', array($dateTime));

        return parent::setDateTime($dateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupplier()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSupplier', array());

        return parent::getSupplier();
    }

    /**
     * {@inheritDoc}
     */
    public function setSupplier($supplier)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSupplier', array($supplier));

        return parent::setSupplier($supplier);
    }

    /**
     * {@inheritDoc}
     */
    public function getSeller()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSeller', array());

        return parent::getSeller();
    }

    /**
     * {@inheritDoc}
     */
    public function setSeller($seller)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSeller', array($seller));

        return parent::setSeller($seller);
    }

    /**
     * {@inheritDoc}
     */
    public function getStock()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStock', array());

        return parent::getStock();
    }

    /**
     * {@inheritDoc}
     */
    public function setStock($stock)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStock', array($stock));

        return parent::setStock($stock);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryOfSupply()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountryOfSupply', array());

        return parent::getCountryOfSupply();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountryOfSupply($countryOfSupply)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountryOfSupply', array($countryOfSupply));

        return parent::setCountryOfSupply($countryOfSupply);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryOfOrigin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountryOfOrigin', array());

        return parent::getCountryOfOrigin();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountryOfOrigin($countryOfOrigin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountryOfOrigin', array($countryOfOrigin));

        return parent::setCountryOfOrigin($countryOfOrigin);
    }

    /**
     * {@inheritDoc}
     */
    public function getGtdNumber()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGtdNumber', array());

        return parent::getGtdNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setGtdNumber($gtdNumber)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGtdNumber', array($gtdNumber));

        return parent::setGtdNumber($gtdNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getNote()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNote', array());

        return parent::getNote();
    }

    /**
     * {@inheritDoc}
     */
    public function setNote($note)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNote', array($note));

        return parent::setNote($note);
    }

    /**
     * {@inheritDoc}
     */
    public function getProducts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProducts', array());

        return parent::getProducts();
    }

    /**
     * {@inheritDoc}
     */
    public function setProducts($products)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProducts', array($products));

        return parent::setProducts($products);
    }

    /**
     * {@inheritDoc}
     */
    public function addProduct($product)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProduct', array($product));

        return parent::addProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProduct($product)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProduct', array($product));

        return parent::removeProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsProductUnitsWasCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsProductUnitsWasCreated', array());

        return parent::getIsProductUnitsWasCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsProductUnitsWasCreated($isProductUnitsWasCreated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsProductUnitsWasCreated', array($isProductUnitsWasCreated));

        return parent::setIsProductUnitsWasCreated($isProductUnitsWasCreated);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsProductUnitsWasUpdated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsProductUnitsWasUpdated', array());

        return parent::getIsProductUnitsWasUpdated();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsProductUnitsWasUpdated($isProductUnitsWasUpdated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsProductUnitsWasUpdated', array($isProductUnitsWasUpdated));

        return parent::setIsProductUnitsWasUpdated($isProductUnitsWasUpdated);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsVirtual()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsVirtual', array());

        return parent::getIsVirtual();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsVirtual($isVirtual)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsVirtual', array($isVirtual));

        return parent::setIsVirtual($isVirtual);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdditionalCosts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdditionalCosts', array());

        return parent::getAdditionalCosts();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdditionalCosts($additionalCosts)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdditionalCosts', array($additionalCosts));

        return parent::setAdditionalCosts($additionalCosts);
    }

    /**
     * {@inheritDoc}
     */
    public function addAdditionalCost($additionalCost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAdditionalCost', array($additionalCost));

        return parent::addAdditionalCost($additionalCost);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAdditionalCost($additionalCost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAdditionalCost', array($additionalCost));

        return parent::removeAdditionalCost($additionalCost);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrder', array());

        return parent::getOrder();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder($order)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrder', array($order));

        return parent::setOrder($order);
    }

    /**
     * {@inheritDoc}
     */
    public function isIsCreatedForOrderOnly()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isIsCreatedForOrderOnly', array());

        return parent::isIsCreatedForOrderOnly();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsCreatedForOrderOnly($isCreatedForOrderOnly)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsCreatedForOrderOnly', array($isCreatedForOrderOnly));

        return parent::setIsCreatedForOrderOnly($isCreatedForOrderOnly);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductsUnitsQuantity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductsUnitsQuantity', array());

        return parent::getProductsUnitsQuantity();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductsUnitsCost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductsUnitsCost', array());

        return parent::getProductsUnitsCost();
    }

    /**
     * {@inheritDoc}
     */
    public function isValid(\Symfony\Component\Validator\ExecutionContextInterface $context)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isValid', array($context));

        return parent::isValid($context);
    }

}