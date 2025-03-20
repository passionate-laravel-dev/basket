## Description

This is simple product basket implementation for the skill test.

1. It is initialised with the product catalogue, delivery charge rules in constructor.
2. There is an add method that takes the product code as a parameter
3. There is a total method that returns the total cost of the basket, taking into account
   the delivery and offer rules.

## Installation

You can install the package via composer:

```bash
composer require passionator/basket
```

## Usage

```php
use Passionator\Basket\BasketClass;

$basket = new BasketClass();

// You can add among of ['R01','G01','B01']
$basket->add('B01');
$basket->add('R01');
$basket->add('G01');

// you can calculate the total price
echo $basket->total();
```
