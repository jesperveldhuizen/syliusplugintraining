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
     * @When I request my order to be packed as a gift with the message :message
     */
    public function iRequestMyOrderToBePackedAsAGift(string $message = ''): void
    {
        $this->summaryPage->checkAsAGiftWrapped($message);
        $this->summaryPage->updateCart();
    }

    /**
     * @When I request my order to not be packed as a gift
     */
    public function iRequestMyOrderToNotBePackedAsAGift()
    {
        $this->summaryPage->open();
        $this->summaryPage->unwrapGift();
        $this->summaryPage->updateCart();
    }

    /**
     * @Then I should be able to add a text for the gift
     */
    public function iShouldBeAbleToAddATextForTheGift()
    {
        $this->summaryPage->getGiftMessage();
    }
}
