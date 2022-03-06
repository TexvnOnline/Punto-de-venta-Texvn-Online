<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SubscriptionEmailRequest;
use App\Post;
use App\Product;
use App\Subscription;
use App\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class WebController extends Controller
{
    public function about_us(){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>'sobre nosotros',
            ]
        ];
        return view('web.about_us', compact('breadcrumbs'));
    }
    public function cart(){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>'Cesta',
            ]
        ];
        return view('web.cart', compact('breadcrumbs'));
    }
    public function contact_us(){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>'Contáctenos',
            ]
        ];
    
        return view('web.contact_us', compact('breadcrumbs'));
    }
    public function login_register(){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>'Inicio de sesión',
            ]
        ];
        
        return view('web.login_register', compact('breadcrumbs'));
    }
   
    public function subscription_email(SubscriptionEmailRequest $request){
        Subscription::create([
            'email'=> $request->subscription_email
        ]);
        // return back()->with('mensaje', 'Se ha suscrito correctamente');
        return back()->with('toast_success', '¡Se ha suscrito con éxito!');
    }
    public function login_error(){
        // return redirect()->route('web.login_register')->with('login_messages', 'Es necesario iniciar sesión para escribir un comentario.');
        return redirect()->route('web.login_register')->with('toast_error ', '¡Es necesario iniciar sesión para realizar esta acción!');
    }
}
