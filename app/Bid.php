<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';
    protected $fillable = ['consignment_number', 'departure_city', 'city_receipt', 'date_delivery', 'sender_name', 'sender_phone', 'sender_address', 'recipient_name', 'recipient_name', 'recipient_phone', 'recipient_address', 'bid_status_id', 'user_id', 'date_receiving', 'recipient_comments'];

    public static function getBidsUser ($userId)
    {
         return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->get();
    }
    public static function getNowBidsUser ($userId)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->where('bids.bid_status_id', 1)
            ->get();
    }
}
