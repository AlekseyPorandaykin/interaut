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
            ->where('bids.bid_status_id', 2)
            ->get();
    }
    public static function getEndBidsUser ($userId)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->where('bids.bid_status_id', 3)
            ->get();
    }


    public static function getBidsUserPeriod ($userId, $period, $status)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->whereIn('bids.bid_status_id', $status)
            ->where('bids.created_at', '>=', $period)
            ->get();
    }

    public static function getBidsUserPeriodDate ($userId, $data_start, $data_end, $status)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->whereIn('bids.bid_status_id', $status)
            ->where('bids.created_at', '>=', $data_start)
            ->where('bids.created_at', '<=', $data_end)
            ->get();
    }
    public static function getBidsUserOnCity ($userId, $departure_city, $city_receipt, $status)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name')
            ->where('user_id', $userId)
            ->whereIn('bids.bid_status_id', $status)
            ->where('bids.departure_city',  $departure_city)
            ->where('bids.city_receipt', $city_receipt)
            ->get();
    }

    public static function getBidsOnIds ($arrayIds)
    {
        return Bid::join('bid_statuses', 'bids.bid_status_id', '=', 'bid_statuses.id')
            ->select('bids.*', 'bid_statuses.bid_name as status_name')
            ->whereIn('bids.id', $arrayIds)
            ->get();
    }
}
