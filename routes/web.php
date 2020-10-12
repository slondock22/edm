<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Route::get('/{verif_code?}', 'HomeController@index');
// Route::get('/', 'HomeController@index2');
Route::get('/', function(){
    return redirect('login');
});

Route::get('/policy', function(){
    return view('landing2.policy');
});

Route::get('registrasi/{code?}', 'HomeController@index');

Route::get('sendmonday', 'CampaignController@sendMonday');

// Route::get('/{verif_code?}', function(){
//     return redirect('https://www.trade2gov.com');
// });
// 
 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
 \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::post('/register','RegisterController@register')->name('register');

Route::post('/share','RegisterController@sharing')->name('share');

Route::get('/test/registerT2G','RegisterController@registerT2G');

Route::get('/t2g/doorprize', 'HomeController@doorprize');
Route::get('/t2g/doorprizev2', 'HomeController@doorprizev2');


Route::get('/t2g/welcome', 'HomeController@welcome');
Route::get('/invent2/welcome', 'HomeController@welcome2');
Route::get('/t2g/ble', 'HomeController@ble');

Route::get('/peserta_doorprize/{id_event}','MasterController@peserta_doorprize');

Route::get('/url_callback','CampaignController@url_callback');

Route::get('tesnotif_warga', function () {
    return view('onesignal-notif-warga');
});
Route::get('tesnotif_retail', function () {
    return view('onesignal-notif-retail');
});

Route::get('addRecepient','Api\MasterApiController@addRecepient');
Route::get('/sendPush/{id_user}/{role}','OneSignalController@sendPush');
Route::get('/getDeviceAll/{role}','OneSignalController@getDeviceAll');
Route::get('/getDevice/{role}/{players_id}','OneSignalController@getDevice');
Route::get('/updateDevice/{role}/{players_id}','OneSignalController@updateDevice');


Route::post('/storePlayerIds','OneSignalController@storePlayerIds');

Route::get('/unsubscribe-newsletter/{encrypt_recepient_id}', 'CampaignController@showUnsubscribe');
Route::post('/unsubscribe', 'CampaignController@storeUnsubscribe')->name('unsubscribe');
Route::get('/confirm-unsubscribe', 'CampaignController@showConfirmUnsubscribe');




//Admin EO Menu's
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'dashboard'], function () {

        Route::get('/', [
            'as' => 'admin.dashboard', 'uses' => 'DashboardController@index'
        ]);

        Route::get('topStatistic', [
            'as' => 'admin.dashboard.topStatistic', 'uses' => 'DashboardController@topStatistic'
        ]);

        Route::get('circleStatistic/{id_campaign?}', [
            'as' => 'admin.dashboard.circleStatistic', 'uses' => 'DashboardController@circleStatistic'
        ]);

        Route::get('detailStatistic/{id_campaign?}', [
            'as' => 'admin.dashboard.detailStatistic', 'uses' => 'DashboardController@detailStatistic'
        ]);

         Route::get('downloadStatistic/{id_campaign?}', [
            'as' => 'admin.dashboard.downloadStatistic', 'uses' => 'DashboardController@downloadStatistic'
        ]);
    });


    Route::group(['prefix' => 'event'], function () {

        Route::get('/create', [
            'as' => 'admin.event.create', 'uses' => 'EventController@create'
        ]);

        Route::get('/list', [
            'as' => 'admin.event.list', 'uses' => 'EventController@list'
        ]);

        Route::get('/table', [
            'as' => 'admin.event.table', 'uses' => 'EventController@table'
        ]);
    });

    Route::group(['prefix' => 'broadcast'], function () {

        Route::get('/create', [
            'as' => 'admin.broadcast.create', 'uses' => 'BroadcastController@create'
        ]);

        Route::get('/list', [
            'as' => 'admin.broadcast.list', 'uses' => 'BroadcastController@list'
        ]);

        Route::get('/table', [
            'as' => 'admin.broadcast.table', 'uses' => 'BroadcastController@table'
        ]);

        Route::post('/sendMailAll', [
            'as' => 'admin.broadcast.sendMailAll', 'uses' => 'BroadcastController@sendMailAll'
        ]);

        Route::post('/sendMailId', [
            'as' => 'admin.broadcast.sendMailId', 'uses' => 'BroadcastController@sendMailId'
        ]);

        Route::post('/sendTicketAll', [
            'as' => 'admin.broadcast.sendTicketAll', 'uses' => 'BroadcastController@sendTicketAll'
        ]);
        
        Route::post('/sendTicketId', [
            'as' => 'admin.broadcast.sendTicketId', 'uses' => 'BroadcastController@sendTicketId'
        ]);

        Route::post('/view', [
            'as' => 'admin.broadcast.view', 'uses' => 'BroadcastController@view'
        ]);

        Route::get('/detailTable', [
            'as' => 'admin.broadcast.detailTtable', 'uses' => 'BroadcastController@detailTtable'
        ]);

        Route::get('/sendCampaignRegister', [
            'as' => 'admin.broadcast.sendCampaignRegister', 'uses' => 'BroadcastController@sendCampaignRegister'
        ]);

        Route::get('/sendSmartClearBlast', [
            'as' => 'admin.broadcast.sendSmartClearBlast', 'uses' => 'BroadcastController@sendSmartClearBlast'
        ]);
        // Route::get('/deleteFile', [
        //     'as' => 'admin.broadcast.deleteFile', 'uses' => 'BroadcastController@deleteFile'
        // ]);

    });

    Route::group(['prefix' => 'checkin'], function () {

        Route::get('/', [
            'as' => 'admin.checkin', 'uses' => 'CheckinController@index'
        ]);

        Route::get('/checkin_table', [
            'as' => 'admin.checkin.checkin_table', 'uses' => 'CheckinController@checkin_table'
        ]);

        Route::post('/check', [
            'as' => 'admin.checkin.check', 'uses' => 'CheckinController@check'
        ]);
        
    });

    Route::group(['prefix' => 'master'], function () {

        Route::get('/recepient', [
            'as' => 'admin.master.recepient', 'uses' => 'MasterController@recepient'
        ]);

        Route::get('/recepient_table', [
            'as' => 'admin.master.recepient_table', 'uses' => 'MasterController@recepient_table'
        ]);

        Route::get('/recepient_create', [
            'as' => 'admin.master.recepient_create', 'uses' => 'MasterController@recepient_create'
        ]);

         Route::post('/recepient_view', [
            'as' => 'admin.master.recepient_view', 'uses' => 'MasterController@recepient_view'
        ]);

        Route::post('/recepient_store', [
            'as' => 'admin.master.recepient_store', 'uses' => 'MasterController@recepient_store'
        ]);

        Route::post('/recepient_update', [
            'as' => 'admin.master.recepient_update', 'uses' => 'MasterController@recepient_update'
        ]);

        Route::post('/recepient_delete', [
            'as' => 'admin.master.recepient_delete', 'uses' => 'MasterController@recepient_delete'
        ]);

        Route::post('/import_recepient', [
            'as' => 'admin.master.import_recepient', 'uses' => 'MasterController@import_recepient'
        ]);

         Route::get('download_template_excel', [
            'as' => 'admin.master.download_template_excel', 'uses' => 'MasterController@download_template_excel'
        ]);


        //Recepient Group

        Route::get('/recepient_group', [
            'as' => 'admin.master.recepient_group', 'uses' => 'MasterController@recepient_group'
        ]);

        Route::get('/recepient_group_table', [
            'as' => 'admin.master.recepient_group_table', 'uses' => 'MasterController@recepient_group_table'
        ]);

        Route::post('/recepient_group_create', [
            'as' => 'admin.master.recepient_group_create', 'uses' => 'MasterController@recepient_group_create'
        ]);

        Route::post('/recepient_group_view', [
            'as' => 'admin.master.recepient_group_view', 'uses' => 'MasterController@recepient_group_view'
        ]);

        Route::post('/recepient_group_delete', [
            'as' => 'admin.master.recepient_group_delete', 'uses' => 'MasterController@recepient_group_delete'
        ]);

        Route::post('/add_recepient_group', [
            'as' => 'admin.master.add_recepient_group', 'uses' => 'MasterController@add_recepient_group'
        ]);

        Route::post('/remove_recepient_group', [
            'as' => 'admin.master.remove_recepient_group', 'uses' => 'MasterController@remove_recepient_group'
        ]);

    });

    Route::group(['prefix' => 'register'], function () {

        Route::get('/create', [
            'as' => 'admin.register.create', 'uses' => 'RegisterController@create'
        ]);

        Route::post('/register_manual', [
            'as' => 'admin.register.register_manual', 'uses' => 'RegisterController@register_manual'
        ]);

    });

      Route::group(['prefix' => 'campaign'], function () {

        Route::get('create', [
            'as' => 'admin.campaign.create', 'uses' => 'CampaignController@create'
        ]);

         Route::get('/list', [
            'as' => 'admin.campaign.list', 'uses' => 'CampaignController@list'
        ]);

        Route::get('/table', [
            'as' => 'admin.campaign.table', 'uses' => 'CampaignController@table'
        ]);

        Route::post('/view', [
            'as' => 'admin.campaign.view', 'uses' => 'CampaignController@view'
        ]);

    });

});

