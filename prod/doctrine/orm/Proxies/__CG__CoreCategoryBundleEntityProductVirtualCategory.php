<?php

namespace Proxies\__CG__\Core\CategoryBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ProductVirtualCategory extends \Core\CategoryBundle\Entity\ProductVirtualCategory implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'id', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'name', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'isEnabled', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'products', 'captionRu', 'captionEn');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'id', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'name', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'isEnabled', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' . "\0" . 'products', 'captionRu', 'captionEn');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ProductVirtualCategory $proxy) {
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
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsEnabled()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsEnabled', array());

        return parent::getIsEnabled();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsEnabled($isEnabled)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsEnabled', array($isEnabled));

        return parent::setIsEnabled($isEnabled);
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
    public function getCaptionRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaptionRu', array());

        return parent::getCaptionRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getCaptionEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaptionEn', array());

        return parent::getCaptionEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setCaptionRu($captionRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaptionRu', array($captionRu));

        return parent::setCaptionRu($captionRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setCaptionEn($captionEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaptionEn', array($captionEn));

        return parent::setCaptionEn($captionEn);
    }

}