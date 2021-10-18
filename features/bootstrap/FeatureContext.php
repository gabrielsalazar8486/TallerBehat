<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;


class FeatureContext implements Context
{
    private $shelf;
    private $basket;

    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
    }

    /**
     * @Given there is a(n) :product, which costs £:cost
     */
    public function thereIsAWhichCostsPS($product, $cost){
        $this->shelf->setProductPriece($product, floatval($cost));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product){
        $this->basket->addProduct($product);
    }
    /**
     * @Then I should have :count product(s) in the basket
     */
    public function IShouldHaveProductInTheBasket($count){
        PHPUnit\Framework\Assert::assertEquals((int)$count, $this->basket->count());
    }
    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price){

        PHPUnit\Framework\Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPriece()
        );
    }
}
