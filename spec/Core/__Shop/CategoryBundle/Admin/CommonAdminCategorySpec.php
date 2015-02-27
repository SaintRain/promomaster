<?php

namespace spec\Core\CategoryBundle\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommonAdminCategorySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(null,'Core\CategoryBundle\Entity\ProductCategory','CoreCategoryBundle:Admin\CommonAdminCategory');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\CategoryBundle\Admin\CommonAdminCategory');
    }

    function it_should_be_an_admin_type()
    {
        $this->shouldImplement('Sonata\AdminBundle\Admin\AdminInterface');
    }
}
