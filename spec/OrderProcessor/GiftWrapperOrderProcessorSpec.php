<?php

namespace spec\Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
use Acme\SyliusExamplePlugin\OrderProcessor\GiftWrapperOrderProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

class GiftWrapperOrderProcessorSpec extends ObjectBehavior
{
    function let(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->beConstructedWith($adjustmentFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GiftWrapperOrderProcessor::class);
    }

    function it_should_implement_the_order_processor_interface()
    {
        $this->shouldImplement(OrderProcessorInterface::class);
    }

    function it_should_add_to_the_order_total_when_the_order_is_gift_wrapped(
        Order $order,
        AdjustmentInterface $adjustment,
        AdjustmentFactoryInterface $adjustmentFactory
    ) {
        $order->isGiftWrapped()->willReturn(true);

        $adjustmentFactory->createNew()->willReturn($adjustment);
        $order->addAdjustment($adjustment)->shouldBeCalled();
        $this->process($order);

        $adjustment->setAmount(1000)->shouldBeCalled();
        $adjustment->setType('gift_wrapped')->shouldBeCalled();
    }

    function it_should_not_add_to_a_adjustment_if_the_order_is_not_gift_wrapped(
        Order $order
    ) {
        $order->isGiftWrapped()->willReturn(false);

        $order->addAdjustment(Argument::any())->shouldNotBeCalled();
        $this->process($order);
    }
}
