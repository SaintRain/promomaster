<?php

namespace spec\Core\Shop\CategoryBundle\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TroubleTicketCategoryFormMapperSpec extends ObjectBehavior
{
    /**
     * @param Sonata\AdminBundle\Form\FormMapper $formMapper
     * @param Core\Shop\CategoryBundle\Entity\TroubleTicketCategory $troubleTicketCategory
     */
    function let($formMapper, $troubleTicketCategory)
    {
        
        $formMapper->with('Основное')->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('parent', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('captionRu', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('name', null, Argument::any())->shouldBeCalled()->willReturn($formMapper);
        $formMapper->add('isEnabled', 'checkbox', Argument::any())->shouldBeCalled()->willReturn($formMapper);
        
        $options = array('disabled' => 1, 'obj' => $troubleTicketCategory, 'class'=>'Core\Shop\CategoryBundle\Entity\TroubleTicketCategory');
        $this->beConstructedWith($formMapper, $options);
        
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Shop\CategoryBundle\Admin\Form\Mapper\TroubleTicketCategoryFormMapper');
    }
    
}
