<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:subscriptions.index',
            'permission:subscriptions.destroy'
        ]);
    }
    public function index()
    {
        $subscriptions = Subscription::get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back()->with('toast_success', '¡Suscripción eliminada con éxito!');
    }
}
