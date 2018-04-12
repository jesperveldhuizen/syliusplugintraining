<?php

namespace Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Order\Factory\AdjustmentFactory;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

class GiftWrapperOrderProcessor implements OrderProcessorInterface
{
    /**
     * @var AdjustmentFactoryInterface
     */
    private $adjustmentFactory;

    public function __construct(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->adjustmentFactory = $adjustmentFactory;
    }

    /**
     * @param OrderInterface $order
     */
    public function process(OrderInterface $order): void
    {
        if (!$order instanceof Order) {
            return;
        }

        if (!$order->isGiftWrapped()) {
            return;
        }

        /** @var AdjustmentInterface $adjustment */
        $adjustment = $this->adjustmentFactory->createNew();
        $adjustment->setAmount(1000);
        $adjustment->setType('gift_wrapped');

        $order->addAdjustment($adjustment);
    }
}
