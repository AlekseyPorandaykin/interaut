<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';
    protected $fillable = ['consignment_number', 'departure_city', 'city_receipt', 'date_delivery', 'recipient', 'address', 'phone', 'bid_status_id'];
}
