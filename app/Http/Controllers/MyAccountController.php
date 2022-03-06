<?php

namespace App\Http\Controllers;


use App\PaymentPlatform;
use App\Setting;
use App\ShoppingCart;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use App\Order;
class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('client_auth');
        $this->middleware([
            'permission:web.my_account',
            'permission:web.checkout',
            'permission:web.orders',
            'permission:web.order_details',
            'permission:web.account_info',
            'permission:web.address_edit',
            'permission:web.change_password',
            'permission:web.rate_product'
        ]);
    }
    public function my_account(){
        return view('web.my_account');
    }
    public function checkout(){
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $products =$shopping_cart->shopping_cart_details;
        $subtotal = $shopping_cart->subtotal();
        $tax = Setting::find(1)->pluck('tax');
        $paymentPlatforms = PaymentPlatform::all();

        return view('web.checkout', compact('paymentPlatforms','products','subtotal','tax'));
    }
    public function orders(){
        $orders = auth()->user()->orders;
        return view('web.orders', compact('orders'));
    }
    public function account_info(){
        $user = auth()->user();
        return view('web.account_info', compact('user'));
    }
    public function address_edit(){
        $profile = auth()->user()->profile;
        $user = auth()->user();
        return view('web.address_edit', compact('profile', 'user'));
    }
    public function change_password(){
        $user = auth()->user();
        return view('web.change_password', compact('user'));
    }
    public function order_details(Order $order)
    {
        $details = $order->order_details;
        return view('web.order_details', compact('order','details'));
    }
    public function rate_product(Request $request, Product $product){
        $product->rate($request->rate, $request->comment);
        return back();
    }
}
