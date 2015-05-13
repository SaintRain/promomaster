<?php

namespace Proxies\__CG__\Core\CategoryBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ProductCategory extends \Core\CategoryBundle\Entity\ProductCategory implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'parent', 'childrens', 'properties', 'slug', 'products', 'settingsCategoryProperty', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterNetWeight', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterNetWeightInGm', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterGrossWeight', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterGrossWeightInGm', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterLengthOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterWidthOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterHeightOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterLengthOfBox', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterWidthOfBox', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterHeightOfBox', 'id', 'lft', 'lvl', 'rgt', 'root', 'indexPosition', 'createdDateTime', 'isEnabled', 'name', 'captionRu', 'captionEn', 'descriptionRu', 'descriptionEn', 'titleRu', 'titleEn', 'metakeywordsRu', 'metakeywordsEn', 'metadescriptionRu', 'metadescriptionEn');
        }

        return array('__isInitialized__', 'parent', 'childrens', 'properties', 'slug', 'products', 'settingsCategoryProperty', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterNetWeight', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterNetWeightInGm', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterGrossWeight', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterGrossWeightInGm', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterLengthOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterWidthOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterHeightOfProduct', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterLengthOfBox', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterWidthOfBox', '' . "\0" . 'Core\\CategoryBundle\\Entity\\ProductCategory' . "\0" . 'isInFilterHeightOfBox', 'id', 'lft', 'lvl', 'rgt', 'root', 'indexPosition', 'createdDateTime', 'isEnabled', 'name', 'captionRu', 'captionEn', 'descriptionRu', 'descriptionEn', 'titleRu', 'titleEn', 'metakeywordsRu', 'metakeywordsEn', 'metadescriptionRu', 'metadescriptionEn');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ProductCategory $proxy) {
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
    public function getParent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParent', array());

        return parent::getParent();
    }

    /**
     * {@inheritDoc}
     */
    public function setParent($parent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParent', array($parent));

        return parent::setParent($parent);
    }

    /**
     * {@inheritDoc}
     */
    public function getChildrens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChildrens', array());

        return parent::getChildrens();
    }

    /**
     * {@inheritDoc}
     */
    public function setChildrens(\Doctrine\Common\Collections\ArrayCollection $childrens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChildrens', array($childrens));

        return parent::setChildrens($childrens);
    }

    /**
     * {@inheritDoc}
     */
    public function getProperties()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProperties', array());

        return parent::getProperties();
    }

    /**
     * {@inheritDoc}
     */
    public function setProperties(\Doctrine\Common\Collections\ArrayCollection $properties)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProperties', array($properties));

        return parent::setProperties($properties);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlug', array());

        return parent::getSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlug', array($slug));

        return parent::setSlug($slug);
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
    public function getSettingsCategoryProperty()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSettingsCategoryProperty', array());

        return parent::getSettingsCategoryProperty();
    }

    /**
     * {@inheritDoc}
     */
    public function setSettingsCategoryProperty(\Doctrine\Common\Collections\ArrayCollection $settingsCategoryProperty)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSettingsCategoryProperty', array($settingsCategoryProperty));

        return parent::setSettingsCategoryProperty($settingsCategoryProperty);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterNetWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterNetWeight', array());

        return parent::getIsInFilterNetWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterNetWeight($isInFilterNetWeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterNetWeight', array($isInFilterNetWeight));

        return parent::setIsInFilterNetWeight($isInFilterNetWeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterNetWeightInGm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterNetWeightInGm', array());

        return parent::getIsInFilterNetWeightInGm();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterNetWeightInGm($isInFilterNetWeightInGm)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterNetWeightInGm', array($isInFilterNetWeightInGm));

        return parent::setIsInFilterNetWeightInGm($isInFilterNetWeightInGm);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterGrossWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterGrossWeight', array());

        return parent::getIsInFilterGrossWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterGrossWeight($isInFilterGrossWeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterGrossWeight', array($isInFilterGrossWeight));

        return parent::setIsInFilterGrossWeight($isInFilterGrossWeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterGrossWeightInGm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterGrossWeightInGm', array());

        return parent::getIsInFilterGrossWeightInGm();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterGrossWeightInGm($isInFilterGrossWeightInGm)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterGrossWeightInGm', array($isInFilterGrossWeightInGm));

        return parent::setIsInFilterGrossWeightInGm($isInFilterGrossWeightInGm);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterLengthOfProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterLengthOfProduct', array());

        return parent::getIsInFilterLengthOfProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterLengthOfProduct($isInFilterLengthOfProduct)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterLengthOfProduct', array($isInFilterLengthOfProduct));

        return parent::setIsInFilterLengthOfProduct($isInFilterLengthOfProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterWidthOfProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterWidthOfProduct', array());

        return parent::getIsInFilterWidthOfProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterWidthOfProduct($isInFilterWidthOfProduct)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterWidthOfProduct', array($isInFilterWidthOfProduct));

        return parent::setIsInFilterWidthOfProduct($isInFilterWidthOfProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterHeightOfProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterHeightOfProduct', array());

        return parent::getIsInFilterHeightOfProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterHeightOfProduct($isInFilterHeightOfProduct)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterHeightOfProduct', array($isInFilterHeightOfProduct));

        return parent::setIsInFilterHeightOfProduct($isInFilterHeightOfProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterLengthOfBox()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterLengthOfBox', array());

        return parent::getIsInFilterLengthOfBox();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterLengthOfBox($isInFilterLengthOfBox)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterLengthOfBox', array($isInFilterLengthOfBox));

        return parent::setIsInFilterLengthOfBox($isInFilterLengthOfBox);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterWidthOfBox()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterWidthOfBox', array());

        return parent::getIsInFilterWidthOfBox();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterWidthOfBox($isInFilterWidthOfBox)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterWidthOfBox', array($isInFilterWidthOfBox));

        return parent::setIsInFilterWidthOfBox($isInFilterWidthOfBox);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsInFilterHeightOfBox()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsInFilterHeightOfBox', array());

        return parent::getIsInFilterHeightOfBox();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsInFilterHeightOfBox($isInFilterHeightOfBox)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsInFilterHeightOfBox', array($isInFilterHeightOfBox));

        return parent::setIsInFilterHeightOfBox($isInFilterHeightOfBox);
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
    public function getLft()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLft', array());

        return parent::getLft();
    }

    /**
     * {@inheritDoc}
     */
    public function setLft($lft)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLft', array($lft));

        return parent::setLft($lft);
    }

    /**
     * {@inheritDoc}
     */
    public function getLvl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLvl', array());

        return parent::getLvl();
    }

    /**
     * {@inheritDoc}
     */
    public function setLvl($lvl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLvl', array($lvl));

        return parent::setLvl($lvl);
    }

    /**
     * {@inheritDoc}
     */
    public function getRgt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRgt', array());

        return parent::getRgt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRgt($rgt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRgt', array($rgt));

        return parent::setRgt($rgt);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoot()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoot', array());

        return parent::getRoot();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoot($root)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoot', array($root));

        return parent::setRoot($root);
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
    public function getIndentedCaption()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIndentedCaption', array());

        return parent::getIndentedCaption();
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
    public function isValid(\Symfony\Component\Validator\ExecutionContextInterface $context)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isValid', array($context));

        return parent::isValid($context);
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

    /**
     * {@inheritDoc}
     */
    public function getTitleRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitleRu', array());

        return parent::getTitleRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getTitleEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitleEn', array());

        return parent::getTitleEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitleRu($titleRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitleRu', array($titleRu));

        return parent::setTitleRu($titleRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setTitleEn($titleEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitleEn', array($titleEn));

        return parent::setTitleEn($titleEn);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetakeywordsRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetakeywordsRu', array());

        return parent::getMetakeywordsRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetakeywordsEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetakeywordsEn', array());

        return parent::getMetakeywordsEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetakeywordsRu($metakeywordsRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetakeywordsRu', array($metakeywordsRu));

        return parent::setMetakeywordsRu($metakeywordsRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setMetakeywordsEn($metakeywordsEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetakeywordsEn', array($metakeywordsEn));

        return parent::setMetakeywordsEn($metakeywordsEn);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadescriptionRu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetadescriptionRu', array());

        return parent::getMetadescriptionRu();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadescriptionEn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetadescriptionEn', array());

        return parent::getMetadescriptionEn();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetadescriptionRu($metadescriptionRu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetadescriptionRu', array($metadescriptionRu));

        return parent::setMetadescriptionRu($metadescriptionRu);
    }

    /**
     * {@inheritDoc}
     */
    public function setMetadescriptionEn($metadescriptionEn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetadescriptionEn', array($metadescriptionEn));

        return parent::setMetadescriptionEn($metadescriptionEn);
    }

}
