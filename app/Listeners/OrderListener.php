<?php

namespace App\Listeners;

use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Notification;

class OrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::role(['Admin','Cashier'])
        ->each(function(User $user) use ($event){
            Notification::send($user, new OrderNotification($event->order));
        });
        // ->whereNotIn('id', $event->order->user_id)
    }
}
