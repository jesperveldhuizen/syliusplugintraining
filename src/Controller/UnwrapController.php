<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 12/04/2018
 * Time: 09:47
 */

namespace Acme\SyliusExamplePlugin\Controller;


use Acme\SyliusExamplePlugin\Entity\Order;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnwrapController
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ObjectManager $objectManager
    ) {
        $this->orderRepository = $orderRepository;
        $this->objectManager = $objectManager;
    }

    public function __invoke(Request $request)
    {
        $id = $request->attributes->get('id');

        /** @var Order $order */
        $order = $this->orderRepository->find($id);
        $order->setGiftWrapped(false);

        $this->objectManager->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }
}