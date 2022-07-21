<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{

    public function login(Request $req){
        $validated = $this->validate($req,[
            'id'=>'nullable',
            'UserName'=>'required',
            'Password'=>'required',
        ]);
        $user= User::where('UserName', $validated['UserName'])->first();

            if (!$user || !Hash::check($validated['Password'], $user->Password)) {
                return response([
                    'message' => ['Invalid username or password']
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);

    }


    public function show(){
        // $token = $req->token;
        // $status = DB::table('personal_access_tokens')->where('token',$token)->first();
        // if(!$status){
        //     return "Unauthorized";
        // };
        $res = User::all();
        return response($res, 200);
    }

    public function create(Request $req){
        $validated = $this->validate($req, [
            'isActive' => 'nullable',
            'PropertyID' => 'nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' =>'nullable',
            'UserID' =>'nullable',
            'FirstName' =>'nullable',
            'LastName' =>'nullable',
            'UserName' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'Hash' => 'nullable',
            'Salt' => 'nullable',
            'LastLogin' => 'nullable',
            'ChangePasswordOnFirstLogon' => 'nullable',
            'OptimisticLockField' => 'nullable',
            'GCRecord' => 'nullable'
        ]);

        // dd(Carbon::now()->toDateTimeString());
        // dd($validated);
        $newUser =new User();
        $newUser->isActive = $validated['isActive'];
        $newUser->PropertyID = $validated['PropertyID'];
        $newUser->CreatedBy = $validated['CreatedBy'];
        $newUser->CreatedDate = Carbon::now()->toDateTimeString();
        $newUser->LastUpdatedBy = $validated['LastUpdatedBy'];
        $newUser->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $newUser->CreatedByName = $validated['CreatedByName'];
        $newUser->LastUpdatedByName = $validated['LastUpdatedByName'];
        $newUser->SortKey = $validated['SortKey'];
        $newUser->UserID = $validated['UserID'];
        $newUser->FirstName = $validated['FirstName'];
        $newUser->LastName = $validated['LastName'];
        $newUser->UserName = $validated['UserName'];
        $newUser->Email = $validated['Email'];
        $newUser->Password = Hash::make($validated['Password']);
        $newUser->Hash = $validated['Hash'];
        $newUser->Salt = $validated['Salt'];
        $newUser->LastLogin = $validated['LastLogin'];
        $newUser->ChangePasswordOnFirstLogon = $validated['ChangePasswordOnFirstLogon'];
        $newUser->OptimisticLockField = $validated['OptimisticLockField'];
        $newUser->GCRecord = $validated['GCRecord'];
        $newUser->save();

        return response($newUser->refresh(), 200);
    }

    public function destroy(User $id){
        return response($id->delete(), 200);
    }

    public function update(Request $req, User $id){
        $user = $id;

        $validated = $this->validate($req, [
            'isActive' => 'nullable',
            'PropertyID' => 'nullable',
            'CreatedBy' =>'nullable',
            'LastUpdatedBy' =>'nullable',
            'CreatedByName' =>'nullable',
            'LastUpdatedByName' =>'nullable',
            'SortKey' =>'nullable',
            'UserID' =>'nullable',
            'FirstName' =>'nullable',
            'LastName' =>'nullable',
            'UserName' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'Hash' => 'nullable',
            'Salt' => 'nullable',
            'LastLogin' => 'nullable',
            'ChangePasswordOnFirstLogon' => 'nullable',
            'OptimisticLockField' => 'nullable',
            'GCRecord' => 'nullable'
        ]);

        // dd($validated);
        $user->isActive = $validated['isActive'];
        $user->PropertyID = $validated['PropertyID'];
        $user->CreatedBy = $validated['CreatedBy'];
        $user->LastUpdatedBy = $validated['LastUpdatedBy'];
        $user->LastUpdatedDate = Carbon::now()->toDateTimeString();
        $user->LastUpdatedByName = $validated['LastUpdatedByName'];
        $user->SortKey = $validated['SortKey'];
        $user->UserID = $validated['UserID'];
        $user->FirstName = $validated['FirstName'];
        $user->LastName = $validated['LastName'];
        $user->UserName = $validated['UserName'];
        $user->Email = $validated['Email'];
        $user->Password = Hash::make($validated['Password']);
        $user->Hash = $validated['Hash'];
        $user->Salt = $validated['Salt'];
        $user->LastLogin = $validated['LastLogin'];
        $user->ChangePasswordOnFirstLogon = $validated['ChangePasswordOnFirstLogon'];
        $user->OptimisticLockField = $validated['OptimisticLockField'];
        $user->GCRecord = $validated['GCRecord'];
        $user->save();

        return response($user->refresh(), 200);
    }
}
