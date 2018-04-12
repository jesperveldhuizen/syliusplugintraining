<?php

namespace Tests\Acme\SyliusExamplePlugin\Behat\Page\Shop;

use Sylius\Behat\Page\Shop\Cart\SummaryPage as BaseSummaryPage;

class SummaryPage extends BaseSummaryPage
{
    public function checkAsAGiftWrapped(): void
    {
        $this->getElement('gift_wrapping')->check();
    }

    public function unwrapGift(): void
    {
        $this->getElement('gift_unwrapping')->click();
    }

    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'gift_wrapping' => '#sylius_cart_giftWrapped',
            'gift_unwrapping' => '#sylius_cart_giftUnwrapped',
        ]);
    }
}
