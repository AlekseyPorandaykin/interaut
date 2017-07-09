<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\Tariff;

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

    public static function addDepartureSchedule($name_file = 'file')
    {
        $data = self::importExcel($name_file);
        $title = mb_strtolower($data->getTitle());
        $dataInsert = [];
        foreach ($data->toArray() as $valueItem)
        {
            if ($valueItem["tarif_za_1_kg"] != null || $valueItem["tarifza_1_m3_s_nds"] != null)
            {
                $valueInsert['departure_city'] = $title;
                $valueInsert['city_destination'] = mb_strtolower($valueItem["gorod_naznacheniya"]);
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
}
