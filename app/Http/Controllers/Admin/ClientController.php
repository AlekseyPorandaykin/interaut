<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function index (){
        return view('admin-pages.clients.index');
    }


    public function create (){
        return view('admin-pages.clients.create');
    }

    public function save (Request $request){
        $dataClient = $request->all();
        Client::create($dataClient);
        return redirect('/admin/clients');
    }

}
