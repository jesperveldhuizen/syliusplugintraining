<?php

namespace spec\Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
use Acme\SyliusExamplePlugin\OrderProcessor\GiftWrapperOrderAdjustmentClearerProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

class GiftWrapperOrderAdjustmentClearerProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GiftWrapperOrderAdjustmentClearerProcessor::class);
    }

    function it_implements_the_order_processor_interface()
    {
        $this->shouldImplement(OrderProcessorInterface::class);
    }

    function it_should_clear_adjustments(
        Order $order
    ) {

        $order->removeAdjustments('gift_wrapped')->shouldBeCalled();

        $this->process($order);
    }

    function it_throws_an_exception_when_the_class_is_not_from_this_plugin(
        OrderInterface $order
    )
    {
        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('process', [$order]);
    }
}
