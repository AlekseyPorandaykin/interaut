<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class DepartureSchedule extends Model
{
    protected $table = 'departure_schedule';
    protected $fillable = ['number_departure', 'date', 'data_delivery', 'receipt_data', 'departure_city', 'city_receipt'];

    public static function getDepartureSchedule ($departureCity ,$cityReceipt)
    {
        $items = DB::table('departure_schedule')
            ->where('departure_city', $departureCity)
            ->where('city_receipt',$cityReceipt)
            ->get();
        return $items;
    }
}