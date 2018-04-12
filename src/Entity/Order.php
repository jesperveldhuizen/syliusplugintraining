<?php

namespace Acme\SyliusExamplePlugin\Entity;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
    /** @var bool */
    private $giftWrapped = false;

    /** @var string */
    private $giftMessage;

    public function setGiftWrapped(bool $giftWrapped): void
    {
        $this->giftWrapped = $giftWrapped;
    }

    public function isGiftWrapped(): bool
    {
        return $this->giftWrapped;
    }

    /**
     * @return string
     */
    public function getGiftMessage():? string
    {
        return $this->giftMessage;
    }

    /**
     * @param string $giftMessage
     */
    public function setGiftMessage(?string $giftMessage): void
    {
        $this->giftMessage = $giftMessage;
    }
}
