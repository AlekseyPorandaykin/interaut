<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariffs';
    protected $fillable = ['departure_city', 'city_destination', 'type_transport', 'cost_mass', 'cost_volume', 'created_at', 'updated_at'];

}
