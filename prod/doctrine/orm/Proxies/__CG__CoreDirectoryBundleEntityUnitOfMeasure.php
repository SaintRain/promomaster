<?php

namespace Proxies\__CG__\Core\DirectoryBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UnitOfMeasure extends \Core\DirectoryBundle\Entity\UnitOfMeasure implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'id', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'code', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'createdAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'updatedAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'indexPosition', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'isEnabled', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'group', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'okeiCode', 'captionRu', 'captionEn', 'shortCaptionRu', 'shortCaptionEn');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'id', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'code', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'createdAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'updatedAt', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'indexPosition', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'isEnabled', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'group', '' . "\0" . 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' . "\0" . 'okeiCode', 'captionRu', 'captionEn', 'shortCaptionRu', 'shortCaptionEn');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UnitOfMeasure $proxy) {
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
    public function getCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCode', array());

        return parent::getCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setCode($code)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCode', array($code));

        return parent::setCode($code);
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
    public function getGroup()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGroup', array());

        return parent::getGroup();
    }

    /**
     * {@inheritDoc}
     */
    public function setGroup($group)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGroup', array($group));

        return parent::setGroup($group);
    }

    /**
     * {@inheritDoc}
     */
    public function getOkeiCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOkeiCode', array());

        return parent::getOkeiCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setOkeiCode($okeiCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOkeiCode', array($okeiCode));

        return parent::setOkeiCode($okeiCode);
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
    public function getShortCaptionRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShortCaptionRu', array());

        return parent::getShortCaptionRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getShortCaptionEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShortCaptionEn', array());

        return parent::getShortCaptionEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setShortCaptionRu($shortCaptionRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShortCaptionRu', array($shortCaptionRu));

        return parent::setShortCaptionRu($shortCaptionRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setShortCaptionEn($shortCaptionEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShortCaptionEn', array($shortCaptionEn));

        return parent::setShortCaptionEn($shortCaptionEn);
    }

}