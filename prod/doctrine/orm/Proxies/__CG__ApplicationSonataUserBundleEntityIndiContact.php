<?php

namespace Proxies\__CG__\Application\Sonata\UserBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class IndiContact extends \Application\Sonata\UserBundle\Entity\IndiContact implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'contragent', 'contactEmail', 'phone', 'firstName', 'lastName', 'surName', 'passport', 'id', 'address', 'city', 'mark', 'postIndex');
        }

        return array('__isInitialized__', 'contragent', 'contactEmail', 'phone', 'firstName', 'lastName', 'surName', 'passport', 'id', 'address', 'city', 'mark', 'postIndex');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (IndiContact $proxy) {
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
    public function getContragent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContragent', array());

        return parent::getContragent();
    }

    /**
     * {@inheritDoc}
     */
    public function setContragent(\Application\Sonata\UserBundle\Entity\IndiContragent $contragent = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContragent', array($contragent));

        return parent::setContragent($contragent);
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
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', array());

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', array($firstName));

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', array());

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', array($lastName));

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSurName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSurName', array());

        return parent::getSurName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSurName($surName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSurName', array($surName));

        return parent::setSurName($surName);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactEmail', array());

        return parent::getContactEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactEmail($contactEmail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactEmail', array($contactEmail));

        return parent::setContactEmail($contactEmail);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function setPassport($passport)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassport', array($passport));

        return parent::setPassport($passport);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassport()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassport', array());

        return parent::getPassport();
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'jsonSerialize', array());

        return parent::jsonSerialize();
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
    public function getCaptionForSelect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaptionForSelect', array());

        return parent::getCaptionForSelect();
    }

    /**
     * {@inheritDoc}
     */
    public function getFio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFio', array());

        return parent::getFio();
    }

    /**
     * {@inheritDoc}
     */
    public function isValid(\Symfony\Component\Validator\ExecutionContextInterface $context)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isValid', array($context));

        return parent::isValid($context);
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress($address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', array($address));

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', array());

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity($city)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostIndex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostIndex', array());

        return parent::getPostIndex();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostIndex($postIndex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostIndex', array($postIndex));

        return parent::setPostIndex($postIndex);
    }

    /**
     * {@inheritDoc}
     */
    public function getMark()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMark', array());

        return parent::getMark();
    }

    /**
     * {@inheritDoc}
     */
    public function setMark($mark)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMark', array($mark));

        return parent::setMark($mark);
    }

    /**
     * {@inheritDoc}
     */
    public function getContact()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContact', array());

        return parent::getContact();
    }

}