<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LeaveController;

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

Route::post('/get-otp', [AuthController::class, 'getOtp']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('update-earned-leave', 'App\Http\Controllers\Api\LeaveController@updateEarnedLeave')->name('update-earned-leave');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group( function () {
    
    Route::post('search-epicno','App\Http\Controllers\Api\VotersController@searchByEpicno')->name('search-ecpicno');
    Route::get('services', 'App\Http\Controllers\Api\ServiceController@index')->name('services');
    Route::post('add-voter-service', 'App\Http\Controllers\Api\ServiceController@addVoterService')->name('add-voter-service');
    ///Route::post('voter-service-list', 'App\Http\Controllers\Api\ServiceController@voterServiceList')->name('voter-service-list');
    Route::post('update-voter-info', 'App\Http\Controllers\Api\VotersController@updateVoterInfo')->name('update-voter-info');
    Route::post('voter-info','App\Http\Controllers\Api\VotersController@voterInfo')->name('voter-info');
    Route::post('voter-services','App\Http\Controllers\Api\VotersController@voterServices')->name('voter-services');
    Route::post('is-service-provided','App\Http\Controllers\Api\ServiceController@isServiceAdded')->name('is-service-provided');
    Route::post('add-new-voter','App\Http\Controllers\Api\VotersController@addNewVoter')->name('add-new-voter');

    
});
