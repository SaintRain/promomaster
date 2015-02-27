<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Symfony\Component\Translation\Translator;
use Core\DeliveryBundle\Entity\Company;
use Core\OrderBundle\Entity\Waybills;

class MailerSpec extends ObjectBehavior
{
    /**
     *
     * @param FOS\UserBundle\Mailer\MailerInterface $mailer
     * @param Symfony\Component\Routing\RouterInterface $router
     * @param Symfony\Bundle\FrameworkBundle\Templating\EngineInterface $templating
     * @param Symfony\Component\Translation\Translator $translator
     */
    function let($mailer, $router, $templating, $translator)
    {
        $params = [
            'fromEmail'=> '3inc@mail.ru',
        ];
        
        $this->beConstructedWith($mailer, $router, $templating, $translator, $params);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Mailer');
    }
    
}