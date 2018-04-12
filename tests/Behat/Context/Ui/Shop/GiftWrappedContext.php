<?php

namespace Tests\Acme\SyliusExamplePlugin\Behat\Context\Ui\Shop;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Tests\Acme\SyliusExamplePlugin\Behat\Page\Shop\SummaryPage;

final class GiftWrappedContext implements Context
{
    /**
     * @var SummaryPage
     */
    private $summaryPage;

    public function __construct(SummaryPage $summaryPage)
    {
        $this->summaryPage = $summaryPage;
    }

    /**
     * @When I request my order to be packed as a gift
     */
    public function iRequestMyOrderToBePackedAsAGift(): void
    {
        $this->summaryPage->checkAsAGiftWrapped();
        $this->summaryPage->updateCart();
    }


    /**
     * @When I request my order to not be packed as a gift
     */
    public function iRequestMyOrderToNotBePackedAsAGift()
    {
        $this->summaryPage->unwrapGift();
        $this->summaryPage->updateCart();
    }
}
