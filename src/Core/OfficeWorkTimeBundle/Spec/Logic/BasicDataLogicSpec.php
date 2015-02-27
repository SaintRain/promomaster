<?php

namespace Core\OfficeWorkTimeBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\RequestStack;

class BasicDataLogicSpec extends ObjectBehavior
{
    function let(Translator $translator, RequestStack $requestStack)
    {
        $options['options'] = [
            'basic_data' => ['uri' => 'http://basicdata.ru/api/json/calend/']
        ];
        $this->beConstructedWith($options, $translator, $requestStack);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Logic\BasicDataLogic');
    }

    function it_implenets_schedule()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Logic\ScheduleInterface');
    }

    function it_get_schedule()
    {
        $this->getSchedule()->shouldBeArray();
    }
}
