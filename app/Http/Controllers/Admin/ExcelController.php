<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\Tariff;
use App\City;
use App\DepartureSchedule;

class ExcelController extends Controller
{
    /**
     * Преобразуем excel файл
     * @param string $name_file Название input, в котором наш файл с xmls
     * @return array
     */
    public static function importExcel($name_file = 'file')
    {
        $file = Input::file($name_file);
        if (Input::hasFile($name_file)) {
            $file_name = $file->getClientOriginalName();

            $file->move('files', $file_name);
            $result = Excel::load('files/'.$file_name, function($reader){
                $reader->all();
            })->get();
           return $result;
        }
    }

    public static function addTariffsReferrals($name_file = 'file')
    {
        $data = self::importExcel($name_file);
        $title = mb_strtolower($data->getTitle());
        $dataInsert = [];
        foreach ($data->toArray() as $valueItem)
        {
            if ($valueItem["tarif_za_1_kg"] != null || $valueItem["tarifza_1_m3_s_nds"] != null)
            {
                $departure_city = City::createDepartureCity( $title);
                $city_destination = City::createCityReceipt($valueItem["gorod_naznacheniya"]);
                $valueInsert['departure_city'] = (int) $departure_city->id;
                $valueInsert['city_destination'] = (int) $city_destination->id;
                $valueInsert['type_transport'] = mb_strtolower($valueItem["tip_transporta"]);
                $valueInsert['cost_mass'] = $valueItem["tarif_za_1_kg"];
                $valueInsert['cost_volume'] = $valueItem["tarifza_1_m3_s_nds"];
                $dataInsert[] = $valueInsert;
            }
        }

        Tariff::where('departure_city', $title)->delete();
        $result = Tariff::insert($dataInsert);
        if ($result)
        {
            return mb_convert_case($title, MB_CASE_TITLE, "UTF-8");
        }
        return $result;
    }

    public static function addCity ($name_file = 'file')
    {
        $data = self::importExcel($name_file);
        $dataArray = $data->toArray();
        foreach ($dataArray[0] as $itemDepartureCity)
        {
            $return[0][] = City::createDepartureCity($itemDepartureCity["nazvanie_goroda"]);
        }
        foreach ($dataArray[1] as $itemCityReceipt)
        {
            $return[1][] =City::createCityReceipt($itemCityReceipt["nazvanie_goroda"]);
        }
        return $return;
    }

    public static function addDepartureSchedule ($name_file = 'file')
    {
        $data = self::importExcel($name_file);
        $dataArray = $data->toArray();
        foreach ($dataArray as $valueItem)
        {
            if ($valueItem['data_polucheniya'] != null)
            {
                $departure_city = City::createDepartureCity( $valueItem["gorod_otpravleniya"]);
                $city_destination = City::createCityReceipt($valueItem["gorod_polucheniya"]);
                $valueInsert['number_departure'] = (int) $valueItem['por.nomer.otprav'];
                $valueInsert['date'] = $valueItem["data"]->toDateString();
                $valueInsert['data_delivery'] = $valueItem["mesto_sdachi"];
                $valueInsert['receipt_data'] = $valueItem["data_polucheniya"]->toDateTimeString();
                $valueInsert['departure_city'] = $departure_city->id;
                $valueInsert['city_receipt'] = $city_destination->id;
                DepartureSchedule::create($valueInsert);
            }
        }
        return $data->getTitle();
    }
}
