<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Broadcast;
use App\Recepient;
use DB;
use Validator;
use App\Jobs\SendCampaignEmailJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Bitly;


class CampaignApiController extends Controller
{
    public function getCampaign(){

       $data = DB::table('tr_campaign as a')
                        ->leftjoin('tm_recepient_group as b','a.recepient_group_id','b.id')
                        ->leftjoin('tr_recepient_by_group as c','c.recepient_group_id','b.id')
                        ->leftjoin('tm_campaign_status as d','d.id','a.campaign_sent_status')
                        ->select(DB::raw('(SELECT COUNT(recepient_id) FROM tr_recepient_by_group WHERE recepient_group_id = c.recepient_group_id) AS recepient_total, b.recepient_group_name, a.campaign_subject,a.id,a.campaign_url_callback,a.campaign_title, a.campaign_sent_status,d.campaign_status,a.campaign_sent_time_at'))
                        ->groupBy('a.id')
                        ->orderBy('a.id','desc')
                        ->get();
        return $data;
    }

    public function getCampaignSent()
    {
        $data = DB::table('tr_campaign_detail as a')
                    ->join('tr_campaign as b','a.campaign_id','b.id')
                    ->select('a.campaign_id','b.campaign_title')
                    ->groupBy('a.campaign_id')
                    ->get();

        return \Response::json($data);
    }

    public function store(Request $request){

        if($request->campaign_id){
            $validator = Validator::make($request->all(),[
                'recepient_group_id'  => 'required',
                'campaign_title' => 'required',
                'email_subject'      => 'required',
                'email_message'     => 'required',
                'email_url_callback'     => 'url|required',
            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'recepient_group_id'  => 'required',
                'campaign_title' => 'required|unique:tr_campaign,campaign_title',
                'email_subject'      => 'required',
                'email_message'     => 'required',
                'email_url_callback'     => 'url|required',
            ]);     
        }

         if ($validator->fails())
        {
             return response()->json(['errors' => $validator->errors()->all()]);  
        }

        if($request->campaign_id){

            $update = DB::table('tr_campaign')
                    ->where('id',$request->campaign_id)
                    ->update([
                                'recepient_group_id' => $request->recepient_group_id,
                                'campaign_title' => $request->campaign_title,
                                'campaign_subject' => $request->email_subject,
                                'campaign_message' => $request->email_message,
                                'campaign_url_callback' => $request->email_url_callback,
                                'campaign_sent_status' => '1',
                            ]);

            $save_id = $request->campaign_id;

        }else{

             $save_id = DB::table('tr_campaign')
                ->insertGetId([
                            'recepient_group_id' => $request->recepient_group_id,
                            'campaign_title' => $request->campaign_title,
                            'campaign_subject' => $request->email_subject,
                            'campaign_message' => $request->email_message,
                            'campaign_url_callback' => $request->email_url_callback,
                            'campaign_sent_status' => '1',
                        ]);
        }

       $recepient = DB::table('tr_recepient as a')
                        ->select('a.id as recepient_id','a.recepient_name','a.recepient_email')
                        ->join('tr_recepient_by_group as b','b.recepient_id','a.id')
                        ->where('b.recepient_group_id',$request->recepient_group_id)
                        ->get();
        // dd($recepient);


        foreach($recepient as $value){
            $content['email']         = $value->recepient_email;
            $content['name']          = $value->recepient_name;
            $content['message']       = $request->email_message;
            $content['subject']       = $request->email_subject;
            $content['url_callback']  = $request->email_url_callback;
            $content['campaign_id']   = base64url_encode($save_id);
            $content['group_id']      = base64url_encode($request->recepient_group_id);
            $content['recepient_id']  = base64url_encode($value->recepient_id);
            $content['greetings']     = $request->email_greetings;

            // $content['short_url']     = Bitly::getUrl(url('url_callback/?').'utm_campaign='.$content['campaign_id'].'&utm_group='.$content['group_id'].'&utm_recepient='.$content['recepient_id'].'&url_callback='.$content['url_callback']);

             dispatch(new SendCampaignEmailJob($content))->onQueue('emails');

            //Insert to Campaign Detail
            //Check first data exist or not
            $exist = DB::table('tr_campaign_detail')
                        ->where('campaign_id',$save_id)
                        ->where('recepient_group_id',$request->recepient_group_id)
                        ->where('recepient_id',$value->recepient_id)
                        ->first();

            if($exist == null){
      
                $insert = DB::table('tr_campaign_detail')
                            ->insert([
                                'campaign_id' => $save_id,
                                'recepient_group_id' => $request->recepient_group_id,
                                'recepient_id' => $value->recepient_id,
                                'sent_time' => '1',
                                'sent_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                            ]);
            }
            else{
             
                $update = DB::table('tr_campaign_detail')
                        ->where('campaign_id',$save_id)
                        ->where('recepient_group_id',$request->recepient_group_id)
                        ->where('recepient_id',$value->recepient_id)
                        ->update([
                            'sent_time' => DB::raw('sent_time + 1'),
                            'sent_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                        ]);
            }

        }

        //update status header campaign
        $update_campaign_sent_time = DB::table('tr_campaign')->where('id', $save_id)
                                                ->update([
                                                'campaign_sent_time'    => DB::raw('campaign_sent_time + 1'), 
                                                'campaign_sent_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);



        if($save_id){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved and sending the campaign'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function saveDraftCampaign(Request $request){

        $validator = Validator::make($request->all(),[
            'recepient_group_id'  => 'required',
            'campaign_title' => 'required',
            'email_subject'      => 'required',
            'email_message'     => 'required',
            'email_url_callback'     => 'url|required',
        ]);

         if ($validator->fails())
        {
             return response()->json(['errors' => $validator->errors()->all()]);  
        }

        if($request->campaign_id){
             $save = DB::table('tr_campaign')
                    ->where('id',$request->campaign_id)
                    ->update([
                                'recepient_group_id' => $request->recepient_group_id,
                                'campaign_title' => $request->campaign_title,
                                'campaign_subject' => $request->email_subject,
                                'campaign_message' => $request->email_message,
                                'campaign_url_callback' => $request->email_url_callback,
                                'campaign_sent_status' => '2',
                            ]);
        }else{
            $save = DB::table('tr_campaign')
                    ->insert([
                                'recepient_group_id' => $request->recepient_group_id,
                                'campaign_title' => $request->campaign_title,
                                'campaign_subject' => $request->email_subject,
                                'campaign_message' => $request->email_message,
                                'campaign_url_callback' => $request->email_url_callback,
                                'campaign_sent_status' => '2',
                            ]);
        }

        if($save){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function destroy(Request $request){
        $save = DB::table('tr_campaign')->where('id',$request->id)->delete();

        if($save){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been delete'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }
}
