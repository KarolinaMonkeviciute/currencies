<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Item;
use App\Models\Currency;
use App\Repositories\ItemRepository;
use App\Repositories\CurrencyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ItemRepository::class, function ($app) {
            return new ItemRepository($app->make(Item::class));
        });
        $this->app->bind(CurrencyRepository::class, function ($app) {
            return new CurrencyRepository($app->make(Currency::class));
        });
    }
}
