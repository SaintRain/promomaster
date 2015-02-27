<?php

namespace Core\TroubleTicketBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Core\ProductBundle\Entity\CommonProduct;
use Core\OrderBundle\Entity\Order;

class TroubleTicketTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Form\Type\TroubleTicketType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder, Order $order, CommonProduct $product)
    {
        $builder
            ->add('authorName', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('authorEmail', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('category', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('title', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('body','textarea', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('file', 'multiupload_file_frontend', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('order', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('product', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->addEventListener(Argument::any(), Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        
        $this->buildForm($builder, array('order' => $order, 'product' => $product));
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'Core\TroubleTicketBundle\Entity\TroubleTicket',
            'validation_groups' => array('Frontend', 'Default'),
            'status' => null, // статус по умолчанию
            'priority' => null, // приоритет по умолчанию
            'user' => null, // текущий пользователь
            'order' => null, // заказ для связи с тикетом
            'product' => null, // продукт для связи с тикетом
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_get_proper_name()
    {
        $this->getName()->shouldReturn('trouble_ticket');
    }
}
