<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkin;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendRegistrationEmailJob;
use App\Jobs\SendEmailJob;
use DB;
use Str;
use App\Recepient;
use App\Broadcast;
use Carbon\Carbon;


class RegisterController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email'     => 'required|exists:tr_recepient,recepient_email',
            'phone'     => 'required|numeric|not_in:0',
            'company'   => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        //Check field di table recepient null2 gak nialinya klo iya update
        $recepient_null = Recepient::where('recepient_email', $request->email)->first();
        if($recepient_null->name == '' || $recepient_null->company == NULL ){
            $update_recepient = Recepient::where('recepient_email', $request->email)
                                            ->update([
                                                'recepient_name'  => $request->name,
                                                'recepient_phone' => $request->phone,
                                                'recepient_company' => $request->company
                                            ]);
        }

        //Check If Data Register Exists
        $exist = DB::table('tr_attendance')
                    ->where('attendance_email',$request->email)
                    ->where('broadcast_event_id',$request->broadcast_event_id)
                    ->get();

        if(count($exist) > 0){
            return response()->json('Failed', 500);
        }

        $attendance = new Checkin;
        $attendance->attendance_name    = $request->name;
        $attendance->attendance_phone   = $request->phone;
        $attendance->attendance_email   = $request->email;
        $attendance->attendance_company = $request->company;
        $attendance->broadcast_event_id = $request->broadcast_event_id;
        $attendance->attendance_is_present = 0;
        // $attendance->attendance_qr_code = Str::random(6);

        $save = $attendance->save();

        //call to function register t2g mobile
        $registert2g = $this->registerT2G($request->email);
        
        if($save){
            $content['email'] = $request->email;

            dispatch(new SendRegistrationEmailJob($content));

            $response = response()->json('Success',200);
        }else{
            $response = response()->json('Failed', 500);
        }
        return $response;
    }

    public function sharing(Request $request){
        $validator = Validator::make($request->all(),[
            'email'     => 'required|unique:tr_attendance,attendance_email',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $exist_recepient = Recepient::where('recepient_email',$request->email)->first();

       

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
                    'recepient_email'    => $request->email,
                ]);
                
                $broadcast = new Broadcast;
                $broadcast->broadcast_event_id       = $request->broadcast_event_id;
                $broadcast->broadcast_recepient_id   = $recepient->id;
                $broadcast->broadcast_status         = 0;
                $broadcast->broadcast_verif_code     = sha1($recepient->id);
                
                $save = $broadcast->save();
        }

        $update_sharing_status = Broadcast::where('broadcast_verif_code', $request->verif_code)->update(['sharing_status'=>'1']);

        if($save){

            $content['email']         = $request->email;
            $content['name']          = '';
            $content['verif_code']    = $broadcast->broadcast_verif_code;

            dispatch(new SendEmailJob($content));

            $update_broadcast_time = Broadcast::where('id', $broadcast->id)
                                                ->update([
                                                'broadcast_status'  => 1,
                                                'broadcast_time'    => DB::raw('broadcast_time+1'), 
                                                'broadcast_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);
            $response = response()->json('Sharing',200);
            
        }else{
            $response = response()->json('Failed', 500);
        }
        return $response;
    }

    public function registerT2G($email){
        $client = new \GuzzleHttp\Client();
      
        $response = $client->request('POST', 'https://api2.trade2gov.com/oauth/token', [
            'form_params' => [   
                'grant_type' => 'client_credentials',
                'client_id' => 'jlYOtYDZP380fGyK',
                'client_secret' => 'K6qIgqkANnyKnGvStj8ECFo663qV54SbOevC1XQy',
            ]
        ]);

        $auth = json_decode((string)$response->getBody());

        //register account to t2g mobile
        $attendance = DB::table('tr_attendance')->where('attendance_email',$email)->get();

        foreach($attendance as $value){
       
        $req = $client->request('POST', 'https://api2.trade2gov.com/api/t2gmobile/user_event_register', [
            'headers'       => [
                                'Authorization' => 'Bearer ' . $auth->access_token,
                                'Accept' => 'application/json',
                               ],
            'form_params'   => [
                        'email'         => $value->attendance_email,
                        'name'          => $value->attendance_name,
                        'company'       => $value->attendance_company,
                        'phone'         => $value->attendance_phone,
                ]
            ]);
        $response = json_decode((string)$req->getBody());

        // dd($response);

        $update = DB::table('tr_attendance')->where('attendance_email',$value->attendance_email)
                                            ->update([
                                                'attendance_password' => $response->msg->password,
                                                'attendance_qr_code'  => $response->msg->qrcode,
                                            ]);
        }
      return "success";
    }

    public function create(){
        return view('admin.register.create_register');
    }

    public function register_manual(Request $request){

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email'     => 'required',
            'phone'     => 'required|numeric',
            'company'   => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $exist_recepient = Recepient::where('recepient_email',$request->email)->first();

        if(!$exist_recepient){
        //Insert ke tabel recepient
            $recepient = Recepient::create([
                'recepient_name'     => $request->name,
                'recepient_email'    => $request->email,
                'recepient_phone'    => $request->phone,
                'recepient_company'  => $request->company,
            ]);
            
        //Insert ke tabel Broadcast
            $broadcast = new Broadcast;
            $broadcast->broadcast_event_id       = $request->broadcast_event_id;
            $broadcast->broadcast_recepient_id   = $recepient->id;
            $broadcast->broadcast_status         = 0;
            $broadcast->broadcast_verif_code     = sha1($recepient->id);
            $verif_code = $broadcast->broadcast_verif_code;
            $save = $broadcast->save();

            $broadcast_id = $broadcast->id;

        }
        else{
            //check exist in broadcast list
            $exist_broadcast = Broadcast::where('broadcast_recepient_id',$exist_recepient->id)->first();

            if($exist_broadcast){
                $verif_code = $exist_broadcast->verif_code;
                $broadcast_id = $exist_broadcast->id;
                $save = 1;
            }else{
                //Insert ke tabel Broadcast
                $broadcast = new Broadcast;
                $broadcast->broadcast_event_id       = $request->broadcast_event_id;
                $broadcast->broadcast_recepient_id   = $exist_recepient->id;
                $broadcast->broadcast_status         = 0;
                $broadcast->broadcast_verif_code     = sha1($exist_recepient->id);
                $verif_code = $broadcast->broadcast_verif_code;
                $save = $broadcast->save();

                $broadcast_id = $broadcast->id;

            }
        }

            if($save){
        
        //Email Invitation ke Pelanggan
            $content['email']         = $request->email;
            $content['name']          = $request->name;
            $content['verif_code']    = $verif_code;

            // $send_invitation = dispatch(new SendEmailJob($content));

            $update_broadcast_time = Broadcast::where('id', $broadcast_id)
                                                ->update([
                                                'broadcast_status'  => 1,
                                                'broadcast_time'    => DB::raw('broadcast_time+1'), 
                                                'broadcast_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);
            }
          //Insert ke tabel attendance
            $attendance = new Checkin;
            $attendance->attendance_name    = $request->name;
            $attendance->attendance_phone   = $request->phone;
            $attendance->attendance_email   = $request->email;
            $attendance->attendance_company = $request->company;
            $attendance->broadcast_event_id = $request->broadcast_event_id;
            $attendance->attendance_is_present = 1;
            $attendance->checkin_by = 2;
            $attendance->attendance_checkin_at = Carbon::now()->setTimezone('Asia/Jakarta');

            // $attendance->attendance_qr_code = Str::random(6);

            $save_attendance = $attendance->save();

            if($save_attendance){

            //call to function register t2g mobile
            // $registert2g = $this->registerT2G($request->email);

            $data['email'] = $request->email;

            // $send_confirmation = dispatch(new SendRegistrationEmailJob($data));

            }
            
            return response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
            
    }
}
