<?php

namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CurrencyRepository
{
    protected $currency;

    public function __construct(Currency $currency){
        $this->currency = $currency;
    }

    public function showAll(): Collection{
        return Currency::all();
    }

    public function show($currency): Model{
       return Currency::where('currency_code', $currency)->first();
    }
}