<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function store(Request $request){
        Mail::Send('emails.contact', $request->all(), function($smj){
            $smj->subject('Correo de Contacto');
            $smj->to('berserkersex@gmail.com');
        });
        Session::flash('message', 'Mensaje enviado correctamente');
        return redirect()->route('web.contact_us');
    }
}
