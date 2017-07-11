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
        $items = DB::table('city')
            ->select('*')
            ->where([
                ['departure_city', '=', 1]
            ])->get();
        return $items;
    }
    public static function getReceiptCity ()
    {
        $items = DB::table('city')
            ->select('*')
            ->where([
                ['city_receipt', '=', 1]
            ])->get();
        return $items;
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
}
