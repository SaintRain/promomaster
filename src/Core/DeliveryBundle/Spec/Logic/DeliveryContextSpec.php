<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Doctrine\ORM\EntityManagerInterface;
use Core\OrderBundle\Logic\OrderLogic;
use Symfony\Component\HttpFoundation\Session\Session;
use Core\OrderBundle\Logic\OrderMailerLogic;
use Core\DeliveryBundle\Entity\Repository\ServiceRepository;

class DeliveryContextSpec extends ObjectBehavior
{
    /**
     *
     * @param Symfony\Component\HttpFoundation\Session\Session $session
     * @param Doctrine\ORM\EntityManager $em
     * @param Core\OrderBundle\Logic\OrderLogic $orderLogic
     * @param Core\OrderBundle\Logic\OrderMailerLogic $orderMailerlogic
     */
    function let($session, $em, $orderLogic, $orderMailerlogic)
    {
        $companyEmail = '3inc@mail.ru';
        $rootDir = '/';
        $this->beConstructedWith($session, $em, $orderLogic, $companyEmail, $rootDir, $orderMailerlogic);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryContext');
    }

    function it_intialize_services()
    {
        $services = [];
        $this->create($services)->shouldReturnAnInstanceOf('Core\DeliveryBundle\Logic\DeliveryContext');
    }
    
    /**
     *
     * @param Symfony\Component\HttpFoundation\Session\Session $session
     * @param Doctrine\ORM\EntityManager $em
     * @param Core\OrderBundle\Logic\OrderLogic $orderLogic
     * @param Core\OrderBundle\Logic\OrderMailerLogic $orderMailerlogic
     * @param Core\DeliveryBundle\Entity\Repository\ServiceRepository $serviceRepo
     * @param Core\DeliveryBundle\Entity\Service $service
     * @param Core\DeliveryBundle\Entity\Service $company
     */
    function it_is_tunable($session, $em, $orderLogic, $orderMailerlogic, $serviceRepo, $service, $company)
    {
        $company->getName()->willReturn('dellin ');
        $service->getCompany()->willReturn($company);
        $options = ['deliveryMethodId' => 4];
        $serviceRepo->findWithCompany($options['deliveryMethodId'])->willReturn($service);
        
        $em->getRepository('CoreDeliveryBundle:Service')->willReturn($serviceRepo);
        $this->let($session, $em, $orderLogic, $orderMailerlogic);


        $this->configurate($options)->shouldReturnAnInstanceOf('Core\DeliveryBundle\Logic\DeliveryContext');
    }
}
