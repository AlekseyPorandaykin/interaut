<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Resource;
use App\City;
use App\Bid;
use App\PlaceBid;
use Auth;
use App\BidStatus;

class BidController extends Controller
{
    /**
     * Форма создания заявки
     * @param Request $request
     */
    public function newBid(Request $request)
    {
        $departureCity = City::getDepartureCity();
        $receiptCity = City::getReceiptCity();
        return view('admin-pages.bids.add-bid', ['departureCity' => $departureCity, 'receiptCity' => $receiptCity]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'date_delivery' => 'required',
            'departure_city' => 'required',
            'city_receipt' => 'required',
            'recipient_name' => 'required',
            'recipient_address' => 'required',
            'recipient_phone' => 'required',
        ]);
        $data = $request->all();
        $data['bid_status_id'] = 1;
        $data['user_id'] = Auth::user()->id;
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
        return response()->view('admin-pages.bids.formation-documents', ['id_bid'=>$result->id]);
    }

    public function show()
    {
        $data = Bid::getBidsUser(Auth::user()->id);
        return view('admin-pages.bids.show', ['data' => $data]);
    }
    public function showNowBids()
    {
        $data = Bid::getNowBidsUser(Auth::user()->id);
        return view('admin-pages.bids.show', ['data' => $data]);
    }
    public function edit(Request $request)
    {
        $data = Bid::find($request->id);
        $statusBids = BidStatus::get();
        return view('admin-pages.bids.edit', ['data' => $data, 'statusBids' => $statusBids]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        Bid::where('id', $request->id)
            ->update(['bid_status_id' => $data['bid_status_id'], 'date_receiving' => $data['date_receiving'], 'recipient_comments' => $data['recipient_comments']]);
        return redirect()->route('bids');
    }
}
