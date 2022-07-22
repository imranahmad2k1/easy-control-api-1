<?php

namespace App\Http\Controllers\API\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roomstatus;
use Carbon\Carbon;

class RoomstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Roomstatus::all(), 200);
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
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomstatus = new Roomstatus();
        $roomstatus->isActive = $validated['isActive'];
        $roomstatus->PropertyID = $validated['PropertyID'];
        $roomstatus->CreatedBy = $validated['CreatedBy'];
        $roomstatus->CreatedDate = Carbon::now()->toDateTimeString();
        $roomstatus->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomstatus->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomstatus->CreatedByName = $validated['CreatedByName'];
        $roomstatus->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomstatus->SortKey = $validated['SortKey'];

        $roomstatus->Alias = $validated['Alias'];
        $roomstatus->Name = $validated['Name'];
        $roomstatus->Description = $validated['Description'];
        
        $roomstatus->OptimisticLockField = $validated['OptimisticLockField'];
        $roomstatus->GCRecord = $validated['GCRecord'];
        $roomstatus->save();

        return response($roomstatus->refresh(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Roomstatus $id)
    {
        return response($id, 200);
    }

    public function showAll(Request $req)
    {
        if($req->has('page') && $req->has('perpage')){
            return response(Roomstatus::paginate($req->perpage,['*'],'page',$req->page),200);
        }

        elseif($req->has('page')){
            return response(Roomstatus::paginate(15,['*'],'page',$req->page),200);;
        }

        elseif($req->has('perpage')){
            return response(Roomstatus::paginate($req->perpage,['*'],'page',1),200);
        }
        else{
            return response(Roomstatus::paginate(15));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Roomstatus $roomstatus)
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
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable',
        ]);

        $roomstatus->isActive = $validated['isActive'];
        $roomstatus->PropertyID = $validated['PropertyID'];
        $roomstatus->CreatedBy = $validated['CreatedBy'];

        $roomstatus->LastUpdatedBy = $validated['LastUpdatedBy'];
        $roomstatus->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $roomstatus->CreatedByName = $validated['CreatedByName'];
        $roomstatus->LastUpdatedByName = $validated['LastUpdatedByName'];
        $roomstatus->SortKey = $validated['SortKey'];

        $roomstatus->Alias = $validated['Alias'];
        $roomstatus->Name = $validated['Name'];
        $roomstatus->Description = $validated['Description'];
        
        $roomstatus->OptimisticLockField = $validated['OptimisticLockField'];
        $roomstatus->GCRecord = $validated['GCRecord'];
        $roomstatus->save();

        return response($roomstatus->refresh(),200);
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
    public function destroy(Roomstatus $roomstatus)
    {
        return response($roomstatus->delete(),200);
    }
}
