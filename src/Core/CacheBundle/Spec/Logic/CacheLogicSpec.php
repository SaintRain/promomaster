<?php

namespace Core\CacheBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Beryllium\CacheBundle\Cache;
use Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine;
use Symfony\Component\Security\Core\SecurityContext;

class CacheLogicSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\CacheBundle\Logic\CacheLogic');
    }

    function let(
        Cache $cache, TimedTwigEngine $templating, SecurityContext $securityContext
    )
    {
        $this->beConstructedWith($cache, $templating, $securityContext);
    }

    /**
     * Должен быть метод на добавление в кеш
     */
    function it_should_set()
    {
        $this->set('test', 'some content ...', NULL, false)->shouldBeBool();
    }
}
