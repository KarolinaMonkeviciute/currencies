<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Currency;
use App\Services\GetSelectedCurrencyRateService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $items = Item::all();
        $currencies = Currency::all();
        $selectedCurrency = $request->query('currency');

        if($selectedCurrency){
            $rate = GetSelectedCurrencyRateService::getRate($selectedCurrency);
        } else {
            $rate = 1;
        }

        return view('index', [
            'items' => $items,
            'currencies' => $currencies,
            'selectedCurrency' => $selectedCurrency,
            'rate' => $rate,
        ]);
    }
}