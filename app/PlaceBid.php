<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceBid extends Model
{
    protected $fillable = ['weight', 'scope', 'rate', 'assessed_value', 'packing_type_id', 'bid_id'];

    public static function getPlacesOneBid ($bidId)
    {
        $result = ['weight' => 0, 'scope' => 0, 'assessed_value' => 0];
        $query = PlaceBid::where('bid_id', $bidId)->get();
        foreach ($query as $valItem)
        {
            $result['weight'] += $valItem['weight'];
            $result['scope'] += $valItem['scope'];
            $result['assessed_value'] += $valItem['assessed_value'];
        }
        $result['count_place'] = count($query);
        return $result;
    }
}
