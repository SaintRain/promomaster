<?php

namespace Proxies\__CG__\Core\DirectoryBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Country extends \Core\DirectoryBundle\Entity\Country implements \Doctrine\ORM\Proxy\Proxy
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
     * {@inheritDoc}
     * @param string $name
     */
    public function __get($name)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', array($name));

        return parent::__get($name);
    }





    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'id', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'isEnabled', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'alpha2', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'numeric', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'createdAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'updatedAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'indexPosition', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'cityList', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'regionList', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'citiesAmount');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'id', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'isEnabled', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'alpha2', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'numeric', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'createdAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'updatedAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'indexPosition', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'cityList', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'regionList', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\Country' . "\0" . 'citiesAmount');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Country $proxy) {
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function __call($name, $arguments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__call', array($name, $arguments));

        return parent::__call($name, $arguments);
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
    public function getAlpha2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlpha2', array());

        return parent::getAlpha2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlpha2($alpha2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlpha2', array($alpha2));

        return parent::setAlpha2($alpha2);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumeric()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumeric', array());

        return parent::getNumeric();
    }

    /**
     * {@inheritDoc}
     */
    public function setNumeric($numeric)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumeric', array($numeric));

        return parent::setNumeric($numeric);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getIndexPosition()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIndexPosition', array());

        return parent::getIndexPosition();
    }

    /**
     * {@inheritDoc}
     */
    public function setIndexPosition($indexPosition)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIndexPosition', array($indexPosition));

        return parent::setIndexPosition($indexPosition);
    }

    /**
     * {@inheritDoc}
     */
    public function getCityList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCityList', array());

        return parent::getCityList();
    }

    /**
     * {@inheritDoc}
     */
    public function setCityList($cityList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCityList', array($cityList));

        return parent::setCityList($cityList);
    }

    /**
     * {@inheritDoc}
     */
    public function getCitiesAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCitiesAmount', array());

        return parent::getCitiesAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setCitiesAmount($citiesAmount = 0)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCitiesAmount', array($citiesAmount));

        return parent::setCitiesAmount($citiesAmount);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegionList', array());

        return parent::getRegionList();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegionList(\Doctrine\Common\Collections\ArrayCollection $regionList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegionList', array($regionList));

        return parent::setRegionList($regionList);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionsAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegionsAmount', array());

        return parent::getRegionsAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function getCaption($locale)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaption', array($locale));

        return parent::getCaption($locale);
    }

}
