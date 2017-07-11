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
    public function importCity (Request $request)
    {
        if ($request->hasFile('city')) {
            $addCity = ExcelController::addCity('city');
            if (count($addCity))
            {
                Session::flash('flash_message', 'Данные городов были успешно загружены');
            }
            else {
                Session::flash('flash_message', 'Данные городов не были загружены');
            }
        }
        return redirect('admin/import');
    }
    public function tariffsReferrals(Request $request)
    {
        if ($request->hasFile('tariffs')) {
            $addTariffsReferrals = ExcelController::addTariffsReferrals('tariffs');
            if ($addTariffsReferrals)
            {
                Session::flash('flash_message', 'Тарифы отправлений для города '.$addTariffsReferrals.' были успешно загружены');
            }
            else {
                Session::flash('flash_message', 'Тарифы отправлений не были загружены');
            }
        }
        return redirect('admin/import');
    }
}
