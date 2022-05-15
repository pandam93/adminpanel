<?php

namespace App\Providers;

use App\Http\Requests\DataTableAjaxRequest;
use Illuminate\Support\ServiceProvider;

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
        $this->app->resolving(DataTableAjaxRequest::class, function ($request, $app) {
            DataTableAjaxRequest::createFrom($app['request'], $request);
        });
    }
}
