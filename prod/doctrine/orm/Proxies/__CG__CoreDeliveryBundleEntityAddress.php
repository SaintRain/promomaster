<?php

namespace Proxies\__CG__\Core\DeliveryBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Address extends \Core\DeliveryBundle\Entity\Address implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'id', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'name', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'captionRu', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'status', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'services', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'description', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'mapLink', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'city', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'latitude', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'longitude', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'isSupplyPlacticCard');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'id', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'name', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'captionRu', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'status', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'services', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'description', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'mapLink', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'city', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'latitude', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'longitude', '' . "\0" . 'Core\\DeliveryBundle\\Entity\\Address' . "\0" . 'isSupplyPlacticCard');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Address $proxy) {
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
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
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
    public function setCaptionRu($captionRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaptionRu', array($captionRu));

        return parent::setCaptionRu($captionRu);
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
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
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
    public function getServices()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServices', array());

        return parent::getServices();
    }

    /**
     * {@inheritDoc}
     */
    public function setServices($services)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServices', array($services));

        return parent::setServices($services);
    }

    /**
     * {@inheritDoc}
     */
    public function addService(\Core\DeliveryBundle\Entity\Service $service = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addService', array($service));

        return parent::addService($service);
    }

    /**
     * {@inheritDoc}
     */
    public function removeService(\Core\DeliveryBundle\Entity\Service $service = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeService', array($service));

        return parent::removeService($service);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getMapLink()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMapLink', array());

        return parent::getMapLink();
    }

    /**
     * {@inheritDoc}
     */
    public function setMapLink($mapLink)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMapLink', array($mapLink));

        return parent::setMapLink($mapLink);
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(\Core\DirectoryBundle\Entity\City $city = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', array());

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function getFullCaptionRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFullCaptionRu', array());

        return parent::getFullCaptionRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', array());

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', array($latitude));

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', array());

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', array($longitude));

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsSupplyPlacticCard()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsSupplyPlacticCard', array());

        return parent::getIsSupplyPlacticCard();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsSupplyPlacticCard($isSupplyPlacticCard)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsSupplyPlacticCard', array($isSupplyPlacticCard));

        return parent::setIsSupplyPlacticCard($isSupplyPlacticCard);
    }

}
