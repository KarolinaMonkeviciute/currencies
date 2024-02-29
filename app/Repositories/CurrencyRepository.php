<?php

namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class CurrencyRepository extends RepositoryFoundation
{
    public function __construct(Currency $model){
        parent::__construct($model);
    }

    public function showAll(): Collection{
        return Currency::all();
    }

    public function show($currency): Model{
       return Currency::where('currency_code', $currency)->first();
    }
}