<?php

namespace App\Notifications;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('¡Nuevo pedio!')
                    ->line($this->order->user->name.' Ha realizado un nuevo pedido por '.$this->order->total().' Soles.')
                    ->action('Ver detalle de pedido', route('orders.show',$this->order));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order_date' =>  $this->order->order_date,
            'user_id' =>  $this->order->user_id,
            'id' =>  $this->order->id,
            'name' =>  $this->order->user->name,
            'total' =>  $this->order->total(),
            'icon' =>  'fa-shopping-cart',
            'title' =>  'Nuevo pedido',
        ];
    }
}
