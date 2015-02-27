<?php

namespace spec\Core\Shop\CategoryBundle\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductCategoryFormMapperSpec extends ObjectBehavior
{
    /**
     * @param Sonata\AdminBundle\Form\FormMapper $formMapper
     * @param Core\Shop\CategoryBundle\Entity\ProductCategory $productCategory
     */
    function let($formMapper, $productCategory)
    {
        
        $formMapper->with('General')->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('parent', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('caption', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('name', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('isEnabled', 'checkbox', Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->with('SEO')->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('slug', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('title', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('metakeywords', 'textarea', Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('metadescription', 'textarea', Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->end()->shouldBeCalled()->willReturn($formMapper);
        
        $options = array('disabled' => 1, 'obj' => $productCategory, 'class'=>'Core\Shop\CategoryBundle\Entity\ProductCategory');
        $this->beConstructedWith($formMapper, $options);
        
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Shop\CategoryBundle\Admin\Form\Mapper\ProductCategoryFormMapper');
    }
    
}
