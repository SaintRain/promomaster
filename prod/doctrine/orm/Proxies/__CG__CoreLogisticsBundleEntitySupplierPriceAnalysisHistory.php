<?php

namespace Proxies\__CG__\Core\LogisticsBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SupplierPriceAnalysisHistory extends \Core\LogisticsBundle\Entity\SupplierPriceAnalysisHistory implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'priceAnalysis', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'product', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'price', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'orderOnlyPriceBuying', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'OOPBCurrency', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'mrc', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'createdDateTime');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'priceAnalysis', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'product', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'price', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'orderOnlyPriceBuying', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'OOPBCurrency', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'mrc', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisHistory' . "\0" . 'createdDateTime');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SupplierPriceAnalysisHistory $proxy) {
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
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getPriceAnalysis()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriceAnalysis', array());

        return parent::getPriceAnalysis();
    }

    /**
     * {@inheritDoc}
     */
    public function getProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduct', array());

        return parent::getProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function getPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrice', array());

        return parent::getPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderOnlyPriceBuying()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderOnlyPriceBuying', array());

        return parent::getOrderOnlyPriceBuying();
    }

    /**
     * {@inheritDoc}
     */
    public function getOOPBCurrency()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOOPBCurrency', array());

        return parent::getOOPBCurrency();
    }

    /**
     * {@inheritDoc}
     */
    public function getMrc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMrc', array());

        return parent::getMrc();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedDateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedDateTime', array());

        return parent::getCreatedDateTime();
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
    public function setPriceAnalysis($priceAnalysis)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriceAnalysis', array($priceAnalysis));

        return parent::setPriceAnalysis($priceAnalysis);
    }

    /**
     * {@inheritDoc}
     */
    public function setProduct($product)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProduct', array($product));

        return parent::setProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function setPrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrice', array($price));

        return parent::setPrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderOnlyPriceBuying($orderOnlyPriceBuying)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderOnlyPriceBuying', array($orderOnlyPriceBuying));

        return parent::setOrderOnlyPriceBuying($orderOnlyPriceBuying);
    }

    /**
     * {@inheritDoc}
     */
    public function setOOPBCurrency($OOPBCurrency)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOOPBCurrency', array($OOPBCurrency));

        return parent::setOOPBCurrency($OOPBCurrency);
    }

    /**
     * {@inheritDoc}
     */
    public function setMrc($mrc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMrc', array($mrc));

        return parent::setMrc($mrc);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDateTime(\DateTime $createdDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDateTime', array($createdDateTime));

        return parent::setCreatedDateTime($createdDateTime);
    }

}
