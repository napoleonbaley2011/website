<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_ALL, 'es_ES.UTF-8');
        setlocale(LC_TIME, 'es_ES');
        Carbon::setUTF8(true);
        Carbon::setLocale('es');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'es_ES.UTF-8');
        setlocale(LC_TIME, 'es_ES');
        Carbon::setUTF8(true);
        Carbon::setLocale('es');
    }
}