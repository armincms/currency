<?php

namespace Armincms\Currency;
 
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova as LaravelNova; 
use Armincms\Currency\Policies\CurrencyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class ToolServiceProvider extends AuthServiceProvider 
{   

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        $this->mergeConfigFrom(
            base_path('vendor/torann/currency/config/currency.php'), 'currency'
        ); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {  
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations'); 

        $this->publishes([
            __DIR__.'/../config/nova-currency.php' => config_path('nova-currency.php')
        ], ['nova-currency', 'armincms']);
 
        LaravelNova::serving([$this, 'servingNova']); 
    } 

    public function servingNova(ServingNova $event)
    { 
        if(config('nova-currency.resource', true)) {
            LaravelNova::resources([ Nova\Currency::class ]); 
        }  
    }

    /**
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {
        return [
            Currency::class, config('nova-currency.policy', CurrencyPolicy::class)
        ];
    } 
}
