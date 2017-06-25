<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceBid extends Model
{
    protected $fillable = ['weight', 'scope', 'rate', 'assessed_value', 'packing_type_id', 'bid_id'];
}
