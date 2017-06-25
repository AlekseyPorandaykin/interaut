<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function mainPage ()
    {
        return view('front-pages.main', ['recipient' => Cookie::get('recipient'), 'address' => Cookie::get('address'), 'phone' => Cookie::get('phone')]);
    }
}
