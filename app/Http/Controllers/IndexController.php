<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;
use App\City;

class IndexController extends Controller
{
    public function mainPage ()
    {
        $departureCity = City::getDepartureCity();
        $receiptCity = City::getReceiptCity();
        return view('front-pages.main', ['recipient_name' => Cookie::get('recipient_name'), 'recipient_address' => Cookie::get('recipient_address'), 'recipient_phone' => Cookie::get('recipient_phone'), 'departureCity' => $departureCity, 'receiptCity' => $receiptCity]);
    }
}
