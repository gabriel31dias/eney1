<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Observers\VendaObserver;
use App\Observers\UserObserver;

use App\Venda;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       // if ($this->app->environment() !== 'production') {
            
       // }  

      // URL::forceScheme('http');
        
      URL::forceScheme('https');
     
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Venda::observe(VendaObserver::class);

        User::observe(UserObserver::class);

    }
}
