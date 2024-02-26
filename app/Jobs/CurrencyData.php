<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CurrencyData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = (Http::get('https://api.frankfurter.app/latest?from=EUR'));
        $json = $response->json();
        $rates = $json['rates'];

        foreach($rates as $currency_code => $rate){
            DB::table('currencies')->updateOrInsert([
                'currency_code' => $currency_code,
            ], [
                'rate' => $rate,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
