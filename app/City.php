<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['name', 'departure_city', 'city_receipt', 'updated_at', 'created_at'];
    public static function getDepartureCity ()
    {
        $result = DB::table('city')
            ->select('*')
            ->where([
                ['departure_city', '=', 1]
            ])->get();
        foreach ($result as &$itemVal)
        {
            $itemVal->name = mb_convert_case($itemVal->name, MB_CASE_TITLE, "UTF-8");
        }
        return $result;
    }
    public static function getReceiptCity ()
    {
        $result = DB::table('city')
            ->select('*')
            ->where([
                ['city_receipt', '=', 1]
            ])->get();
        foreach ($result as &$itemVal)
        {
            $itemVal->name = mb_convert_case($itemVal->name, MB_CASE_TITLE, "UTF-8");
        }
        return $result;
    }
    public static function createDepartureCity ($name)
    {
        $nameCity = mb_strtolower($name);
        $data = City::where('name', $nameCity)->first();
        if ($data == null)
        {
            return City::create(['name' => $nameCity, 'departure_city' => 1]);
        }
        return $data;
    }

    public static function createCityReceipt ($name)
    {
        $nameCity = mb_strtolower($name);
        $data = City::where('name', $nameCity)->first();
        if ($data == null)
        {
            return City::create(['name' => $nameCity, 'city_receipt' => 1]);
        }
        return $data;
    }
    public static function getNameCity ($id)
    {
        $name = DB::table('city')
            ->find($id)
            ->name;
        return mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    }
}
