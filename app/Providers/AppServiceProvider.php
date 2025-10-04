<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use App\Models\Sale;
use App\Observers\SalesObserver;
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
        Sale::observe(SalesObserver::class);
        //
        if(now()->format('H:i') === '20:05' &&! Cache::has('missing_sales_sent')){
            //run this command
            Artisan::call('sales:notify-missing');
            Cache::put('missing_sales_sent',true,now()->endOfDay());
        }
    }
}
