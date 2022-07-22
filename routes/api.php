<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\Property\PropertyController;
use App\Http\Controllers\API\Property\PropertygradeController;
use App\Http\Controllers\API\Property\PropertytypeController;
use App\Http\Controllers\API\Room\RoomController;
use App\Http\Controllers\API\Room\RoomtypeController;
use App\Http\Controllers\API\Room\RoomstatusController;
use App\Http\Controllers\API\Room\RoomtariffController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//FOR USER LOGIN
Route::post("login",[UserController::class,'login']);

//FOR USER REGISTER
Route::post('/users',[UserController::class,'create']);

//AUTHENTICATED REQUESTS
Route::group(['middleware' => 'auth:sanctum'], function(){

    //for Users
    Route::get('/users',[UserController::class,'show']);
    Route::delete('/users/{id}',[UserController::class,'destroy']);
    Route::patch('/users/{id}',[UserController::class,'update']);

    
    //for PropertyGrade
    Route::post('/propertygrade',[PropertygradeController::class,'store']);
    Route::get('/propertygrade',[PropertygradeController::class,'index']);
    Route::delete('/propertygrade/{propertygrade}',[PropertygradeController::class,'destroy']);
    Route::patch('/propertygrade/{propertygrade}',[PropertygradeController::class,'edit']);


    //for PropertyType
    Route::post('/propertytype',[PropertytypeController::class,'store']);
    Route::get('/propertytype',[PropertytypeController::class,'index']);
    Route::delete('/propertytype/{propertytype}',[PropertytypeController::class,'destroy']);
    Route::patch('/propertytype/{propertytype}',[PropertytypeController::class,'edit']);


    //for Property
    Route::post('/property',[PropertyController::class,'store']);
    Route::get('/property',[PropertyController::class,'index']);
    Route::delete('/property/{property}',[PropertyController::class,'destroy']);
    Route::patch('/property/{property}',[PropertyController::class,'edit']);


    //for Room
    Route::post('/room',[RoomController::class,'store']);
    Route::get('/room',[RoomController::class,'index']);
    Route::delete('/room/{room}',[RoomController::class,'destroy']);
    Route::patch('/room/{room}',[RoomController::class,'edit']);


    //for RoomType
    Route::post('/roomtype',[RoomtypeController::class,'store']);

    Route::get('/roomtype/all_data',[RoomtypeController::class,'index']);
    Route::get('/roomtype/',[RoomtypeController::class,'showAll']);
    Route::get('/roomtype/{id}',[RoomtypeController::class,'show']);

    Route::delete('/roomtype/{roomtype}',[RoomtypeController::class,'destroy']);
    Route::patch('/roomtype/{roomtype}',[RoomtypeController::class,'edit']);


    //for Roomstatus
    Route::post('/roomstatus',[RoomstatusController::class,'store']);

    Route::get('/roomstatus/all_data',[RoomstatusController::class,'index']);
    Route::get('/roomstatus/',[RoomstatusController::class,'showAll']);
    Route::get('/roomstatus/{id}',[RoomstatusController::class,'show']);

    Route::delete('/roomstatus/{roomstatus}',[RoomstatusController::class,'destroy']);
    Route::patch('/roomstatus/{roomstatus}',[RoomstatusController::class,'edit']);


    //for Roomstariff
    Route::post('/roomtariff',[RoomtariffController::class,'store']);
    Route::get('/roomtariff/all_data',[RoomtariffController::class,'index']);
    Route::get('/roomtariff/',[RoomtariffController::class,'showAll']);
    Route::get('/roomtariff/{id}',[RoomtariffController::class,'show']);
    Route::delete('/roomtariff/{roomtariff}',[RoomtariffController::class,'destroy']);
    Route::patch('/roomtariff/{roomtariff}',[RoomtariffController::class,'edit']);

});
