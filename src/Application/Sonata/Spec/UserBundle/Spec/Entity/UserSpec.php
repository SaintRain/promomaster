<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\User');
    }

    function it_should_be_a_base_user_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\UserBundle\Entity\BaseUser');
    }

    function it_not_subcribed_on_rss_news_by_default()
    {
        $this->getIsRssNews()->shouldReturn(false);
    }

    function it_subscription_on_rss_news_is_mutable()
    {
        $this->setIsRssNews(true);
        $this->getIsRssNews()->shouldReturn(true);
    }

    function it_not_registered_via_social_by_default()
    {
        $this->getIsSocialAuth()->shouldReturn(false);
    }

    function it_registered_via_social_is_mutable()
    {
        $this->setIsSocialAuth(true);
        $this->getIsSocialAuth()->shouldReturn(true);
    }

    function it_initializes_favorite_products_collection_by_default()
    {
        $this->getFavoriteProducts()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_history_products_collection_by_default()
    {
        $this->getHistoryProducts()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_contragents_collection_by_default()
    {
        $this->getContragents()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_admin_comments_collection_by_default()
    {
        $this->getAdminComments()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_subscribers_on_admin_comments_collection_by_default()
    {
        $this->getSubscribersOnAdminComments()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_reviews_collection_by_default()
    {
        $this->getReviews()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_reviews_likes_collection_by_default()
    {
        $this->getReviewsLikes()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_log_collection_by_default()
    {
        $this->getLogs()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_caption_is_mutable()
    {
        $this->setEmail('3inc@mail.ru');
        $this->setFirstname('Василий');
        $this->setLastname('Пупкин');
        $this->getCaption()->shouldReturn('3inc@mail.ru Пупкин Василий');
    }

    function it_full_name_is_mutable()
    {
        $this->setFirstname('Василий');
        $this->setLastname('Пупкин');
        $this->getFullname()->shouldReturn('Пупкин Василий');
    }
}
