<?php

use Passionator\Basket\BasketClass;

use function PHPUnit\Framework\equalTo;

it('test static function work', function () {
    equalTo(BasketClass::test(), 37.85);
});
