<?php

namespace Core\CategoryBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;
use Core\CategoryBundle\Entity\TroubleTicketCategory;
use Symfony\Component\DependencyInjection\Container;
use Core\LanguageBundle\Logic\LanguageLogic;


class TroubleTicketCategoryFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper,  TroubleTicketCategory $cat, Container $container, LanguageLogic $lanLogic)
    {
        $container
            ->get('language_switcher_logic')
            ->willReturn($lanLogic);

        $formMapper
            ->with(Argument::any())
            ->willReturn($formMapper)
        ;

        $formMapper
            ->add('parent', 'tree_select', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;

        $formMapper
            ->add('captionRu', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;

        $formMapper
            ->add('isEnabled', 'checkbox', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;

        $formMapper
            ->add('name', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;
        
        $options = [
            'obj' => $cat,
            'disabled' => false,
            'class' => 'Core\CategoryBundle\Entity\FaqCategory',
            'container' => $container
        ];

        $this->beConstructedWith($formMapper, $options);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\CategoryBundle\Admin\Form\Mapper\TroubleTicketCategoryFormMapper');
    }
}
