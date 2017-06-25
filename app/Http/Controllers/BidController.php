<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Bid;
use App\PlaceBid;
use Cookie;
use Barryvdh\DomPDF\PDF;
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
                $data_packing[$keyPacking]['packing_type_id'] = $valuePacking;
                $data_packing[$keyPacking]['weight'] = $data['weight'][$keyPacking];
                $data_packing[$keyPacking]['scope'] = $data['scope'][$keyPacking];
                $data_packing[$keyPacking]['assessed_value'] = $data['assessed_value'][$keyPacking];
                $data_packing[$keyPacking]['rate'] = $data['rate'][$keyPacking];
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

//        dd('front-pages.bids.documents.'.$request->type);
//        return view('front-pages.bids.documents.'.$request->type, ['data' => $data]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('front-pages.bids.documents.'.$request->type, ['data' => $data]);
        return $pdf->download($request->type.'.pdf');
    }
}
