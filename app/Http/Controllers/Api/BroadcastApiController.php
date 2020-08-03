<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Broadcast;
use App\Recepient;
use DB;
use Validator;

class BroadcastApiController extends Controller
{
    public function getBroadcast(){
       $broadcast = DB::table('tr_broadcast as a')
                        ->select(DB::raw('count(a.broadcast_recepient_id) as recepient_total, b.event_name, a.broadcast_event_id'))
                        ->leftjoin('tr_event as b','a.broadcast_event_id','b.id')
                        ->groupBy('a.broadcast_event_id','b.event_name')
                        ->get();
        return $broadcast;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'broadcast_event_id'  => 'required',
            'recepient_name'      => 'required',
            'recepient_email'     => 'required|email',
            'recepient_phone'     => 'required',
            'recepient_company'   => 'required'
        ]);

        if ($validator->fails())
        {
             return response()->json(['errors' => $validator->errors()->all()]);  
        }

        $exist_recepient = Recepient::where('recepient_email',$request->recepient_email)->first();

        if($exist_recepient){

            $exist_recepient_on_event = Broadcast::where('broadcast_recepient_id',$exist_recepient->id)
                                                    ->where('broadcast_event_id', $request->broadcast_event_id)
                                                    ->first();
            
            if($exist_recepient_on_event){
                return response()->json(['code'=>'Failed','icon'=>'error', 'msg'=>'Email was taken on this event'], 200);
            }else{

                $broadcast = new Broadcast;
                $broadcast->broadcast_event_id       = $request->broadcast_event_id;
                $broadcast->broadcast_recepient_id   = $exist_recepient->id;
                $broadcast->broadcast_status         = 0;
                $broadcast->broadcast_verif_code     = sha1($exist_recepient->id);
                
                $save = $broadcast->save();
              
            }
        }else{
                $recepient = Recepient::create([
                    'recepient_name'     => $request->recepient_name,
                    'recepient_email'    => $request->recepient_email,
                    'recepient_phone'    => $request->recepient_phone,
                    'recepient_company' => $request->recepient_company,
                ]);
                
                $broadcast = new Broadcast;
                $broadcast->broadcast_event_id       = $request->broadcast_event_id;
                $broadcast->broadcast_recepient_id   = $recepient->id;
                $broadcast->broadcast_status         = 0;
                $broadcast->broadcast_verif_code     = sha1($recepient->id);
                
                $save = $broadcast->save();
        }

        if($save){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function destroy(Request $request){
        $save = Broadcast::where('broadcast_event_id',$request->id)->delete();

        if($save){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }
}
