<?php

namespace App\Http\Controllers;

use App\Order;
use App\Business;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:orders_update'
        ]);
    }
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }
    public function show(Order $order)
    {
        $business = Business::firstOrFail();
        $user = $order->user;
        $details = $order->order_details;
        return view('admin.order.show', compact('order','business','user','details'));
    }
    public function orders_update(Request $request, $id){
        $order = Order::find($id);
        $order->update_status($request);
        return $request->value;
    }
}
