<?php

namespace App\Services;
use App\Models\Currency;

class GetSelectedCurrencyRateService
{
    public static function getRate(string $currency): float{
        if($currency){
           return Currency::where('currency_code', $currency)->first()->rate;
        }
    }
}