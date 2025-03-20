<?php

use Passionator\Basket\BasketClass;

it('test total calcualtion work', function () {
    $result = BasketClass::test(); 
    expect($result)->toEqual(37.85);
});
