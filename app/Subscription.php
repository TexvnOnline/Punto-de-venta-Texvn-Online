<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
    ];
    public function getAvatarAttribute(){
        $email = md5($this->email);
        return "https://s.gravatar.com/avatar/$email";
    }
    public function validation_status(){
        return 'falta';
    }
}
