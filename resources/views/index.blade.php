<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Currencies</title>
    @vite(['resources/js/app.js'])
</head>

<h1>Items</h1>
<form>
    <label>Currency:</label>
    <select data-select-currency>
        <option>Select</option>
        @foreach ($currencies as $currency)
            <option value="{{ $currency->currency_code }}">{{ $currency->currency_code }}</option>
        @endforeach
    </select>
</form>
@foreach ($items as $item)
    <div>
        <h2>{{ $item->name }}<h2>
                <p>{{ App\Services\CountPriceService::getPrice($item->price, $rate) }} {{ $selectedCurrency ?? 'EUR' }}
                </p>
    </div>
@endforeach
