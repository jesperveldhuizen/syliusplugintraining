<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 12/04/2018
 * Time: 14:44
 */

namespace Tests\Acme\SyliusExamplePlugin\Behat\Context\Transform;


use Acme\SyliusExamplePlugin\Entity\Order;
use Behat\Behat\Context\Context;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;

class OrderTransformContext implements Context
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * OrderTransformContext constructor.
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @Transform /^(my order)$/
     */
    public function getLastOrder(): Order
    {
        /** @var Order $order */
        $array = $this->orderRepository->findAll();

        return end($array);
    }
}