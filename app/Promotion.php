<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'discount_rate',
        'start_date',
        'ending_date',
        'promotion_type',
        'fixed_amount_discount',
    ];
    protected $dates = ['start_date','ending_date'];
    public function promotion_status(){
        if ($this->ending_date > Carbon::now()) {
            return [
                'color' => 'success',
                'text' => 'Vigente'
            ];
        } else {
            return [
                'color' => 'danger',
                'text' => 'Expirado'
            ];
        }  
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function my_store($request){
        $promotion = self::create($request->all()+[
            'start_date'=> date('Y-m-d H:i:s',strtotime($request->raw_start_date)),
            'ending_date'=> date('Y-m-d H:i:s',strtotime($request->raw_ending_date)),
            'discount_rate' => $request->raw_discount_percentage
        ]);
        $promotion->products()->attach($request->products);
    }
    public function my_update($request){
       
        $this->update($request->all()+[
            'start_date'=> date('Y-m-d H:i:s',strtotime($request->raw_start_date)),
            'ending_date'=> date('Y-m-d H:i:s',strtotime($request->raw_ending_date)),
            'discount_rate' => $request->raw_discount_percentage
        ]);
        $this->products()->sync($request->products);
    }
    public function active_type(){
        if ($this->promotion_type == 'percent') {
            $icon_1 ='fa-check';
            $icon_2 = 'fa-times';
        } elseif ($this->promotion_type == 'fixed_amount'){
            $icon_1 ='fa-times';      
            $icon_2 = 'fa-check';
        }
        
        return [
            'icon_1' =>$icon_1,
            'icon_2' =>$icon_2,
        ];                         
    }
}
