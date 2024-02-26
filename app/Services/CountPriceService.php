<?php

namespace App\Services;

class CountPriceService
{
    public static function getPrice ($itemPrice, $rate): float{
        return round($itemPrice*$rate, 2);
    }
}