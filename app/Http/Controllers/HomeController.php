<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index($verif_code =""){
        $attendance = DB::table('tr_broadcast as a')
                        ->select('a.broadcast_verif_code as verif_code','b.recepient_name as name','b.recepient_email as email','b.recepient_phone as phone','b.recepient_company as company','a.sharing_status','a.broadcast_event_id')
                        ->join('tr_recepient as b','a.broadcast_recepient_id','b.id')
                        ->join('tr_event as c','a.broadcast_event_id','c.id')
                        ->where('a.broadcast_verif_code',$verif_code)
                        ->first(); 
                            
        if($attendance){
            $exist = DB::table('tr_attendance')->where('attendance_email',$attendance->email)->where('broadcast_event_id',$attendance->broadcast_event_id)->first();
            if(!$exist){
                $exist = 'unregistered';
            }
            return view('landing2.index2')->with(['attendance' => $attendance, 'exist' => $exist, 'verif_code' => 'true']);
        }
        return "Wrong verification code, Please contact our administrator marketing@edi-indonesia.co.id";
    }

    public function index2()
    {return view('landing2.index2')->with(['exist'=> '']);
    }

    public function doorprize(){
        return view('landing.doorprize');
    }

    public function doorprizev2(){
        return view('landing.doorprizev2');
    }

    public function welcome(){
        return view('landing.welcome');
    }

    public function welcome2(){
        return view('landing2.welcome2');
    }

    public function ble(){
        return view('landing.ble');
    }
}
