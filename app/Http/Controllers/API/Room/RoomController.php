<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Roomstatus;

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
            'Name' => 'required|nullable',
            'Description' => 'nullable',

            'InterComNumber' => 'nullable',
            'Property' => 'nullable',
            'RoomStatus' => 'nullable',
            'RoomType' => 'nullable', //REQUIRED ADD LATER
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
    public function show(Room $id)
    {
        return response($id,200);
    }

    public function showAll(Request $req)
    {
        if($req->has('page') && $req->has('perpage')){
            return response(Room::paginate($req->perpage,['*'],'page',$req->page),200);
        }

        elseif($req->has('page')){
            return response(Room::paginate(15,['*'],'page',$req->page),200);;
        }

        elseif($req->has('perpage')){
            return response(Room::paginate($req->perpage,['*'],'page',1),200);
        }
        else{
            return response(Room::paginate(15));
        }
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
            'Name' => 'required|nullable',
            'Description' => 'nullable',

            'InterComNumber' => 'nullable',
            'Property' => 'nullable',
            'RoomStatus' => 'nullable',
            'RoomType' => 'nullable', //REQIORED ADD LATER
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

    public function findByStatus($id){
        $statusid = $id;
        $rooms = Room::where('RoomStatus','=',$statusid)->get();
        return response($rooms, 200);
    }

    public function findByStatusName($name){
        $statusname = $name;
        $rooms = Roomstatus::where('Name','=',$statusname)->with('rooms')->get();
        return response($rooms,200);
    }

    public function changeStatus(Room $room, $roomstatus){
        $room->RoomStatus = $roomstatus;
        return response($room,200);
    }
}
