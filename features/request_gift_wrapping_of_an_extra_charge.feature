@gift_wrapping
Feature: Request gift wrapping of an extra charge
  In order to send a gift to friends more easily
  As a Customer
  I want to buy items packed as gifts

  Background:
    Given the store operates on a single channel in "United States"
    And the store has a product "PHP T-Shirt" priced at "$100.00"

  @ui
  Scenario: Receiving fixed discount for my cart
    When I add product "PHP T-Shirt" to the cart
    And I request my order to be packed as a gift
    Then my cart total should be "$110.00"

  @ui
  Scenario: When you add an item for the first time it should be 100 dollars
    When I add product "PHP T-Shirt" to the cart
    Then my cart total should be "$100.00"

  @ui
  Scenario: When i uncheck the gift wrapper it should be 100 dollars
    Given I added product "PHP T-Shirt" to the cart
    And I requested my order to be packed as a gift
    When I request my order to not be packed as a gift
    Then my cart total should be "$100.00"

  @ui
  Scenario: When I order an item with a gift wrap, it should contain a text
    Given I added product "PHP T-Shirt" to the cart
    When I request my order to be packed as a gift with the message "Hello world"
    Then I should be able to add a text for the gift