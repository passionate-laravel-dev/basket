<?php

namespace Passionator\Basket;

class BasketClass {
    private $products;
    private $deliveryCharges;
    private $items = [];

    public function __construct($items = [])
    {
        $this->products = [
            'R01' => 32.95,
            'G01' => 24.95,
            'B01' => 7.95
        ];

        $this->deliveryCharges = [
            50 => 4.95,
            90 => 2.95,
            PHP_INT_MAX => 0.00
        ];

        foreach ($items as $productCode) {
            $this->add($productCode);
        }
    }

    public function add($productCode){
        if(isset($this->products[$productCode])) {
            $this->items[] = $productCode;
        }
    }

    public function total() {
        $subtotal = 0;
        $redWidgetCount = 0;

        foreach($this->items as $productCode){
            $price = $this->products[$productCode];

            if($redWidgetCount === 0 && $productCode === 'R01') {$redWidgetCount++;}
            else if($redWidgetCount === 1){
                $price = $price / 2;
                $redWidgetCount ++;
            }
            $subtotal += $price;
        }

        $deliveryCost = $this->calculateDeliveryCharges($subtotal);

        return $subtotal + $deliveryCost;
    }

    protected function calculateDeliveryCharges($price){
        foreach ($this->deliveryCharges as $pivot => $fee) {
            if($pivot > $price){
                return $fee;
            }
        }
        return $this->deliveryCharges[PHP_INT_MAX];
    }

    public static function test() {
        $obj = new static(['B01', 'G01']);
        return $obj->total();
    }
}
