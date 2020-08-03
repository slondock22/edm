<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OneSignal;
use GuzzleHttp\Client;


class OneSignalController extends Controller
{
    public function sendPush($user_id,$role)
    {
        if($role =='warga'){
            $app_id = env('ONE_SIGNAL_APP_ID_WARGA');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_WARGA');
            $url = 'https://www.google.co.id';
        }
        elseif($role == 'retail'){
            $app_id = env('ONE_SIGNAL_APP_ID_RETAIL');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_RETAIL');
            $url = 'https://www.facebook.com';

        }

        $content = array(
            "en" => 'A donation package for you is available. Please click to find out the location and schedule of collect',
            "id" => 'Paket bantuan untuk Anda tersedia. Silahkan klik untuk mengetahui lokasi dan jadwal pengambilan'
            );

    	$fields = array(
            'app_id' =>$app_id,
            'filters' => array(
                                array("field" => "tag", "key" => "role", "relation" => "=", "value" => $role),
                                array("operator" => "AND"),
                                array("field" => "tag", "key" => "idUser", "relation" => "=", "value" => $user_id)

                            ),
            // 'include_segment' => ['warga'],
            'data' => array("foo" => "bar"),
            'app_url' => 'ipc-peduli://',
            'web_url' => $url,
            'headings' => array("en" => "Donation Package Available", "id" => "Paket Bantuan Tersedia"),
            'contents' => $content,
            'android_sound' => 'notification',
            'small_icon' => 'https://i.ibb.co/FYMpstG/ipc36x36.png',
            'large_icon' => 'https://i.ibb.co/xCMj9QM/ipc256x256.png',
        );

		$client = new Client();
        $url = "https://onesignal.com/api/v1/notifications";
        $request = $client->request('POST', $url, 
                       [ 
                            'headers' => [
                                 'Content-Type'  => 'application/json; charset=utf-8',
                                 'Authorization'     => 'Basic '.$api_key
                            ],

                            'json' => $fields
                        ]);

        $response = json_decode($request->getBody()->getContents(),true);

        return \Response::json($response);
    }

    public function getDeviceAll($role)
    {
         if($role =='warga'){
            $app_id = env('ONE_SIGNAL_APP_ID_WARGA');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_WARGA');
        }
        elseif($role == 'retail'){
            $app_id = env('ONE_SIGNAL_APP_ID_RETAIL');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_RETAIL');
        }

    	$client = new Client();
        $url = "https://onesignal.com/api/v1/players?app_id=" . $app_id;
        $request = $client->request('GET', $url, 
                       [ 
                            'headers' => [
                                 'Content-Type'  => 'application/json',
                                 'Authorization'     => 'Basic '.$api_key
                            ]
                        ]);

        $response = json_decode($request->getBody()->getContents(),true);

        return \Response::json($response);
    }

    public function getDevice($role,$players_id)
    {
        if($role =='warga'){
            $app_id = env('ONE_SIGNAL_APP_ID_WARGA');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_WARGA');
        }
        elseif($role == 'retail'){
            $app_id = env('ONE_SIGNAL_APP_ID_RETAIL');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_RETAIL');
        }

        $client = new Client();
        $url = "https://onesignal.com/api/v1/players/".$players_id."?app_id=" . $app_id;
        $request = $client->request('GET', $url, 
                       [ 
                            'headers' => [
                                 'Content-Type'  => 'application/json',
                                 'Authorization'     => 'Basic '.$api_key
                            ]
                        ]);

        $response = json_decode($request->getBody()->getContents(),true);

        return \Response::json($response);
    }



    public function storePlayerIds(Request $request)
    {
        $data = [
                    'include_player_ids' => $request->include_player_ids,
                    'user_id'            => $request->user_id
                ];

        return \Response::json($data);
    }

    public function updateDevice($role, $players_id='')
    {
        if($role =='warga'){
            $app_id = env('ONE_SIGNAL_APP_ID_WARGA');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_WARGA');
        }
        elseif($role == 'retail'){
            $app_id = env('ONE_SIGNAL_APP_ID_RETAIL');
            $api_key = env('ONE_SIGNAL_AUTHORIZE_RETAIL');
        }

        $fields = [
                        'tags'  => array("role" => $role)
                   ];

        $client = new Client();
        $url = "https://onesignal.com/api/v1/players/".$players_id;
        $request = $client->request('PUT', $url, 
                       [ 
                            'headers' => [
                                 'Content-Type'  => 'application/json',
                                 'Authorization'     => 'Basic '.$api_key
                            ],

                            'json' => $fields
                        ]);

        $response = json_decode($request->getBody()->getContents(),true);

        return \Response::json($response);  
    }
}
