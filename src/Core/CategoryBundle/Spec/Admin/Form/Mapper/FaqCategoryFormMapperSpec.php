<?php

namespace Core\CategoryBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;
use Core\CategoryBundle\Entity\FaqCategory;
use Symfony\Component\DependencyInjection\Container;
use Core\LanguageBundle\Logic\LanguageLogic;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class FaqCategoryFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper, FaqCategory $cat, Container $container, LanguageLogic $lanLogic)
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
        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;
        
        $formMapper
            ->with(Argument::any())
            ->willReturn($formMapper)
        ;
        
        $formMapper
            ->add('slug', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;
        
        $formMapper
            ->add('slugHistory', 'slug_history', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;

        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;
        /*
        $this
            ->add('title', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($languageSwitcher)
        ;
       
        $this
            ->add('metakeywords', 'textarea', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper)
        ;

        $this
            ->add('metadescription', 'textarea', Argument::any())
            ->shouldBeCalled()
            ->willReturn($this)
        ;
        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($this)
        ;
        */
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
        $this->shouldHaveType('Core\CategoryBundle\Admin\Form\Mapper\FaqCategoryFormMapper');
    }

    function it_is_should_be_language_form_switcher()
    {
        $this->shouldBeAnInstanceOf('Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper');
    }
}
