<?php

namespace spec\Core\Shop\CategoryBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;
use Doctrine\Common\Collections\ArrayCollection;

class ProductCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Shop\CategoryBundle\Entity\ProductCategory');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_is_enable_by_default()
    {
        $this->getIsEnabled()->shouldReturn(true);
    }

     function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_is_mutable()
    {
        $this->setName('Simple Category');
        $this->getName()->shouldReturn('Simple Category');
    }

    function it_has_no_slug_by_default()
    {
        $this->getSlug()->shouldReturn(null);
    }

    function its_slug_is_mutable()
    {
        $this->setSlug('simple-category');
        $this->getSlug()->shouldReturn('simple-category');
    }

    function it_has_no_lft_by_default()
    {
        $this->getLft()->shouldReturn(null);
    }

    function its_slug_lft_mutable()
    {
        $this->setLft(1);
        $this->getLft()->shouldReturn(1);
    }

    function it_has_no_lvl_by_default()
    {
        $this->getLvl()->shouldReturn(null);
    }

    function its_slug_lvl_mutable()
    {
        $this->setLvl(1);
        $this->getLvl()->shouldReturn(1);
    }

    function it_has_no_rgt_by_default()
    {
        $this->getRgt()->shouldReturn(null);
    }

    function its_slug_rgt_mutable()
    {
        $this->setRgt(1);
        $this->getRgt()->shouldReturn(1);
    }

    function its_slug_root_mutable()
    {
        $this->setRgt(1);
        $this->getRgt()->shouldReturn(1);
    }

    function it_has_no_index_position_by_default()
    {
        $this->getIndexPosition()->shouldReturn(null);
    }

    function its_slug_index_position_mutable()
    {
        $this->setIndexPosition(1);
        $this->getIndexPosition()->shouldReturn(1);
    }

    function it_has_no_metadescription_by_default()
    {
        $this->getMetadescription()->shouldReturn(null);
    }

    function its_metadescription_is_mutable()
    {
        $this->setMetadescription('This category is super cool because...');
        $this->getMetadescription()->shouldReturn('This category is super cool because...');
    }

    function it_has_no_description_by_default()
    {
        $this->getDescription()->shouldReturn(null);
    }

    function its_description_is_mutable()
    {
        $this->setDescription('This category is super cool because...');
        $this->getDescription()->shouldReturn('This category is super cool because...');
    }

    function it_has_no_metakeywords_by_default()
    {
        $this->getMetakeywords()->shouldReturn(null);
    }

    function its_metakeywords_is_mutable()
    {
        $this->setMetakeywords('foo, bar, baz');
        $this->getMetakeywords()->shouldReturn('foo, bar, baz');
    }

    function its_has_no_parent_by_default()
    {
        $this->getParent()->shouldReturn(null);
    }

    function its_has_no_childrens_by_default()
    {
        $this->getChildrens()->shouldReturn(null);
    }

    /**
     * @param Core\Shop\CategoryBundle\Entity\ProductCategory $node
     */
    function its_allow_to_add_childrens_to_the_node($node)
    {
        $this->setParent($node);
        $this->getParent()->shouldReturn($node);
    }

    /**
     * @param Core\Shop\CategoryBundle\Entity\ProductCategory $node
     */
    function its_allow_to_remove_childrens($node)
    {
        $node->setParent($this);
        $node->getParent()->willReturn($this);
        $node->setParent(null);
        $this->getChildrens()->shouldReturn(null);
    }

    function its_has_no_properties_by_default()
    {
        $this->getProperties()->shouldReturn(null);
    }

    /**
     * @param Core\Shop\PropertyBundle\Entity\Property $property
     */
    function addProperties($property)
    {
        $collection = new ArrayCollection();
        $collection->add($property);
        $this->setProperties($collection);
    }

    /**
     * @param Core\Shop\PropertyBundle\Entity\Property $property
     */
    function its_allow_to_add_properties($property)
    {
        $this->addProperties($property);
        $this->getProperties()->shouldHaveCount(1);
    }

    /**
     * @param Core\Shop\PropertyBundle\Entity\Property $property
     */
    function its_allow_to_remove_properties($property)
    {
        $this->addProperties($property);
        $collection2 = new ArrayCollection();
        $this->setProperties($collection2);
        $this->getProperties()->shouldHaveCount(0);
    }

    function its_has_no_products_by_default()
    {
        $this->getProducts()->shouldReturn(null);
    }

    function addProducts(ComProd $product)
    {
        $prophet = new Prophet();
        $product = $prophet->prophesize('Core\Shop\ProductBundle\Entity\CommonProduct');
        $collection = new ArrayCollection();
        $collection->add($product);
        $this->setProducts($collection);
    }

    function its_allow_to_add_products()
    {
        $this->addProducts();
        $this->getProducts()->shouldHaveCount(1);
    }

    function its_allow_to_remove_products()
    {
        $this->addProducts();
        $collection2 = new ArrayCollection();
        $this->setProducts($collection2);
        $this->getProducts()->shouldHaveCount(0);
    }
    
}
