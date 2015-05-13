<?php

namespace Proxies\__CG__\Core\LogisticsBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Seller extends \Core\LogisticsBundle\Entity\Seller implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'legalForm', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'caption', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'inn', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'kpp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'ogrn', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'okpo', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'positionOfTheHead', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheHead', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheHeadInGenitive', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'headActsUnder', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheAccountant', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheAccountantInGenitive', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'country', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'city', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'addressUr', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'addressPost', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dontPublicAddressUr', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'phone', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'fax', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'bank', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'paymentAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'corrAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isWorkingWithNds', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'regionsCityList', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'paymentSystems', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dpdAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dpdPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'cdekAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'cdekPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dellineLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dellinePassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'pekLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'pekPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'postRuLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'postRuPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'emsContractNumber', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'idIn1c', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isShowInContactForm', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isDefault', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSign', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageStamp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSignAndStamp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSignOfAccountant', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'waybills', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'code');
        }

        return array('__isInitialized__', 'id', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'legalForm', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'caption', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'inn', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'kpp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'ogrn', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'okpo', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'positionOfTheHead', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheHead', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheHeadInGenitive', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'headActsUnder', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheAccountant', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'nameOfTheAccountantInGenitive', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'country', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'city', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'addressUr', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'addressPost', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dontPublicAddressUr', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'phone', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'fax', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'bank', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'paymentAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'corrAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isWorkingWithNds', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'regionsCityList', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'paymentSystems', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dpdAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dpdPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'cdekAccount', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'cdekPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dellineLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'dellinePassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'pekLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'pekPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'postRuLogin', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'postRuPassword', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'emsContractNumber', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'idIn1c', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isShowInContactForm', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'isDefault', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSign', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageStamp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSignAndStamp', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'imageSignOfAccountant', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'waybills', '' . "\0" . 'Core\\LogisticsBundle\\Entity\\Seller' . "\0" . 'code');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Seller $proxy) {
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
    public function getLegalForm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLegalForm', array());

        return parent::getLegalForm();
    }

    /**
     * {@inheritDoc}
     */
    public function setLegalForm($legalForm)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLegalForm', array($legalForm));

        return parent::setLegalForm($legalForm);
    }

    /**
     * {@inheritDoc}
     */
    public function getCaption()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCaption', array());

        return parent::getCaption();
    }

    /**
     * {@inheritDoc}
     */
    public function setCaption($caption)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCaption', array($caption));

        return parent::setCaption($caption);
    }

    /**
     * {@inheritDoc}
     */
    public function getInn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInn', array());

        return parent::getInn();
    }

    /**
     * {@inheritDoc}
     */
    public function setInn($inn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInn', array($inn));

        return parent::setInn($inn);
    }

    /**
     * {@inheritDoc}
     */
    public function getKpp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKpp', array());

        return parent::getKpp();
    }

    /**
     * {@inheritDoc}
     */
    public function setKpp($kpp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKpp', array($kpp));

        return parent::setKpp($kpp);
    }

    /**
     * {@inheritDoc}
     */
    public function getOgrn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOgrn', array());

        return parent::getOgrn();
    }

    /**
     * {@inheritDoc}
     */
    public function setOgrn($ogrn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOgrn', array($ogrn));

        return parent::setOgrn($ogrn);
    }

    /**
     * {@inheritDoc}
     */
    public function getOkpo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOkpo', array());

        return parent::getOkpo();
    }

    /**
     * {@inheritDoc}
     */
    public function setOkpo($okpo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOkpo', array($okpo));

        return parent::setOkpo($okpo);
    }

    /**
     * {@inheritDoc}
     */
    public function getPositionOfTheHead()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPositionOfTheHead', array());

        return parent::getPositionOfTheHead();
    }

    /**
     * {@inheritDoc}
     */
    public function setPositionOfTheHead($positionOfTheHead)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPositionOfTheHead', array($positionOfTheHead));

        return parent::setPositionOfTheHead($positionOfTheHead);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameOfTheHead()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNameOfTheHead', array());

        return parent::getNameOfTheHead();
    }

    /**
     * {@inheritDoc}
     */
    public function setNameOfTheHead($nameOfTheHead)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNameOfTheHead', array($nameOfTheHead));

        return parent::setNameOfTheHead($nameOfTheHead);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameOfTheHeadInGenitive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNameOfTheHeadInGenitive', array());

        return parent::getNameOfTheHeadInGenitive();
    }

    /**
     * {@inheritDoc}
     */
    public function setNameOfTheHeadInGenitive($nameOfTheHeadInGenitive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNameOfTheHeadInGenitive', array($nameOfTheHeadInGenitive));

        return parent::setNameOfTheHeadInGenitive($nameOfTheHeadInGenitive);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadActsUnder()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadActsUnder', array());

        return parent::getHeadActsUnder();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadActsUnder($headActsUnder)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadActsUnder', array($headActsUnder));

        return parent::setHeadActsUnder($headActsUnder);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameOfTheAccountant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNameOfTheAccountant', array());

        return parent::getNameOfTheAccountant();
    }

    /**
     * {@inheritDoc}
     */
    public function setNameOfTheAccountant($nameOfTheAccountant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNameOfTheAccountant', array($nameOfTheAccountant));

        return parent::setNameOfTheAccountant($nameOfTheAccountant);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameOfTheAccountantInGenitive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNameOfTheAccountantInGenitive', array());

        return parent::getNameOfTheAccountantInGenitive();
    }

    /**
     * {@inheritDoc}
     */
    public function setNameOfTheAccountantInGenitive($nameOfTheAccountantInGenitive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNameOfTheAccountantInGenitive', array($nameOfTheAccountantInGenitive));

        return parent::setNameOfTheAccountantInGenitive($nameOfTheAccountantInGenitive);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', array());

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry($country)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', array($country));

        return parent::setCountry($country);
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
    public function setCity($city)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressUr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressUr', array());

        return parent::getAddressUr();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressUr($addressUr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressUr', array($addressUr));

        return parent::setAddressUr($addressUr);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressPost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressPost', array());

        return parent::getAddressPost();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressPost($addressPost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressPost', array($addressPost));

        return parent::setAddressPost($addressPost);
    }

    /**
     * {@inheritDoc}
     */
    public function getDontPublicAddressUr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDontPublicAddressUr', array());

        return parent::getDontPublicAddressUr();
    }

    /**
     * {@inheritDoc}
     */
    public function setDontPublicAddressUr($dontPublicAddressUr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDontPublicAddressUr', array($dontPublicAddressUr));

        return parent::setDontPublicAddressUr($dontPublicAddressUr);
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
    public function getFax()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFax', array());

        return parent::getFax();
    }

    /**
     * {@inheritDoc}
     */
    public function setFax($fax)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFax', array($fax));

        return parent::setFax($fax);
    }

    /**
     * {@inheritDoc}
     */
    public function getBank()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBank', array());

        return parent::getBank();
    }

    /**
     * {@inheritDoc}
     */
    public function setBank($bank)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBank', array($bank));

        return parent::setBank($bank);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaymentAccount', array());

        return parent::getPaymentAccount();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaymentAccount($paymentAccount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaymentAccount', array($paymentAccount));

        return parent::setPaymentAccount($paymentAccount);
    }

    /**
     * {@inheritDoc}
     */
    public function getCorrAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCorrAccount', array());

        return parent::getCorrAccount();
    }

    /**
     * {@inheritDoc}
     */
    public function setCorrAccount($corrAccount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCorrAccount', array($corrAccount));

        return parent::setCorrAccount($corrAccount);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsWorkingWithNds()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsWorkingWithNds', array());

        return parent::getIsWorkingWithNds();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsWorkingWithNds($isWorkingWithNds)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsWorkingWithNds', array($isWorkingWithNds));

        return parent::setIsWorkingWithNds($isWorkingWithNds);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionsCityList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegionsCityList', array());

        return parent::getRegionsCityList();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegionsCityList($regionsCityList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegionsCityList', array($regionsCityList));

        return parent::setRegionsCityList($regionsCityList);
    }

    /**
     * {@inheritDoc}
     */
    public function addRegionsCityList($regionsCityList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRegionsCityList', array($regionsCityList));

        return parent::addRegionsCityList($regionsCityList);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRegionsCityList($regionsCityList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRegionsCityList', array($regionsCityList));

        return parent::removeRegionsCityList($regionsCityList);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentSystems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaymentSystems', array());

        return parent::getPaymentSystems();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaymentSystems($paymentSystems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaymentSystems', array($paymentSystems));

        return parent::setPaymentSystems($paymentSystems);
    }

    /**
     * {@inheritDoc}
     */
    public function getDpdAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDpdAccount', array());

        return parent::getDpdAccount();
    }

    /**
     * {@inheritDoc}
     */
    public function setDpdAccount($dpdAccount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDpdAccount', array($dpdAccount));

        return parent::setDpdAccount($dpdAccount);
    }

    /**
     * {@inheritDoc}
     */
    public function getDpdPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDpdPassword', array());

        return parent::getDpdPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setDpdPassword($dpdPassword)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDpdPassword', array($dpdPassword));

        return parent::setDpdPassword($dpdPassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getCdekAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCdekAccount', array());

        return parent::getCdekAccount();
    }

    /**
     * {@inheritDoc}
     */
    public function setCdekAccount($cdekAccount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCdekAccount', array($cdekAccount));

        return parent::setCdekAccount($cdekAccount);
    }

    /**
     * {@inheritDoc}
     */
    public function getCdekPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCdekPassword', array());

        return parent::getCdekPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setCdekPassword($cdekPassword)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCdekPassword', array($cdekPassword));

        return parent::setCdekPassword($cdekPassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getDellineLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDellineLogin', array());

        return parent::getDellineLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setDellineLogin($dellineLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDellineLogin', array($dellineLogin));

        return parent::setDellineLogin($dellineLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function getDellinePassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDellinePassword', array());

        return parent::getDellinePassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setDellinePassword($dellinePassword)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDellinePassword', array($dellinePassword));

        return parent::setDellinePassword($dellinePassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getPekLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPekLogin', array());

        return parent::getPekLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setPekLogin($pekLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPekLogin', array($pekLogin));

        return parent::setPekLogin($pekLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostRuLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostRuLogin', array());

        return parent::getPostRuLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function getPostRuPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostRuPassword', array());

        return parent::getPostRuPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostRuLogin($postRuLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostRuLogin', array($postRuLogin));

        return parent::setPostRuLogin($postRuLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function setPostRuPassword($postRuPassword)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostRuPassword', array($postRuPassword));

        return parent::setPostRuPassword($postRuPassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getPekPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPekPassword', array());

        return parent::getPekPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPekPassword($pekPassword)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPekPassword', array($pekPassword));

        return parent::setPekPassword($pekPassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmsContractNumber()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmsContractNumber', array());

        return parent::getEmsContractNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmsContractNumber($emsContractNumber)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmsContractNumber', array($emsContractNumber));

        return parent::setEmsContractNumber($emsContractNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdIn1c()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdIn1c', array());

        return parent::getIdIn1c();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdIn1c($idIn1c)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdIn1c', array($idIn1c));

        return parent::setIdIn1c($idIn1c);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsShowInContactForm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsShowInContactForm', array());

        return parent::getIsShowInContactForm();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsShowInContactForm($isShowInContactForm)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsShowInContactForm', array($isShowInContactForm));

        return parent::setIsShowInContactForm($isShowInContactForm);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsDefault()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsDefault', array());

        return parent::getIsDefault();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsDefault($isDefault)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsDefault', array($isDefault));

        return parent::setIsDefault($isDefault);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageSign()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageSign', array());

        return parent::getImageSign();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageSign($imageSign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageSign', array($imageSign));

        return parent::setImageSign($imageSign);
    }

    /**
     * {@inheritDoc}
     */
    public function addImageSign($imageSign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImageSign', array($imageSign));

        return parent::addImageSign($imageSign);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImageSign($imageSign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImageSign', array($imageSign));

        return parent::removeImageSign($imageSign);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageStamp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageStamp', array());

        return parent::getImageStamp();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageStamp($imageStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageStamp', array($imageStamp));

        return parent::setImageStamp($imageStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function addImageStamp($imageStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImageStamp', array($imageStamp));

        return parent::addImageStamp($imageStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImageStamp($imageStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImageStamp', array($imageStamp));

        return parent::removeImageStamp($imageStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageSignAndStamp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageSignAndStamp', array());

        return parent::getImageSignAndStamp();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageSignAndStamp($imageSignAndStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageSignAndStamp', array($imageSignAndStamp));

        return parent::setImageSignAndStamp($imageSignAndStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function addImageSignAndStamp($imageSignAndStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImageSignAndStamp', array($imageSignAndStamp));

        return parent::addImageSignAndStamp($imageSignAndStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImageSignAndStamp($imageSignAndStamp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImageSignAndStamp', array($imageSignAndStamp));

        return parent::removeImageSignAndStamp($imageSignAndStamp);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageSignOfAccountant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageSignOfAccountant', array());

        return parent::getImageSignOfAccountant();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageSignOfAccountant($imageSignOfAccountant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageSignOfAccountant', array($imageSignOfAccountant));

        return parent::setImageSignOfAccountant($imageSignOfAccountant);
    }

    /**
     * {@inheritDoc}
     */
    public function addImageSignOfAccountant($imageSignOfAccountant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImageSignOfAccountant', array($imageSignOfAccountant));

        return parent::addImageSignOfAccountant($imageSignOfAccountant);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImageSignOfAccountant($imageSignOfAccountant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImageSignOfAccountant', array($imageSignOfAccountant));

        return parent::removeImageSignOfAccountant($imageSignOfAccountant);
    }

    /**
     * {@inheritDoc}
     */
    public function getWaybills()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWaybills', array());

        return parent::getWaybills();
    }

    /**
     * {@inheritDoc}
     */
    public function setWaybills($waybills)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWaybills', array($waybills));

        return parent::setWaybills($waybills);
    }

    /**
     * {@inheritDoc}
     */
    public function addWaybill(\Core\OrderBundle\Entity\Waybills $waybill)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addWaybill', array($waybill));

        return parent::addWaybill($waybill);
    }

    /**
     * {@inheritDoc}
     */
    public function removeWaybill($waybill)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeWaybill', array($waybill));

        return parent::removeWaybill($waybill);
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

}
