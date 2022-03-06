<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\ShoppingCart;
use Illuminate\Support\Facades\Session;

class ShoppingCartViewComposer{
    public function compose(View $view){
        $session_name = 'shopping_cart_id';
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        Session::put($session_name, $shopping_cart->id);
        $view->with (['shopping_cart' => $shopping_cart]);
    }
}

