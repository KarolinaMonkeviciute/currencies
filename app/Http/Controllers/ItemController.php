<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Currency;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Item::all();
        $currencies = Currency::all();
        $selectedCurrency = $request->query('currency');

        if($selectedCurrency){
            $rate = Currency::where('currency_code', $selectedCurrency)->first()->rate;
        } else {$rate = 1;}

        return view('index', [
            'items' => $items,
            'currencies' => $currencies,
            'selectedCurrency' => $selectedCurrency,
            'rate' => $rate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
