<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Room::all(), 200);
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

            'InterComNumber' => 'nullable',
            'Property' => 'nullable',
            'RoomStatus' => 'nullable',
            'RoomType' => 'nullable',
            'Floor' => 'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        $room =new Room();
        $room->isActive = $validated['isActive'];
        $room->PropertyID = $validated['PropertyID'];
        $room->CreatedBy = $validated['CreatedBy'];
        $room->CreatedDate = Carbon::now()->toDateTimeString();
        $room->LastUpdatedBy = $validated['LastUpdatedBy'];
        $room->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $room->CreatedByName = $validated['CreatedByName'];
        $room->LastUpdatedByName = $validated['LastUpdatedByName'];
        $room->SortKey = $validated['SortKey'];

        $room->Alias = $validated['Alias'];
        $room->Name = $validated['Name'];
        $room->Description = $validated['Description'];

        $room->InterComNumber = $validated['InterComNumber'];
        $room->Property = $validated['Property'];
        $room->RoomStatus = $validated['RoomStatus'];
        $room->RoomType = $validated['RoomType'];
        $room->Floor = $validated['Floor'];
        
        $room->OptimisticLockField = $validated['OptimisticLockField'];
        $room->GCRecord = $validated['GCRecord'];
        $room->save();

        return response($room->refresh(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Room $room)
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

            'InterComNumber' => 'nullable',
            'Property' => 'nullable',
            'RoomStatus' => 'nullable',
            'RoomType' => 'nullable',
            'Floor' => 'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        $room->isActive = $validated['isActive'];
        $room->PropertyID = $validated['PropertyID'];
        $room->CreatedBy = $validated['CreatedBy'];
        $room->LastUpdatedBy = $validated['LastUpdatedBy'];
        $room->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $room->CreatedByName = $validated['CreatedByName'];
        $room->LastUpdatedByName = $validated['LastUpdatedByName'];
        $room->SortKey = $validated['SortKey'];

        $room->Alias = $validated['Alias'];
        $room->Name = $validated['Name'];
        $room->Description = $validated['Description'];

        $room->InterComNumber = $validated['InterComNumber'];
        $room->Property = $validated['Property'];
        $room->RoomStatus = $validated['RoomStatus'];
        $room->RoomType = $validated['RoomType'];
        $room->Floor = $validated['Floor'];
        
        $room->OptimisticLockField = $validated['OptimisticLockField'];
        $room->GCRecord = $validated['GCRecord'];
        $room->save();

        return response($room->refresh(), 200);
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
    public function destroy(Room $room)
    {
        return response($room->delete(), 200);
    }
}
