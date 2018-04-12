<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 12/04/2018
 * Time: 09:47
 */

namespace Acme\SyliusExamplePlugin\Controller;


use Acme\SyliusExamplePlugin\Entity\Order;
use Acme\SyliusExamplePlugin\Service\UnwrapService;
use Acme\SyliusExamplePlugin\Service\UnwrapServiceInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnwrapController
{
    /**
     * @var UnwrapServiceInterface
     */
    private $unwrapService;

    public function __construct(
        UnwrapServiceInterface $unwrapService
    ) {
        $this->unwrapService = $unwrapService;
    }

    public function __invoke(Request $request)
    {
        $id = $request->attributes->get('id');

        $this->unwrapService->unwrap($id);

        $referer = $request->headers->get('referer');

        assert(is_string($referer));

        return new RedirectResponse($referer);
    }
}