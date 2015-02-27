<?php

namespace Core\CategoryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Core\CategoryBundle\Entity\FaqCategory;
use Core\FaqBundle\Entity\Article;
use Doctrine\Common\Collections\ArrayCollection;

class FaqCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\CategoryBundle\Entity\FaqCategory');
    }

    function it_should_be_comoncategoty_type()
    {
        $this->shouldBeAnInstanceOf('Core\CategoryBundle\Entity\CommonCategory');
    }

    function it_initializes_articles_collection_by_default()
    {
        $this->getArticles()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function its_article_collection_should_be_mutable(ArrayCollection $articles)
    {
        $this->setArticles($articles);
        $this->getArticles()->shouldReturn($articles);
    }

    function it_should_add_article_properly(Article $article)
    {
        $this->addArticle($article);
        $this->getArticles()->count()->shouldReturn(1);
    }

    function it_should_remove_article_properly(Article $article)
    {
        $this->addArticle($article);
        $this->getArticles()->count()->shouldReturn(1);
        $this->removeArticle($article);
        $this->getArticles()->count()->shouldReturn(0);
    }
    
    function it_parent_is_mutable(FaqCategory $parent)
    {
        $this->setParent($parent);
        $this->getParent()->shouldReturn($parent);
    }

    function it_slug_is_mutable()
    {
        $this->setSlug('rerer-erer');
        $this->getSlug()->shouldReturn('rerer-erer');
    }

    function it_convereted_to_string()
    {
        $this->setLvl(2);
        $this->setCaptionRu('caption ru');
        $this->__toString()->shouldReturn('----caption ru');
    }
}
