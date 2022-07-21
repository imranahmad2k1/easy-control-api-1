<?php

namespace App\Http\Controllers\API\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertygrade;
use Carbon\Carbon;

class PropertygradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Propertygrade::all();
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
            'GradeName'=>'nullable',
            'Description'=>'nullable',

            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        // dd($validated);
        $newProperty =new Propertygrade();
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
        $newProperty->GradeName = $validated['GradeName'];
        $newProperty->Description = $validated['Description'];

        $newProperty->OptimisticLockField = $validated['OptimisticLockField'];
        $newProperty->GCRecord = $validated['GCRecord'];
        $newProperty->save();

        return response($newProperty->refresh(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $propertygrade
     * @return \Illuminate\Http\Response
     */
    public function show(Propertygrade $propertygrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $propertygrade
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Propertygrade $propertygrade)
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
            'GradeName' => 'nullable',
            'Description' => 'nullable',
            
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        $propertygrade->isActive = $validated['isActive'];
        $propertygrade->PropertyID = $validated['PropertyID'];
        $propertygrade->CreatedBy = $validated['CreatedBy'];
        $propertygrade->LastUpdatedBy = $validated['LastUpdatedBy'];
        $propertygrade->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $propertygrade->CreatedByName = $validated['CreatedByName'];
        $propertygrade->LastUpdatedByName = $validated['LastUpdatedByName'];
        $propertygrade->SortKey = $validated['SortKey'];

        $propertygrade->Alias = $validated['Alias'];
        $propertygrade->GradeName = $validated['GradeName'];
        $propertygrade->Description = $validated['Description'];

        $propertygrade->OptimisticLockField = $validated['OptimisticLockField'];
        $propertygrade->GCRecord = $validated['GCRecord'];
        $propertygrade->save();

        return response($propertygrade->refresh(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $propertygrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propertygrade $propertygrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $propertygrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propertygrade $propertygrade)
    {
        return response($propertygrade->delete(), 200);
    }
}
