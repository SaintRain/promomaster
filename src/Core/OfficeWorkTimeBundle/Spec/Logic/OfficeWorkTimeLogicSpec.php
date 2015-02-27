<?php

namespace Core\OfficeWorkTimeBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\EntityManagerInterface;
use Core\ConfigBundle\Logic\ConfigLogic;

class OfficeWorkTimeLogicSpec extends ObjectBehavior
{
    /**
     * @param Doctrine\ORM\EntityManager $em
     * @param Core\OfficeWorkTimeBundle\Logic\BasicDataLogic $basicDataLogic
     * @param Core\ConfigBundle\Logic\ConfigLogic $configLogic
     * @param Core\OfficeWorkTimeBundle\Entity\Repository\ScheduleRepository $repo
     */
    function let($em, $basicDataLogic, $configLogic, $repo)
    {
        $em->getRepository('CoreOfficeWorkTimeBundle:Schedule')
            ->willReturn($repo);
        
        $basicDataLogic->getSchedule()->willReturn([
                'result' => true,
                'data' => []
            ]);
        $configLogic->get('office-work-time')->willReturn('09:00-18:00');
        $options = array(
            'uri' => 'http://basicdata.ru/api/json/calend/',
            'timezone' => 'Europe/Moscow',
            'options' => [
                'basic_data' => ['uri' => 'http://basicdata.ru/api/json/calend/']
        ]);

        $services = [
            'basic_data' => $basicDataLogic
        ];
        $this->beConstructedWith($options, $services, $em, $configLogic);
    }

    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Logic\OfficeWorkTimeLogic');
    }
    
    /**
     * @param Doctrine\ORM\EntityManager $em
     * @param Core\OfficeWorkTimeBundle\Logic\BasicDataLogic $basicDataLogic
     * @param Core\ConfigBundle\Logic\ConfigLogic $configLogic
     * @param Core\OfficeWorkTimeBundle\Entity\Repository\ScheduleRepository $repo
     */
    function it_get_schedule($em, $basicDataLogic, $configLogic, $repo)
    {
        $repo->findAll()->willReturn([]);
        $this->let($em, $basicDataLogic, $configLogic, $repo);
        $this->getSchedule()->shouldReturn(null);
    }

    /**
     * @param Doctrine\ORM\EntityManager $em
     * @param Core\OfficeWorkTimeBundle\Logic\BasicDataLogic $basicDataLogic
     * @param Core\ConfigBundle\Logic\ConfigLogic $configLogic
     */
    function it_get_state($em, $basicDataLogic, $configLogic)
    {
        $this->getState()->shouldBeArray();       
    }
}
