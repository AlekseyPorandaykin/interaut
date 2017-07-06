<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model
{
    protected $table = 'city';
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
}
