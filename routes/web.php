<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::post('/store', [ItemController::class, 'store'])->name('store');
Route::get('/create', [ItemController::class, 'create'])->name('create');
Route::get('/{selectedCurrency?}', [ItemController::class, 'index'])->name('index');
Route::get('/edit/{item}', [ItemController::class, 'edit'])->name('edit');
Route::put('/{item}', [ItemController::class, 'update'])->name('update');
Route::delete('/{item}', [ItemController::class, 'destroy'])->name('destroy');
