<?php

namespace spec\Acme\SyliusExamplePlugin\Service;

use Acme\SyliusExamplePlugin\Entity\Order;
use Acme\SyliusExamplePlugin\Service\UnwrapService;
use Doctrine\Common\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;

class UnwrapServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UnwrapService::class);
    }

    function it_is_unwrap_service()
    {
        $this->shouldImplement(\Acme\SyliusExamplePlugin\Service\UnwrapServiceInterface::class);
    }

    function let(OrderRepositoryInterface $orderRepository,
        ObjectManager $objectManager
    ){
        $this->beConstructedWith($orderRepository, $objectManager);

    }

    function it_unwraps_an_order(
        Order $order,
        OrderRepositoryInterface $orderRepository,
        ObjectManager $objectManager
    )
    {
        $objectManager->flush()->shouldBeCalled();

        $orderRepository->find(2)->willReturn($order);
        $order->setGiftWrapped(false)->shouldBeCalled();
        $this->unwrap(2);


    }


}
