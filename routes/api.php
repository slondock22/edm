<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'], function () {
    //Event
    Route::get('/getEvent', [
        'as' => 'event.getEvent', 'uses' => 'EventApiController@getEventAll'
    ]);
    Route::post('/createEvent', [
        'as' => 'event.createEvent', 'uses' => 'EventApiController@store'
    ]);

     //Broadcast
    Route::get('/getBroadcast', [
        'as' => 'broadcast.getBroadcast', 'uses' => 'BroadcastApiController@getBroadcast'
    ]);
    Route::post('/createBroadcast', [
        'as' => 'broadcast.createBroadcast', 'uses' => 'BroadcastApiController@store'
    ]);
    Route::post('/deleteBroadcast', [
        'as' => 'broadcast.deleteBroadcast', 'uses' => 'BroadcastApiController@destroy'
    ]);

    //Category Event
    Route::get('/getCatEvent', [
        'as' => 'event.getCatEvent', 'uses' => 'CategoryEventApiController@getCategoryEventAll'
    ]);
    Route::post('/createEventCategory', [
        'as' => 'event.createEventCategory', 'uses' => 'CategoryEventApiController@store'
    ]);

    // //Get Attendances
    // Route::get('/getAttendance/{id_event?}', [
    //     'as' => 'event.getAttendance', 'uses' => 'CheckinController@getAttendance'
    // ]);
    
    //Master Group List
    Route::get('/getRecepientGroupList', [
        'as' => 'campaign.getRecepientGroupList', 'uses' => 'MasterApiController@getRecepientGroupList'
    ]);
    
    //Campaign
    Route::get('/getCampaign', [
        'as' => 'campaign.getCampaign', 'uses' => 'CampaignApiController@getCampaign'
    ]);
    Route::get('/getCampaignSent', [
        'as' => 'campaign.getCampaignSent', 'uses' => 'CampaignApiController@getCampaignSent'
    ]);
    Route::post('/createCampaign', [
        'as' => 'campaign.createCampaign', 'uses' => 'CampaignApiController@store'
    ]);
    Route::post('/saveDraftCampaign', [
        'as' => 'campaign.saveDraftCampaign', 'uses' => 'CampaignApiController@saveDraftCampaign'
    ]);
     Route::post('/deleteCampaign', [
        'as' => 'campaign.deleteCampaign', 'uses' => 'CampaignApiController@destroy'
    ]);

 });
