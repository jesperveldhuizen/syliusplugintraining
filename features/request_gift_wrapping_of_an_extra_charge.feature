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
  Scenario: Gift wrapping fee is added only once to the cart
    When I add product "PHP T-Shirt" to the cart
    And I request my order to be packed as a gift
    And I add product "PHP T-Shirt" to the cart
    Then my cart total should be "$210.00"
