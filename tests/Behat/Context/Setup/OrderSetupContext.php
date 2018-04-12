<?php

namespace Tests\Acme\SyliusExamplePlugin\Behat\Context\Setup;

use Acme\SyliusExamplePlugin\Entity\Order;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;

class OrderSetupContext implements Context
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * OrderSetupContext constructor.
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ObjectManager $objectManager
    )
    {
        $this->orderRepository = $orderRepository;
        $this->objectManager = $objectManager;
    }


    /**
     * @Given /^I requested (my order) to be packed as a gift$/
     */
    public function iRequestedMyOrderToBePackedAsAGift(Order $order)
    {
        $order->setGiftWrapped(true);
        $this->objectManager->flush();
    }
}
