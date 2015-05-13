<?php

namespace Proxies\__CG__\Core\TroubleTicketBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TroubleTicket extends \Core\TroubleTicketBundle\Entity\TroubleTicket implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'id', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'title', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'createdDateTime', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'updatedDateTime', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'authorEmail', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'authorName', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'body', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'readiness', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'status', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'priority', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'watchers', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'user', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'manager', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'category', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'messages', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'logs', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'hash', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'owner', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'file', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'adminAnswers', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'isAdminAnswer', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'order', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'product', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'updatedDateTimeByManager');
        }

        return array('__isInitialized__', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'id', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'title', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'createdDateTime', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'updatedDateTime', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'authorEmail', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'authorName', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'body', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'readiness', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'status', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'priority', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'watchers', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'user', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'manager', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'category', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'messages', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'logs', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'hash', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'owner', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'file', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'adminAnswers', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'isAdminAnswer', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'order', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'product', '' . "\0" . 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' . "\0" . 'updatedDateTimeByManager');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TroubleTicket $proxy) {
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
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
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
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDateTime(\DateTime $createdDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDateTime', array($createdDateTime));

        return parent::setCreatedDateTime($createdDateTime);
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
    public function setUpdatedDateTime(\DateTime $updatedDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedDateTime', array($updatedDateTime));

        return parent::setUpdatedDateTime($updatedDateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedDateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedDateTime', array());

        return parent::getUpdatedDateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthorEmail($authorEmail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAuthorEmail', array($authorEmail));

        return parent::setAuthorEmail($authorEmail);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorEmail', array());

        return parent::getAuthorEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthorName($authorName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAuthorName', array($authorName));

        return parent::setAuthorName($authorName);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorName', array());

        return parent::getAuthorName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthor', array());

        return parent::getAuthor();
    }

    /**
     * {@inheritDoc}
     */
    public function setBody($body)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBody', array($body));

        return parent::setBody($body);
    }

    /**
     * {@inheritDoc}
     */
    public function getBody()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBody', array());

        return parent::getBody();
    }

    /**
     * {@inheritDoc}
     */
    public function setReadiness($readiness)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReadiness', array($readiness));

        return parent::setReadiness($readiness);
    }

    /**
     * {@inheritDoc}
     */
    public function getReadiness()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReadiness', array());

        return parent::getReadiness();
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
    public function setStatus(\Core\TroubleTicketBundle\Entity\Status $status = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriority', array());

        return parent::getPriority();
    }

    /**
     * {@inheritDoc}
     */
    public function setPriority(\Core\TroubleTicketBundle\Entity\Priority $priority = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriority', array($priority));

        return parent::setPriority($priority);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategory', array());

        return parent::getCategory();
    }

    /**
     * {@inheritDoc}
     */
    public function setCategory(\Core\CategoryBundle\Entity\TroubleTicketCategory $category = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategory', array($category));

        return parent::setCategory($category);
    }

    /**
     * {@inheritDoc}
     */
    public function getManager()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManager', array());

        return parent::getManager();
    }

    /**
     * {@inheritDoc}
     */
    public function setManager(\Application\Sonata\UserBundle\Entity\User $manager = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setManager', array($manager));

        return parent::setManager($manager);
    }

    /**
     * {@inheritDoc}
     */
    public function addMessage(\Core\TroubleTicketBundle\Entity\Message $message)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMessage', array($message));

        return parent::addMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessages', array());

        return parent::getMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function getSomething()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSomething', array());

        return parent::getSomething();
    }

    /**
     * {@inheritDoc}
     */
    public function removeMessage($message)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMessage', array($message));

        return parent::removeMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function addLog(\Core\TroubleTicketBundle\Entity\Log $log)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLog', array($log));

        return parent::addLog($log);
    }

    /**
     * {@inheritDoc}
     */
    public function getLogs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLogs', array());

        return parent::getLogs();
    }

    /**
     * {@inheritDoc}
     */
    public function removeLog(\Core\TroubleTicketBundle\Entity\Log $log)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLog', array($log));

        return parent::removeLog($log);
    }

    /**
     * {@inheritDoc}
     */
    public function getHash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHash', array());

        return parent::getHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setHash($hash = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHash', array($hash));

        return parent::setHash($hash);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsAdminAnswer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsAdminAnswer', array());

        return parent::getIsAdminAnswer();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsAdminAnswer($isAdminAnswer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsAdminAnswer', array($isAdminAnswer));

        return parent::setIsAdminAnswer($isAdminAnswer);
    }

    /**
     * {@inheritDoc}
     */
    public function addWatcher(\Application\Sonata\UserBundle\Entity\User $watcher)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addWatcher', array($watcher));

        return parent::addWatcher($watcher);
    }

    /**
     * {@inheritDoc}
     */
    public function getWatchers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWatchers', array());

        return parent::getWatchers();
    }

    /**
     * {@inheritDoc}
     */
    public function removeWatcher(\Application\Sonata\UserBundle\Entity\User $watcher)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeWatcher', array($watcher));

        return parent::removeWatcher($watcher);
    }

    /**
     * {@inheritDoc}
     */
    public function getFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFile', array());

        return parent::getFile();
    }

    /**
     * {@inheritDoc}
     */
    public function setFile($file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFile', array($file));

        return parent::setFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function addFile($file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFile', array($file));

        return parent::addFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFile($file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFile', array($file));

        return parent::removeFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function getValueForKey($key)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValueForKey', array($key));

        return parent::getValueForKey($key);
    }

    /**
     * {@inheritDoc}
     */
    public function getOwner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOwner', array());

        return parent::getOwner();
    }

    /**
     * {@inheritDoc}
     */
    public function setOwner($owner)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOwner', array($owner));

        return parent::setOwner($owner);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdminAnswers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdminAnswers', array());

        return parent::getAdminAnswers();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdminAnswers($adminAnswers = 0)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdminAnswers', array($adminAnswers));

        return parent::setAdminAnswers($adminAnswers);
    }

    /**
     * {@inheritDoc}
     */
    public function getFieldsForLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFieldsForLog', array());

        return parent::getFieldsForLog();
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
    public function getProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduct', array());

        return parent::getProduct();
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
    public function getUpdatedDateTimeByManager()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedDateTimeByManager', array());

        return parent::getUpdatedDateTimeByManager();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedDateTimeByManager(\DateTime $updatedDateTimeByManager)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedDateTimeByManager', array($updatedDateTimeByManager));

        return parent::setUpdatedDateTimeByManager($updatedDateTimeByManager);
    }

}
