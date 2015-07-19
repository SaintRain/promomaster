<?php

namespace Proxies\__CG__\Core\PaymentBundle\Entity\PaymentSystem;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CommonPaymentSystem extends \Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'id', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'system', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'indexPosition', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'requestURL', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'requestURLtest', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isTest', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isEnabled', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'commission', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCollectCommission', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCustomerIndividual', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCustomerCorporate', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'payments', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isInFooter', 'captionRu', 'captionEn', 'descriptionRu', 'descriptionEn');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'id', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'system', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'indexPosition', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'requestURL', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'requestURLtest', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isTest', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isEnabled', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'commission', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCollectCommission', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCustomerIndividual', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isCustomerCorporate', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'payments', '' . "\0" . 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' . "\0" . 'isInFooter', 'captionRu', 'captionEn', 'descriptionRu', 'descriptionEn');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CommonPaymentSystem $proxy) {
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
    public function getSystem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSystem', array());

        return parent::getSystem();
    }

    /**
     * {@inheritDoc}
     */
    public function setSystem($system)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSystem', array($system));

        return parent::setSystem($system);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestURL()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequestURL', array());

        return parent::getRequestURL();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequestURL($requestURL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequestURL', array($requestURL));

        return parent::setRequestURL($requestURL);
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
    public function getCommission()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommission', array());

        return parent::getCommission();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommission($commission)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommission', array($commission));

        return parent::setCommission($commission);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsCollectCommission()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsCollectCommission', array());

        return parent::getIsCollectCommission();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsCollectCommission($isCollectCommission)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsCollectCommission', array($isCollectCommission));

        return parent::setIsCollectCommission($isCollectCommission);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsCustomerIndividual()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsCustomerIndividual', array());

        return parent::getIsCustomerIndividual();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsCustomerIndividual($isCustomerIndividual)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsCustomerIndividual', array($isCustomerIndividual));

        return parent::setIsCustomerIndividual($isCustomerIndividual);
    }

    /**
     * {@inheritDoc}
     */
    public function getisCustomerCorporate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getisCustomerCorporate', array());

        return parent::getisCustomerCorporate();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsCustomerCorporate($isCustomerCorporate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsCustomerCorporate', array($isCustomerCorporate));

        return parent::setIsCustomerCorporate($isCustomerCorporate);
    }

    /**
     * {@inheritDoc}
     */
    public function getPayments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPayments', array());

        return parent::getPayments();
    }

    /**
     * {@inheritDoc}
     */
    public function setPayments($payments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPayments', array($payments));

        return parent::setPayments($payments);
    }

    /**
     * {@inheritDoc}
     */
    public function addPayment($payment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPayment', array($payment));

        return parent::addPayment($payment);
    }

    /**
     * {@inheritDoc}
     */
    public function removePayment($payment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePayment', array($payment));

        return parent::removePayment($payment);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestURLtest()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequestURLtest', array());

        return parent::getRequestURLtest();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequestURLtest($requestURLtest)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequestURLtest', array($requestURLtest));

        return parent::setRequestURLtest($requestURLtest);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsTest()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsTest', array());

        return parent::getIsTest();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsTest($isTest)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsTest', array($isTest));

        return parent::setIsTest($isTest);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFooter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFooter', array());

        return parent::getIsInFooter();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFooter($isInFooter)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFooter', array($isInFooter));

        return parent::setIsInFooter($isInFooter);
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

    /**
     * {@inheritDoc}
     */
    public function getDescriptionRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescriptionRu', array());

        return parent::getDescriptionRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getDescriptionEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescriptionEn', array());

        return parent::getDescriptionEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescriptionRu($descriptionRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescriptionRu', array($descriptionRu));

        return parent::setDescriptionRu($descriptionRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setDescriptionEn($descriptionEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescriptionEn', array($descriptionEn));

        return parent::setDescriptionEn($descriptionEn);
    }

}
