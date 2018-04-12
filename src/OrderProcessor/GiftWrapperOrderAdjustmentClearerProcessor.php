<?php

/**
 * This code was written durring Sylius workshop
 */

namespace Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class GiftWrapperOrderAdjustmentClearerProcessor implements OrderProcessorInterface
{
    public function process(OrderInterface $order) :void
    {
        if (!$order instanceof Order) {
            throw new \InvalidArgumentException();
        }

        $order->removeAdjustments('gift_wrapped');
    }
}