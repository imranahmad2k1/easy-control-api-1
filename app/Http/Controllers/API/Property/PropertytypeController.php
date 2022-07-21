<?php

namespace App\Http\Controllers\API\Property;

use App\Http\Controllers\Controller;
use App\Models\Propertytype;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PropertytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Propertytype::all();
        return response($res, 200);
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

            'Alias'=>'nullable',
            'PropertyType'=>'nullable',
            'Description'=>'nullable',

            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        // dd($validated);
        $newProperty =new Propertytype();
        $newProperty->isActive = $validated['isActive'];
        $newProperty->PropertyID = $validated['PropertyID'];
        $newProperty->CreatedBy = $validated['CreatedBy'];

        $newProperty->CreatedDate = Carbon::now()->toDateTimeString();;

        $newProperty->LastUpdatedBy = $validated['LastUpdatedBy'];

        $newProperty->LastUpdatedDate = Carbon::now()->toDateTimeString();

        $newProperty->CreatedByName = $validated['CreatedByName'];
        $newProperty->LastUpdatedByName = $validated['LastUpdatedByName'];
        $newProperty->SortKey = $validated['SortKey'];

        $newProperty->Alias = $validated['Alias'];
        $newProperty->PropertyType = $validated['PropertyType'];
        $newProperty->Description = $validated['Description'];

        $newProperty->OptimisticLockField = $validated['OptimisticLockField'];
        $newProperty->GCRecord = $validated['GCRecord'];
        $newProperty->save();

        return response($newProperty->refresh(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propertytype  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function show(Propertytype $propertytype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propertytype  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Propertytype $propertytype)
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
            'PropertyType' => 'nullable',
            'Description' => 'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        $propertytype->isActive = $validated['isActive'];
        $propertytype->PropertyID = $validated['PropertyID'];
        $propertytype->CreatedBy = $validated['CreatedBy'];
        $propertytype->LastUpdatedBy = $validated['LastUpdatedBy'];
        $propertytype->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $propertytype->CreatedByName = $validated['CreatedByName'];
        $propertytype->LastUpdatedByName = $validated['LastUpdatedByName'];
        $propertytype->SortKey = $validated['SortKey'];

        $propertytype->Alias = $validated['Alias'];
        $propertytype->PropertyType = $validated['PropertyType'];
        $propertytype->Description = $validated['Description'];

        $propertytype->OptimisticLockField = $validated['OptimisticLockField'];
        $propertytype->GCRecord = $validated['GCRecord'];
        $propertytype->save();

        return response($propertytype->refresh(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propertytype  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propertytype $propertytype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propertytype  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propertytype $propertytype)
    {
        return response($propertytype->delete(), 200);
    }
}
