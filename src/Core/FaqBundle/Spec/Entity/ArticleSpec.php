<?php

namespace Core\FaqBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\FaqBundle\Entity\Article');
    }
 
    function it_active_by_default()
    {
        $this->getIsActive()->shouldReturn(true);
    }

    function it_activity_is_mutable()
    {
        $this->setIsActive(false);
        $this->getIsActive()->shouldReturn(false);
    }
    
    function it_not_in_predifined_answer_by_default()
    {
        $this->getIsPredifinedAnswer()->shouldReturn(false);
    }

    function it_in_predifined_answer_is_mutable()
    {
        $this->setIsPredifinedAnswer(true);
        $this->getIsPredifinedAnswer()->shouldReturn(true);
    }

    function it_not_on_main_by_default()
    {
        $this->getIsOnMain()->shouldReturn(false);
    }

    function it_on_main_si_mutable()
    {
        $this->setIsOnMain(true);
        $this->getIsOnMain()->shouldReturn(true);
    }

    function it_good_rate_by_default_is_zero()
    {
        $this->getGoodRate()->shouldReturn(0);
    }

    function it_good_rate_is_numtable()
    {
        $this->setGoodRate(12);
        $this->getGoodRate()->shouldReturn(12);
    }

    function it_bad_rate_by_default_is_zero()
    {
        $this->getBadRate()->shouldReturn(0);
    }

    function it_bad_rate_is_numtable()
    {
        $this->setBadRate(12);
        $this->getBadRate()->shouldReturn(12);
    }
    
    /**
     *
     * @param Core\CategoryBundle\Entity\FaqCategory $category
     */
    function it_category_is_mutable($category)
    {
        $this->setCategory($category);
        $this->getCategory()->shouldReturn($category);
    }

    function it_should_serialized()
    {
        $this->jsonSerialize()->shouldBeArray();
    }

    function it_should_compressed()
    {
        $this->getCompressed()->shouldBeString();
    }
    
}
