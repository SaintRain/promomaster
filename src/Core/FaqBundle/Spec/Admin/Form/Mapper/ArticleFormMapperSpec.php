<?php

namespace Core\FaqBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;
use Core\FaqBundle\Entity\Article;
use Symfony\Component\DependencyInjection\Container;
use Core\LanguageBundle\Logic\LanguageLogic;
class ArticleFormMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\FaqBundle\Admin\Form\Mapper\ArticleFormMapper');
    }

    function let(FormMapper $formMapper, Article $article, Container $container, LanguageLogic $languageLogic)
    {
        $container
            ->get('language_switcher_logic')
            ->willReturn($languageLogic);
        $options = [
            'obj' => $article,
            'container' => $container
        ];

       
        $formMapper
            ->with(Argument::any())
            ->willReturn($formMapper)
        ;
        /*
        $formMapper
            ->with(Argument::any())
            ->shouldBeCalled()
        ;
        $formMapper
            ->end()
            ->willReturn($formMapper)
        ;      
        
        $formMapper
            ->add('isOnMain', 'checkbox', Argument::any())
            ->willReturn($formMapper)
        ;

        $formMapper
            ->add('category', 'tree_select', Argument::any())
            ->willReturn($formMapper)
        ;       

        $formMapper
            ->add('isActive', 'checkbox', Argument::any())
            ->willReturn($formMapper)
        ;
        
        $formMapper
            ->add('slugHistory', 'slug_history', Argument::any())
            ->willReturn($formMapper)
        ;
        */
        $this->beConstructedWith($formMapper, $options);        
    }
    
    function it_is_a_form_type()
    {
        $this->shouldHaveType('Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper');
    }
}

