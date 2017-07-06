<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{

    public function index()
    {
        return view('admin-pages.import.index');
    }
    public function departureSchedule(Request $request)
    {
        dd($request->all());
    }
}
