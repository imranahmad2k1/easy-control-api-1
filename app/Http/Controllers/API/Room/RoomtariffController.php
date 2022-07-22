<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roomtariff;
use Carbon\Carbon;

class RoomtariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Roomtariff::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'isActive' => 'integer|nullable',
            'PropertyID' => 'integer|nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' => 'integer|nullable',

            'Name'=>'nullable',
            'Tariff'=>'nullable',
            'ExtraAdults'=>'nullable',
            'ExtraChilds'=>'nullable',
            'IsBusinessSourceRate'=>'nullable',
            'RoomType'=>'nullable',
            'RateType'=>'nullable',
            'MarketPlace'=>'nullable',
            'BusinessSource'=>'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomtariff = new Roomtariff();
        $roomtariff->isActive = $validated['isActive'];
        $roomtariff->PropertyID = $validated['PropertyID'];
        $roomtariff->CreatedBy = $validated['CreatedBy'];
        $roomtariff->CreatedDate = Carbon::now()->toDateTimeString();
        $roomtariff->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomtariff->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomtariff->CreatedByName = $validated['CreatedByName'];
        $roomtariff->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomtariff->SortKey = $validated['SortKey'];

        $roomtariff->Name=$validated['Name'];
        $roomtariff->Tariff=$validated['Tariff'];
        $roomtariff->ExtraAdults=$validated['ExtraAdults'];
        $roomtariff->ExtraChilds=$validated['ExtraChilds'];
        $roomtariff->IsBusinessSourceRate=$validated['IsBusinessSourceRate'];
        $roomtariff->RoomType=$validated['RoomType'];
        $roomtariff->RateType=$validated['RateType'];
        $roomtariff->MarketPlace=$validated['MarketPlace'];
        $roomtariff->BusinessSource=$validated['BusinessSource'];
        
        $roomtariff->OptimisticLockField = $validated['OptimisticLockField'];
        $roomtariff->GCRecord = $validated['GCRecord'];
        $roomtariff->save();

        return response($roomtariff->refresh(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Roomtariff $id)
    {
        return response($id, 200);
    }

    public function showAll(Request $req)
    {
        if($req->has('page') && $req->has('perpage')){
            return response(Roomtariff::paginate($req->perpage,['*'],'page',$req->page),200);
        }

        elseif($req->has('page')){
            return response(Roomtariff::paginate(15,['*'],'page',$req->page),200);;
        }

        elseif($req->has('perpage')){
            return response(Roomtariff::paginate($req->perpage,['*'],'page',1),200);
        }
        else{
            return response(Roomtariff::paginate(15));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Roomtariff $roomtariff)
    {
        $validated = $this->validate($request, [
            'isActive' => 'integer|nullable',
            'PropertyID' => 'integer|nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' => 'integer|nullable',

            'Name'=>'nullable',
            'Tariff'=>'nullable',
            'ExtraAdults'=>'nullable',
            'ExtraChilds'=>'nullable',
            'IsBusinessSourceRate'=>'nullable',
            'RoomType'=>'nullable',
            'RateType'=>'nullable',
            'MarketPlace'=>'nullable',
            'BusinessSource'=>'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomtariff->isActive = $validated['isActive'];
        $roomtariff->PropertyID = $validated['PropertyID'];
        $roomtariff->CreatedBy = $validated['CreatedBy'];
        $roomtariff->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomtariff->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomtariff->CreatedByName = $validated['CreatedByName'];
        $roomtariff->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomtariff->SortKey = $validated['SortKey'];

        $roomtariff->Name=$validated['Name'];
        $roomtariff->Tariff=$validated['Tariff'];
        $roomtariff->ExtraAdults=$validated['ExtraAdults'];
        $roomtariff->ExtraChilds=$validated['ExtraChilds'];
        $roomtariff->IsBusinessSourceRate=$validated['IsBusinessSourceRate'];
        $roomtariff->RoomType=$validated['RoomType'];
        $roomtariff->RateType=$validated['RateType'];
        $roomtariff->MarketPlace=$validated['MarketPlace'];
        $roomtariff->BusinessSource=$validated['BusinessSource'];
        
        $roomtariff->OptimisticLockField = $validated['OptimisticLockField'];
        $roomtariff->GCRecord = $validated['GCRecord'];
        $roomtariff->save();

        return response($roomtariff->refresh(),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roomtariff $roomtariff)
    {
        return response($roomtariff->delete(), 200);
    }
}
