<?php

namespace Proxies\__CG__\Core\AdCompanyBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Placement extends \Core\AdCompanyBundle\Entity\Placement implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'adCompany', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'adPlace', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'placementBannersList', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'startDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'finishDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'createdDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'indexPosition', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'isEnabled', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'defaultCountries');
        }

        return array('__isInitialized__', 'id', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'adCompany', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'adPlace', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'placementBannersList', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'startDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'finishDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'createdDateTime', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'indexPosition', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'isEnabled', '' . "\0" . 'Core\\AdCompanyBundle\\Entity\\Placement' . "\0" . 'defaultCountries');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Placement $proxy) {
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
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdCompany()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdCompany', array());

        return parent::getAdCompany();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdCompany($adCompany)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdCompany', array($adCompany));

        return parent::setAdCompany($adCompany);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdPlace()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdPlace', array());

        return parent::getAdPlace();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdPlace($adPlace)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdPlace', array($adPlace));

        return parent::setAdPlace($adPlace);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlacementBannersList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlacementBannersList', array());

        return parent::getPlacementBannersList();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlacementBannersList($placementBannersList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlacementBannersList', array($placementBannersList));

        return parent::setPlacementBannersList($placementBannersList);
    }

    /**
     * {@inheritDoc}
     */
    public function addPlacementBannersList($placementBanner)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlacementBannersList', array($placementBanner));

        return parent::addPlacementBannersList($placementBanner);
    }

    /**
     * {@inheritDoc}
     */
    public function removePlacementBannersList($placementBanner)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePlacementBannersList', array($placementBanner));

        return parent::removePlacementBannersList($placementBanner);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartDateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartDateTime', array());

        return parent::getStartDateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartDateTime($startDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartDateTime', array($startDateTime));

        return parent::setStartDateTime($startDateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getFinishDateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFinishDateTime', array());

        return parent::getFinishDateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setFinishDateTime($finishDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFinishDateTime', array($finishDateTime));

        return parent::setFinishDateTime($finishDateTime);
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
    public function setCreatedDateTime($createdDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDateTime', array($createdDateTime));

        return parent::setCreatedDateTime($createdDateTime);
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
    public function getDefaultCountries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefaultCountries', array());

        return parent::getDefaultCountries();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultCountries($defaultCountries)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefaultCountries', array($defaultCountries));

        return parent::setDefaultCountries($defaultCountries);
    }

    /**
     * {@inheritDoc}
     */
    public function addDefaultCountries($defaultCountry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDefaultCountries', array($defaultCountry));

        return parent::addDefaultCountries($defaultCountry);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDefaultCountries($defaultCountry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDefaultCountries', array($defaultCountry));

        return parent::removeDefaultCountries($defaultCountry);
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