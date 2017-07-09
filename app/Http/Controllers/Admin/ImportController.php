<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ExcelController;
use Session;

class ImportController extends Controller
{

    public function index()
    {
        return view('admin-pages.import.index');
    }
    public function departureSchedule(Request $request)
    {
        if ($request->hasFile('schedule')) {
            $addDepartureSchedule = ExcelController::addDepartureSchedule('schedule');
            if ($addDepartureSchedule)
            {
                Session::flash('flash_message', 'Данные расписания отправлений для города '.$addDepartureSchedule.' были успешно загружены');
            }
            else {
                Session::flash('flash_message', 'Данные расписания отправлений не были загружены');
            }
        }
        return redirect('admin/import');
    }
}
