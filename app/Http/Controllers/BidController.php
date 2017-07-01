<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Bid;
use App\PlaceBid;
use Cookie;
use PDF;
use Illuminate\Http\Response;

class BidController extends Controller
{
    public function addPlaceBid (Request $request)
    {
        $number = (int) $request->number;
        return view('front-pages.bids.table-place-bid', ["number"=> $number]);
    }
    public function addBid (Request $request)
    {
        $this->validate($request, [
            'departure_city' => 'required',
            'city_receipt' => 'required',
            'recipient' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->all();
        $data['bid_status_id'] = 1;
        $result = Bid::create($data);
        $data_packing = [];
        if (!empty($data['packing_type']))
        {
            foreach ($data['packing_type'] as $keyPacking=>$valuePacking)
            {
                $data['weight'] = str_replace(",",".",$data['weight']);
                $data['scope'] = str_replace(",",".",$data['scope']);
                $data_packing[$keyPacking]['packing_type_id'] = $valuePacking;
                $data_packing[$keyPacking]['weight'] = (!empty($data['weight'][$keyPacking])?$data['weight'][$keyPacking]:0);
                $data_packing[$keyPacking]['scope'] = (!empty($data['scope'][$keyPacking])?$data['scope'][$keyPacking]:0);
                $data_packing[$keyPacking]['assessed_value'] = (!empty($data['assessed_value'][$keyPacking])?$data['assessed_value'][$keyPacking]:0);
                $data_packing[$keyPacking]['rate'] = (!empty($data['rate'][$keyPacking])?$data['rate'][$keyPacking]:0);
                $data_packing[$keyPacking]['bid_id'] = $result->id;
                PlaceBid::create($data_packing[$keyPacking]);
            }
        }
        return redirect('formation-documents/'.$result->id)->cookie('recipient', $data["recipient"])->cookie('address', $data["address"])->cookie('phone', $data["phone"]);

//        return response()->view('front-pages.bids.formation-documents', ['result'=>$result])->cookie('recipient', $data["recipient"])->cookie('address', $data["address"])->cookie('phone', $data["phone"]);

    }
    public function formationDocument(Request $request)
    {
        return response()->view('front-pages.bids.formation-documents', ['id_bid'=>$request->id]);
    }

    public function getDocument (Request $request)
    {
        $idBid = (int) $request->id;
        $data = Bid::find($idBid);
        $places = PlaceBid::where('bid_id', $idBid)->get();
        $totalPlacesData = ["weight" => 0, "scope" => 0];
        foreach ($places as $place)
        {
            $totalPlacesData["weight"] += $place["weight"];
            $totalPlacesData["scope"] += $place["scope"];
        }
//        dd($totalPlacesData);
//        return view('front-pages.bids.documents.'.$request->type, ["data" => $data,  'places'=> $places]);
        $format = 'A4';
        if ($request->type == 'bullet-list')
        {
            $format = 'A4-L';
        }
        $pdf = PDF::loadView('front-pages.bids.documents.'.$request->type, ["data" => $data, 'places'=> $places, 'totalPlacesData' => $totalPlacesData],[], ['format'=> $format,]);
        return $pdf->stream($request->type.'.pdf');
    }
}
