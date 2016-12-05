<?php

namespace Furbook\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\CatFormComposer as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('partials.forms.cat', 'App\\Http\\Views\\Composers\\CatFormComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
