<?php

namespace App\Services;
use App\Models\Currency;

class GetSelectedCurrencyRateService
{
    public static function getRate(string $currency): ?float{
        if($currency){ 
           $findCurrency = Currency::where('currency_code', $currency)->first();
           if($findCurrency){
            return $findCurrency->rate;
           }else{
            abort(404);
           }
        }
    }
}