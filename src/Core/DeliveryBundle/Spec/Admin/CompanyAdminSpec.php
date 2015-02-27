<?php

namespace Core\DeliveryBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Core\DeliveryBundle\Entity\Company;

class CompanyAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(), Argument::any(), Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Admin\CompanyAdmin');
    }

    function it_should_have_proper_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreDeliveryBundle');
    }
    
    function it_should_be_an_a_admin_type()
    {
        $this->shouldHaveType('Sonata\AdminBundle\Admin\Admin');
    }

    function it_choose_corent_template_for_list()
    {
        $this->getTemplate('list')->shouldReturn('ApplicationSonataAdminBundle:CRUD:list_top.html.twig');
    }

    function it_should_be_converted_to_string(Company $company)
    {
        $company->getId()
                ->willReturn(Argument::type('integer'));
        
        $company->getCaptionRu()
                ->willReturn(Argument::type('string'));

        $this->toString($company)->shouldBeString();
    }
}
