<?php

namespace Core\FaqBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Core\FaqBundle\Entity\Article;

class ArticleAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_should_be_an_a_admin_type()
    {
        $this->shouldHaveType('Sonata\AdminBundle\Admin\Admin');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\FaqBundle\Admin\ArticleAdmin');
    }

    function it_should_be_converted_to_string(Article $article)
    {
        $this->toString($article)->shouldBeString();
    }

    function it_should_choose_corrent_template_for_list()
    {
        $this
            ->getTemplate('list')
            ->shouldReturn('ApplicationSonataAdminBundle:CRUD:list_top.html.twig');
    }

    function it_should_choose_corrent_template_for_preview()
    {
        $this
            ->getTemplate('preview')
            ->shouldReturn('CoreFaqBundle:Admin:Article/preview.html.twig');
    }

    function it_should_have_proper_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreFaqBundle');
    }
}
