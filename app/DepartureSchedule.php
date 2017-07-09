<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartureSchedule extends Model
{
    protected $table = 'departure_schedule';
    protected $fillable = ['number_departure', 'date', 'data_delivery', 'receipt_data', 'departure_city', 'city_receipt'];
}
