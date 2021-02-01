<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function register()
    {
        //
    }


    public function boot()
    {
        View::composer('site.partials.products.stunning-header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}
