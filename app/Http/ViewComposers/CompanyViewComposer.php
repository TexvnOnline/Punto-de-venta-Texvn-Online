<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Business;

class CompanyViewComposer{
    public function compose(View $view){
        $web_company = Business::where('id', 1)
        ->firstOrFail([
            'email',
            'address',
            'phone',
            'google_maps_link'
        ]);
        $view->with (['web_company' => $web_company]);
    }
}

