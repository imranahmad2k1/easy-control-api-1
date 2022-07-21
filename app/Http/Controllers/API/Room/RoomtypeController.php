<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roomtype;
use Carbon\Carbon;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Roomtype::all(),200);
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

            'Alias' => 'nullable',
            'Name' => 'nullable',
            'Description' => 'nullable',

            'NoOfBaseAdults' => 'integer|nullable',
            'NoOfBaseChilds' => 'integer|nullable',
            'NoOfMaxAdults' => 'integer|nullable',
            'NoOfMaxChilds' => 'integer|nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomtype = new Roomtype();
        $roomtype->isActive = $validated['isActive'];
        $roomtype->PropertyID = $validated['PropertyID'];
        $roomtype->CreatedBy = $validated['CreatedBy'];
        $roomtype->CreatedDate = Carbon::now()->toDateTimeString();
        $roomtype->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomtype->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomtype->CreatedByName = $validated['CreatedByName'];
        $roomtype->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomtype->SortKey = $validated['SortKey'];

        $roomtype->Alias = $validated['Alias'];
        $roomtype->Name = $validated['Name'];
        $roomtype->Description = $validated['Description'];

        $roomtype->NoOfBaseAdults = $validated['NoOfBaseAdults'];
        $roomtype->NoOfBaseAdults = $validated['NoOfBaseChilds'];
        $roomtype->NoOfMaxAdults = $validated['NoOfMaxAdults'];
        $roomtype->NoOfMaxChilds = $validated['NoOfMaxChilds'];
        
        $roomtype->OptimisticLockField = $validated['OptimisticLockField'];
        $roomtype->GCRecord = $validated['GCRecord'];
        $roomtype->save();

        return response($roomtype->refresh(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Roomtype $roomtype)
    {
        $validated = $this->validate($request, [
            'isActive' => 'integer|nullable',
            'PropertyID' => 'integer|nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' => 'integer|nullable',

            'Alias' => 'nullable',
            'Name' => 'nullable',
            'Description' => 'nullable',

            'NoOfBaseAdults' => 'integer|nullable',
            'NoOfBaseChilds' => 'integer|nullable',
            'NoOfMaxAdults' => 'integer|nullable',
            'NoOfMaxChilds' => 'integer|nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomtype->isActive = $validated['isActive'];
        $roomtype->PropertyID = $validated['PropertyID'];
        $roomtype->CreatedBy = $validated['CreatedBy'];
        $roomtype->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomtype->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomtype->CreatedByName = $validated['CreatedByName'];
        $roomtype->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomtype->SortKey = $validated['SortKey'];

        $roomtype->Alias = $validated['Alias'];
        $roomtype->Name = $validated['Name'];
        $roomtype->Description = $validated['Description'];

        $roomtype->NoOfBaseAdults = $validated['NoOfBaseAdults'];
        $roomtype->NoOfBaseAdults = $validated['NoOfBaseChilds'];
        $roomtype->NoOfMaxAdults = $validated['NoOfMaxAdults'];
        $roomtype->NoOfMaxChilds = $validated['NoOfMaxChilds'];
        
        $roomtype->OptimisticLockField = $validated['OptimisticLockField'];
        $roomtype->GCRecord = $validated['GCRecord'];
        $roomtype->save();

        return response($roomtype->refresh(),200);
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
    public function destroy(Roomtype $roomtype)
    {
        return response($roomtype->delete(),200);
    }
}
