<?php

namespace App\Services;
use App\Repositories\CurrencyRepository;

class GetSelectedCurrencyRateService
{
    protected $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function getRate(string $currency): ?float{
        if($currency){ 
           $findCurrency = $this->currencyRepository->show($currency);
           if($findCurrency){
            return $findCurrency->rate;
           }else{
            abort(404);
           }
        }
    }
}