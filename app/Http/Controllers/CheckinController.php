<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Checkin;
use Carbon\Carbon;


class CheckinController extends Controller
{
    public function index(){
        return view('admin.checkin.list_checkin');
    }

    public function checkin_table(){
        $attendance = DB::table('tr_attendance')->where('broadcast_event_id',19)
        // ->where('attendance_is_present','1')
        ->get();
        return Datatables::of($attendance)->make(true);
    }

    public function check(Request $request){
        $check = Checkin::where('id', $request->id)
                        ->update([
                            'attendance_is_present'=>'1',
                            'attendance_checkin_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
                            'checkin_by' => '2'
                            ]);
    }
}
