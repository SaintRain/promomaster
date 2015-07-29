<?php

namespace Proxies\__CG__\Core\StatisticsBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class XhprofDetail extends \Core\StatisticsBundle\Entity\XhprofDetail implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', 'url', 'canonicalUrl', 'serverName', 'type', 'perfData', 'cookie', 'post', 'get', 'pmu', 'wt', 'cpu', 'serverId', 'aggregateCallsInclude', 'timestamp');
        }

        return array('__isInitialized__', 'id', 'url', 'canonicalUrl', 'serverName', 'type', 'perfData', 'cookie', 'post', 'get', 'pmu', 'wt', 'cpu', 'serverId', 'aggregateCallsInclude', 'timestamp');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (XhprofDetail $proxy) {
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
    public function getUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrl', array());

        return parent::getUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl($url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrl', array($url));

        return parent::setUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getCanonicalUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCanonicalUrl', array());

        return parent::getCanonicalUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setCanonicalUrl($canonicalUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCanonicalUrl', array($canonicalUrl));

        return parent::setCanonicalUrl($canonicalUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getServerName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServerName', array());

        return parent::getServerName();
    }

    /**
     * {@inheritDoc}
     */
    public function setServerName($serverName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServerName', array($serverName));

        return parent::setServerName($serverName);
    }

    /**
     * {@inheritDoc}
     */
    public function getPerfData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPerfData', array());

        return parent::getPerfData();
    }

    /**
     * {@inheritDoc}
     */
    public function setPerfData($perfData)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPerfData', array($perfData));

        return parent::setPerfData($perfData);
    }

    /**
     * {@inheritDoc}
     */
    public function getCookie()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCookie', array());

        return parent::getCookie();
    }

    /**
     * {@inheritDoc}
     */
    public function setCookie($cookie)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCookie', array($cookie));

        return parent::setCookie($cookie);
    }

    /**
     * {@inheritDoc}
     */
    public function getPost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPost', array());

        return parent::getPost();
    }

    /**
     * {@inheritDoc}
     */
    public function setPost($post)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPost', array($post));

        return parent::setPost($post);
    }

    /**
     * {@inheritDoc}
     */
    public function getGet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGet', array());

        return parent::getGet();
    }

    /**
     * {@inheritDoc}
     */
    public function setGet($get)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGet', array($get));

        return parent::setGet($get);
    }

    /**
     * {@inheritDoc}
     */
    public function getPmu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPmu', array());

        return parent::getPmu();
    }

    /**
     * {@inheritDoc}
     */
    public function setPmu($pmu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPmu', array($pmu));

        return parent::setPmu($pmu);
    }

    /**
     * {@inheritDoc}
     */
    public function getWt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWt', array());

        return parent::getWt();
    }

    /**
     * {@inheritDoc}
     */
    public function setWt($wt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWt', array($wt));

        return parent::setWt($wt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpu', array());

        return parent::getCpu();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpu($cpu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpu', array($cpu));

        return parent::setCpu($cpu);
    }

    /**
     * {@inheritDoc}
     */
    public function getServerId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServerId', array());

        return parent::getServerId();
    }

    /**
     * {@inheritDoc}
     */
    public function setServerId($serverId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServerId', array($serverId));

        return parent::setServerId($serverId);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', array());

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', array($type));

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getTimestamp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTimestamp', array());

        return parent::getTimestamp();
    }

    /**
     * {@inheritDoc}
     */
    public function setTimestamp($timestamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTimestamp', array($timestamp));

        return parent::setTimestamp($timestamp);
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
    public function beforePersist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'beforePersist', array());

        return parent::beforePersist();
    }

    /**
     * {@inheritDoc}
     */
    public function getAggregateCallsInclude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAggregateCallsInclude', array());

        return parent::getAggregateCallsInclude();
    }

    /**
     * {@inheritDoc}
     */
    public function setAggregateCallsInclude($aggregateCallsInclude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAggregateCallsInclude', array($aggregateCallsInclude));

        return parent::setAggregateCallsInclude($aggregateCallsInclude);
    }

}