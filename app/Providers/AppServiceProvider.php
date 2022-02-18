<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Le bout de code ci-dessous a été ajouté car la migration causait des erreurs et ne migrait pas
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                //Le bout de code ci-dessous a été ajouté car la migration causait des erreurs et ne migrait pas
                Schema::defaultStringLength(191);
        //
    }
}
