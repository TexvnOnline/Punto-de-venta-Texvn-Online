<?php

namespace App\Providers;

use App\ShoppingCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer(['layouts._mini_cart', 'web.cart', 'web.checkout'], 'App\Http\ViewComposers\ShoppingCartViewComposer');
    }
}
