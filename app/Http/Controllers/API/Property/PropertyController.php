<?php

namespace App\Http\Controllers\API\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Property::all();
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

            'PropertyName' => 'nullable',
            'PropertyPrivateKey' => 'nullable',
            'Description' => 'nullable',
            'BeneficiaryName' => 'nullable',
            'RegisterationNo1' => 'nullable',
            'RegisterationNo2' => 'nullable',
            'RegisterationNo3' => 'nullable',
            'RegisterationNo4' => 'nullable',
            'RegisterationNo5' => 'nullable',
            'Room' => 'nullable',
            'PropertyGrade' => 'nullable',
            'PropertyType' => 'nullable',
            'Address' => 'nullable',
            'LogoImgPath' => 'nullable',       

            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        // dd($validated);
        $newProperty =new Property();
        $newProperty->isActive = $validated['isActive'];
        $newProperty->PropertyID = $validated['PropertyID'];
        $newProperty->CreatedBy = $validated['CreatedBy'];

        $newProperty->CreatedDate = Carbon::now()->toDateTimeString();;

        $newProperty->LastUpdatedBy = $validated['LastUpdatedBy'];

        $newProperty->LastUpdatedDate = Carbon::now()->toDateTimeString();

        $newProperty->CreatedByName = $validated['CreatedByName'];
        $newProperty->LastUpdatedByName = $validated['LastUpdatedByName'];
        $newProperty->SortKey = $validated['SortKey'];

        $newProperty->PropertyName = $validated['PropertyName'];
        $newProperty->PropertyPrivateKey = $validated['PropertyPrivateKey'];
        $newProperty->Description = $validated['Description'];
        $newProperty->BeneficiaryName = $validated['BeneficiaryName'];
        $newProperty->RegisterationNo1 = $validated['RegisterationNo1'];
        $newProperty->RegisterationNo2 = $validated['RegisterationNo2'];
        $newProperty->RegisterationNo3 = $validated['RegisterationNo3'];
        $newProperty->RegisterationNo4 = $validated['RegisterationNo4'];
        $newProperty->RegisterationNo5 = $validated['RegisterationNo5'];
        $newProperty->Room = $validated['Room'];
        $newProperty->PropertyGrade = $validated['PropertyGrade'];
        $newProperty->PropertyType = $validated['PropertyType'];
        $newProperty->Address = $validated['Address'];
        $newProperty->LogoImgPath = $validated['LogoImgPath'];

        $newProperty->OptimisticLockField = $validated['OptimisticLockField'];
        $newProperty->GCRecord = $validated['GCRecord'];
        $newProperty->save();

        return response($newProperty->refresh(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Property $property)
    {
        $validated = $this->validate($request, [
            'isActive' => 'integer|nullable',
            'PropertyID' => 'integer|nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' => 'integer|nullable',
            'PropertyName' => 'nullable',
            'PropertyPrivateKey' => 'nullable',
            'Description' => 'nullable',
            'BeneficiaryName' => 'nullable',
            'RegisterationNo1' => 'nullable',
            'RegisterationNo2' => 'nullable',
            'RegisterationNo3' => 'nullable',
            'RegisterationNo4' => 'nullable',
            'RegisterationNo5' => 'nullable',
            'Room' => 'nullable',
            'PropertyGrade' => 'nullable',
            'PropertyType' => 'nullable',
            'Address' => 'nullable',
            'LogoImgPath' => 'nullable',       
            'OptimisticLockField' => 'integer|nullable',
            'GCRecord' => 'integer|nullable'
        ]);

        $property->isActive = $validated['isActive'];
        $property->PropertyID = $validated['PropertyID'];
        $property->CreatedBy = $validated['CreatedBy'];
        $property->LastUpdatedBy = $validated['LastUpdatedBy'];
        $property->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $property->CreatedByName = $validated['CreatedByName'];
        $property->LastUpdatedByName = $validated['LastUpdatedByName'];
        $property->SortKey = $validated['SortKey'];
        $property->PropertyName = $validated['PropertyName'];
        $property->PropertyPrivateKey = $validated['PropertyPrivateKey'];
        $property->Description = $validated['Description'];
        $property->BeneficiaryName = $validated['BeneficiaryName'];
        $property->RegisterationNo1 = $validated['RegisterationNo1'];
        $property->RegisterationNo2 = $validated['RegisterationNo2'];
        $property->RegisterationNo3 = $validated['RegisterationNo3'];
        $property->RegisterationNo4 = $validated['RegisterationNo4'];
        $property->RegisterationNo5 = $validated['RegisterationNo5'];
        $property->Room = $validated['Room'];
        $property->PropertyGrade = $validated['PropertyGrade'];
        $property->PropertyType = $validated['PropertyType'];
        $property->Address = $validated['Address'];
        $property->LogoImgPath = $validated['LogoImgPath'];
        $property->OptimisticLockField = $validated['OptimisticLockField'];
        $property->GCRecord = $validated['GCRecord'];
        $property->save();

        return response($property->refresh(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        return response($property->delete(), 200);
    }
}
