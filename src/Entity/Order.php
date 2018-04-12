<?php

namespace Acme\SyliusExamplePlugin\Entity;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
    /** @var bool */
    private $giftWrapped = false;

    public function setGiftWrapped(bool $giftWrapped): void
    {
        $this->giftWrapped = $giftWrapped;
    }

    public function isGiftWrapped(): bool
    {
        return $this->giftWrapped;
    }
}
