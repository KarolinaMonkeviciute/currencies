<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;


Route::get('/{selectedCurrency?}', function (Request $request) {
    return (new ItemController())->index($request);
});
