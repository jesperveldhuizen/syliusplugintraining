<?php

namespace spec\Acme\SyliusExamplePlugin\Entity;

use Acme\SyliusExamplePlugin\Entity\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Order::class);
    }

    function it_has_mutable_gift_wrapped_field(): void
    {
        $this->setGiftWrapped(true);
        $this->isGiftWrapped()->shouldReturn(true);
    }

    function it_is_not_gift_wrapped_by_default()
    {
        $this->isGiftWrapped()->shouldReturn(false);
    }
}
