<?php

namespace App;

use App\Events\OrderEvent;
use App\Events\OrderStatusEvent;
use App\Notifications\OrderNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_status',
        'payment_status',
        'user_id',
        'order_date',
        'tax',
    ];
    protected $dates = ['order_date'];
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subtotal(){
        $total = 0;
        foreach ($this->order_details as $key => $order_detail) {
            $total += $order_detail->total();
        }
        return $total;
    }
    public function total_tax(){
        return $this->subtotal() * $this->tax;
    }
    public function total(){
        return $this->subtotal() + $this->total_tax();
    }

    public function update_stock($id, $quantity){
        $product = Product::find($id);
        $product->subtract_stock($quantity);
    }
    public function restore_stock($id, $quantity){
        $product = Product::find($id);
        $product->add_stock($quantity);
    }

    public static function my_store(){
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $tax = Setting::find(1)->pluck('tax');
        $order = self::create([
            'shipping_status'=> 'PENDING',
            'payment_status'=> 'PAID',
            'user_id' => auth()->user()->id,
            'order_date' => Carbon::now(),
            'tax'=> $tax[0],
        ]);
        $order->add_order_details($shopping_cart);
        self::make_order_notification($order);
    }
    public function add_order_details($shopping_cart){
        foreach ($shopping_cart->shopping_cart_details as $key => $abc) {
            $this->update_stock($shopping_cart->shopping_cart_details[$key]->product_id, $shopping_cart->shopping_cart_details[$key]->quantity);
            $results[] = array("quantity"=>$shopping_cart->shopping_cart_details[$key]->quantity, "price"=>$abc->product->discountedPrice,"product_id"=>$shopping_cart->shopping_cart_details[$key]->product_id);
        }
        $this->order_details()->createMany($results);
    }

    public static function make_order_notification($order){
        event(new OrderEvent($order));
    }
    public function shipping_status(){
        switch ($this->shipping_status) {
            case 'PENDING':
                return 'PENDIENTE';
            case 'APPROVED':
                return 'APROBADO';
            case 'CANCELED':
                return 'CANCELADO';
            case 'DELIVERED':
                return 'ENTREGADO';
            default:
                # code...
                break;
        }
    }
    
    public function status(){
        switch ($this->shipping_status) {
            case 'PENDING':
                return [
                    'color' => 'warning',
                    'text' => 'Pendiente'
                ];
            case 'APPROVED':
                return [
                    'color' => 'primary',
                    'text' => 'Aprobado'
                ];
            case 'CANCELED':
                return [
                    'color' => 'danger',
                    'text' => 'Cancelado'
                ];
            case 'DELIVERED':
                return [
                    'color' => 'success',
                    'text' => 'Entregado'
                ];
            default:
                # code...
                break;
        }
    }


    public function order_date(){
        return $this->order_date->format('M-D h:i a');
    }
    public function update_status($request){
        $old_status = $this->shipping_status;
        $this->update([
            'shipping_status' => $request->value
        ]);
        $this->change_stock($old_status);
        self::make_order_status_notification($this);
    }
    public function change_stock($old_status){
        switch ($this->shipping_status) {
            case 'PENDING':
                $this->loop_details($this->order_details, 'PENDING', $old_status);
                 break;
            case 'APPROVED':
                $this->loop_details($this->order_details, 'APPROVED', $old_status);
                 break;
            case 'CANCELED':
                $this->loop_details($this->order_details, 'CANCELED', $old_status);
                 break;
            case 'DELIVERED':
                $this->loop_details($this->order_details, 'DELIVERED', $old_status);
                 break;
            default:
                # code...
                break;
        }
    }
    public function loop_details($details, $status, $old_status){

        if ($old_status != 'CANCELED' &&  $status != 'CANCELED') {
           
        }elseif($old_status != 'CANCELED' && $status == 'CANCELED'){
            
            foreach ($details as $key => $detail) {
                $this->restore_stock($detail->product_id, $detail->quantity);
            }
        }elseif($old_status == 'CANCELED' && $status != 'CANCELED'){
           
            foreach ($details as $key => $detail) {
                $this->update_stock($detail->product_id, $detail->quantity);
            }
        }

    }

    public static function make_order_status_notification($order){
        event(new OrderStatusEvent($order));
    }
}

