<?php

namespace App\Providers;
use App\Http\Controllers\RapportsController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('RapportsController', function ($app) {
            return new RapportsController();
        });
    }

    /**
     * Bootstrap any application services.
     */
    

public function boot()
{

    
    Validator::extend('pdf_file', function ($attribute, $value, $parameters, $validator) {
        $extension = $value->getClientOriginalExtension();
        return $extension === 'pdf';
    });
}



}
