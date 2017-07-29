<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Resource;
use App\City;
use App\Bid;
use App\PlaceBid;
use Auth;
use App\BidStatus;
use App\DepartureSchedule;
use PDF;
use Excel;


class BidController extends Controller
{
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

    public function show(Request $request)
    {
        $result = $this->getDataForShow($request, $status = [1,2,3,4]);
        if (empty($result['data']))
        {
            $result['data'] = Bid::getBidsUser(Auth::user()->id);
        }
        foreach ($result['data'] as &$valItem)
        {
            $valItem['departure_city'] = City::getNameCity($valItem['departure_city']);
            $valItem['city_receipt'] = City::getNameCity($valItem['city_receipt']);
            $valItem['places'] = PlaceBid::getPlacesOneBid($valItem['id']);
        }
        return view('admin-pages.bids.show', ['data' => $result['data'], 'departureCity' => $result['departureCity'], 'receiptCity' => $result['receiptCity'], 'dataRequest' => $request->all()]);
    }
    public function showNowBids(Request $request)
    {
        $result = $this->getDataForShow($request, [2]);
        if (empty($result['data']))
        {
            $result['data'] = Bid::getNowBidsUser(Auth::user()->id);
        }
        foreach ($result['data'] as &$valItem)
        {
            $valItem['departure_city'] = City::getNameCity($valItem['departure_city']);
            $valItem['city_receipt'] = City::getNameCity($valItem['city_receipt']);
            $valItem['places'] = PlaceBid::getPlacesOneBid($valItem['id']);
        }
        return view('admin-pages.bids.now-bids-show', ['data' => $result['data'], 'departureCity' => $result['departureCity'], 'receiptCity' => $result['receiptCity'], 'dataRequest' => $request->all()]);
    }
    public function edit(Request $request)
    {
        $data = Bid::find($request->id);
        $statusBids = BidStatus::get();
        $places = PlaceBid::where('bid_id', $request->id)->get();
        $weight = 0;
        $scope = 0;
        foreach ($places as $place)
        {
            $weight += $place->weight;
            $scope += $place->scope;
        }
        return view('admin-pages.bids.edit', ['data' => $data, 'statusBids' => $statusBids, 'weight' => $weight, 'scope' => $scope, 'allPlace' => count($places)]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        Bid::where('id', $request->id)
            ->update(['bid_status_id' => $data['bid_status_id'], 'date_receiving' => $data['date_receiving'], 'recipient_comments' => $data['recipient_comments']]);
        return redirect()->route('bids');
    }
    public function getDepartureSchedule (Request $request)
    {
        $data = $request->all();
        $departureSchedule = DepartureSchedule::getDepartureSchedule($data['departure'], $data['receipt']);
        $departureCity = City::find($data['departure']);
        $cityReceipt = City::find($data['receipt']);
        return view('admin-pages.parts.departure-schedule', ['departureSchedule' => $departureSchedule, 'departureCity' => mb_convert_case($departureCity->name, MB_CASE_TITLE, "UTF-8"), 'cityReceipt' => mb_convert_case($cityReceipt->name, MB_CASE_TITLE, "UTF-8")]);
    }
    public function showEndBids (Request $request)
    {
        $result = $this->getDataForShow($request, [3]);
        if (empty($result['data']))
        {
            $result['data'] = Bid::getEndBidsUser(Auth::user()->id);
        }
        foreach ($result['data'] as &$valItem)
        {
            $valItem['departure_city'] = City::getNameCity($valItem['departure_city']);
            $valItem['city_receipt'] = City::getNameCity($valItem['city_receipt']);
            $valItem['places'] = PlaceBid::getPlacesOneBid($valItem['id']);
        }
        return view('admin-pages.bids.end-bids-show', ['data' => $result['data'], 'departureCity' => $result['departureCity'], 'receiptCity' => $result['receiptCity'], 'dataRequest' => $request->all()]);
    }

    private function getDataForShow (Request $request, $status)
    {
        if (!empty($request->period) )
        {
            $period = Carbon::minValue();
            if ($request->period == "week")
            {
                $period = Carbon::now()->startOfWeek();
            }
            elseif ($request->period == "month")
            {
                $period = Carbon::now()->startOfMonth();
            }
            elseif ($request->period == "year")
            {
                $period = Carbon::now()->startOfYear();
            }
            $data = Bid::getBidsUserPeriod(Auth::user()->id, $period, $status);
        }
        elseif(!empty($request->action_button))
        {
            if ($request->action_button == "date")
            {
                $data_start = (!empty($request->date_start)? Carbon::createFromFormat('d.m.y', $request->date_start): Carbon::minValue());
                $data_end = (!empty($request->date_end)? Carbon::createFromFormat('d.m.y', $request->date_end): Carbon::now());
                $data = Bid::getBidsUserPeriodDate(Auth::user()->id, $data_start, $data_end, $status);
            }
            elseif ($request->action_button == "city")
            {
                $data = Bid::getBidsUserOnCity(Auth::user()->id, $request->departure_city, $request->city_receipt, $status);
            }
        }
        $departureCity = City::getDepartureCity();
        $receiptCity = City::getReceiptCity();

        $result = [ 'departureCity' => $departureCity, 'receiptCity' => $receiptCity];
        if (!empty($data))
        {
            $result['data'] = $data;
        }

        return $result;
    }

    public function createReport (Request $request)
    {
        $reportData = $request->reportData;
        $dataBids = Bid::getBidsOnIds($reportData);
        $totalData = ['totalWeight' => 0, 'totalScope' => 0, 'totalAssessedValue' => 0, 'totalCountPlace' =>0];
        foreach ($dataBids as &$valBidItem)
        {
            $valBidItem['places'] = PlaceBid::getPlacesOneBid($valBidItem->id);
            $valBidItem['departure_city'] = City::getNameCity($valBidItem['departure_city']);
            $valBidItem['city_receipt'] = City::getNameCity($valBidItem['city_receipt']);
            $valBidItem['created_bid'] = date("d.m.Y", strtotime($valBidItem['created_at']));
            $totalData["totalWeight"] +=  $valBidItem->places["weight"];
            $totalData["totalCountPlace"] +=  $valBidItem->places["count_place"];
            $totalData["totalScope"] +=  $valBidItem->places["scope"];
            $totalData["totalAssessedValue"] += $valBidItem->places["assessed_value"];
        }
        if ($request->action_report == "report")
        {
//            return view('front-pages.bids.documents.report', ["dataBids" => $dataBids, 'totalData' => $totalData]);
            return Excel::create('report-'.date('d.m.Y'), function($excel) use ($dataBids, $totalData) {
               $excel->sheet('report', function ($sheet) use ($dataBids, $totalData){
                   $countDataBods = count($dataBids)+1;
                   $sheet->setStyle(array(
                       'font' => array(
                           'name'      =>  'Calibri',
                           'size'      =>  11
                       )
                   ));
                   $sheet->setWidth('A', 4);
                   $sheet->setWidth('B', 13);
                   $sheet->setWidth('C', 8.43);
                   $sheet->setWidth('D', 9);
                   $sheet->setWidth('E', 14.14);
                   $sheet->setWidth('F', 24.29);
                   $sheet->setWidth('G', 6,71);
                   $sheet->setWidth('H', 9);
                   $sheet->setWidth('I', 7.43);
                   $sheet->setWidth('J', 7.43);
                   $sheet->setWidth('K', 10.43);
                   $sheet->setWidth('L', 7.43);
                   $sheet->mergeCells('D4:H4');
                   $sheet->cell('D3:I4', function($cell) {
                       $cell->setFont(array(
                           'family'     => 'Times New Roman',
                           'size'       => '14'
                       ));
                   });
                   $sheet->cell('A18:L'.(18+$countDataBods), function($cell) {
                       $cell->setAlignment('center');
                       $cell->setValignment('center');
                       $cell->setFont(array(
                           'family'     => 'Times New Roman',
                           'size'       => '8',
                           'bold'       => true
                       ));
                   });
                   $sheet->cell('A18:L'.(18+$countDataBods), function($cell) {
                       $cell->setFont(array(
                           'family'     => 'Times New Roman',
                           'size'       => '8',
                           'bold'       => true
                       ));
                   });
                   $sheet->mergeCells('A5:B5');
                   $sheet->mergeCells('A9:L15');
                   $sheet->getStyle('A1:L50')->getAlignment()->setWrapText(true);
                   $sheet->setBorder('A18:L'.(18+$countDataBods), 'thin');



                   $sheet->loadView('front-pages.bids.documents.report', ["dataBids" => $dataBids, 'totalData' => $totalData]);
               });
            })->export('xls');
        }
        elseif ($request->action_report == "app")
        {
//            return view('front-pages.bids.documents.app', ["dataBids" => $dataBids, 'totalData' => $totalData]);
            return Excel::create('atc-'.date('d.m.Y'), function($excel) use ($dataBids, $totalData) {
                $excel->sheet('atc', function ($sheet) use ($dataBids, $totalData){

                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  10
                        )
                    ));
                    $sheet->getStyle('A1:L50')->getAlignment()->setWrapText(true);
                    $sheet->setWidth('A', 3);
                    $sheet->setWidth('B', 6);
                    $sheet->setWidth('C', 22);
                    $sheet->setWidth('D', 21);
                    $sheet->setWidth('E', 19);
                    $sheet->setWidth('F', 29);
                    $sheet->setWidth('G', 18);
                    $sheet->setWidth('H', 17);
                    $sheet->setWidth('I', 16);
                    $sheet->setWidth('J', 12);
                    $sheet->setWidth('K', 10.43);
                    $sheet->mergeCells('A1:L1');
                    $sheet->setHeight(1, 23);
                    $sheet->cell('A1:L1', function($cell) {
                        $cell->setAlignment('center');
                        $cell->setValignment('center');
                        $cell->setFont(array(
                            'family'     => 'Times New Roman',
                            'size'       => '12',
                            'bold'       => true,
                            'italic'    => true
                        ));
                    });
                    $sheet->mergeCells('J4:K4');
                    $sheet->cell('J4:K4', function($cell) {
                        $cell->setAlignment('center');
                    });
                    $sheet->setHeight(6, 57);
                    $sheet->mergeCells('B6:K6');
                    $sheet->cell('B6:K6', function($cell) {
                        $cell->setValignment('center');
                    });
                    $sheet->mergeCells('B8:D8');
                    $sheet->cell('A11:K50', function($cell) {
                        $cell->setAlignment('center');
                        $cell->setValignment('center');
                        $cell->setFont(array(
                            'family'     => 'Times New Roman',
                            'size'       => '11',
                            'italic'       => true
                        ));
                    });

                    $countDataBods = count($dataBids)+1;
                    $sheet->setBorder('B11:K'.(11+$countDataBods), 'thin');
                    $sheet->cell('B'.(11+$countDataBods).':G'.(11+$countDataBods), function($cell) {
                        $cell->setFont(array(
                            'family'     => 'Times New Roman',
                            'size'       => '10',
                            'italic'       => true,
                            'bold'      => true
                        ));
                    });

                    $sheet->loadView('front-pages.bids.documents.app', ["dataBids" => $dataBids, 'totalData' => $totalData]);
                });
            })->export('xls');
        }
    }
}
