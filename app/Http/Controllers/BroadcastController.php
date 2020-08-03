<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BroadcastApiController as BroadcastApi;
use Datatables;
use App\Jobs\SendEmailJob;
use App\Jobs\SendTicketJob;
use App\Jobs\SendCampaignRegisterEmailJob;
use App\Jobs\SendSmartClearBlastJob;
use App\Broadcast;
use App\Recepient;
use App\Event;
use App\Checkin;
use DB;
use PDF;
use File;
use Carbon\Carbon;

class BroadcastController extends Controller
{
    public $path;

    public function __construct(BroadcastApi $broadcastApi){
        $this->broadcastApi = $broadcastApi;
        $this->path = storage_path('app/public/ticket');
    }

    public function create()
    {
        //
        return view('admin.broadcast.create_broadcast');
    }

    public function list()
    {
        //
        return view('admin.broadcast.list_broadcast');
    }

    public function table(){
        $data = $this->broadcastApi->getBroadcast();
        return Datatables::of($data)->make(true);
    }

    public function sendMailAll(Request $request){
        $content = array();
        $broadcast = DB::table('tr_broadcast as a')
                        ->select('a.id','b.recepient_email','b.recepient_name','a.broadcast_verif_code')
                        ->join('tr_recepient as b','a.broadcast_recepient_id','b.id')
                        ->join('tr_event as c','a.broadcast_event_id','c.id')
                        ->where('a.broadcast_event_id',$request->id)
                        ->whereRaw('b.recepient_email NOT IN (SELECT d.attendance_email FROM tr_attendance as d WHERE d.attendance_email = b.recepient_email)')
                        // ->whereIn('a.id',[1])
                        // ->where('a.broadcast_status',0)
                        ->get();
        //  dd($broadcast);

        foreach($broadcast as $value){
            $content['email']         = $value->recepient_email;
            $content['name']          = $value->recepient_name;
            $content['verif_code']    = $value->broadcast_verif_code;

            dispatch(new SendEmailJob($content));

            $update_broadcast_time = Broadcast::where('id', $value->id)
                                                ->update([
                                                'broadcast_status'  => 1,
                                                'broadcast_time'    => DB::raw('broadcast_time+1'), 
                                                'broadcast_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);
        }
    }

    public function sendMailId(Request $request){
        $content = array();
        $broadcast = DB::table('tr_broadcast as a')
                        ->select('a.id','b.recepient_email','b.recepient_name','a.broadcast_verif_code')
                        ->leftjoin('tr_recepient as b','a.broadcast_recepient_id','b.id')
                        ->leftjoin('tr_event as c','a.broadcast_event_id','c.id')
                        ->where('a.id',$request->id)
                        // ->whereIn('a.broadcast_recepient_id',[1])
                        // ->where('a.broadcast_status',0)
                        ->get();
        // dd($broadcast);

        foreach($broadcast as $value){
            $content['email']         = $value->recepient_email;
            $content['name']          = $value->recepient_name;
            $content['verif_code']    = $value->broadcast_verif_code;

            dispatch(new SendEmailJob($content));

            $update_broadcast_time = Broadcast::where('id', $value->id)
                                                ->update([
                                                'broadcast_status'  => 1,
                                                'broadcast_time'    => DB::raw('broadcast_time+1'), 
                                                'broadcast_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);
        }
    }

    public function sendTicketAll(Request $request){
        $content = array();
        $attendance = DB::table('tr_attendance')
                        // ->whereIn('id',[124])
                        ->where('ticket_sent_status',0)
                        ->get();
        // dd($attendance);

        foreach($attendance as $value){
            $content['id']         = $value->id;
            $content['email']         = $value->attendance_email;
            $content['name']          = $value->attendance_name;
            $content['phone']         = $value->attendance_phone;
            $content['company']       = $value->attendance_company;
            $content['attendance_qr_code']  = $value->attendance_qr_code;
            $content['password']       = $value->attendance_password;
            // dd($content);
            $pdf = PDF::loadView('print.tiket',$content);
            // $pdf->setPaper('A4');
            if(!File::isDirectory($this->path)){
                File::makeDirectory($this->path);
            }
            
            $filename = 'Ticket-'.$value->id.'.pdf';
            $data = $pdf->save($this->path . '/' . $filename);

            dispatch(new SendTicketJob($content));

            $update_ticket_time = Checkin::where('id', $value->id)
                                                ->update([
                                                'ticket_sent_status'  => 1,
                                                'ticket_sent_time'    => DB::raw('ticket_sent_time+1'), 
                                                'ticket_sent_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);

            // dd('done');
        }
    }

    public function sendCampaignRegister(){
        $content = array();
        $attendance = DB::table('tr_attendance')
                        ->whereNotIn('id',[124, 208, 210,198])
                        // ->where('id',198)

                        // ->where('ticket_sent_status',0)
                        ->get();
        // dd($attendance);

        foreach($attendance as $value){
            $content['id']         = $value->id;
            $content['email']         = $value->attendance_email;
            $content['name']          = $value->attendance_name;
            // dd($content);

            dispatch(new SendCampaignRegisterEmailJob($content));

            // dd('done');
        }
    }

    public function sendSmartClearBlast(){
        $content = array();
        $attendance = DB::table('tr_broadcast')
                        ->leftjoin('tr_recepient','tr_broadcast.broadcast_recepient_id','tr_recepient.id')
                        ->where('tr_broadcast.broadcast_event_id','14')
                        // ->whereIn('tr_recepient.id',[546])
                        // ->where('id',198)

                        // ->where('ticket_sent_status',0)
                        ->get();
        // dd($attendance);

        foreach($attendance as $value){
            $content['id']            = $value->broadcast_recepient_id;
            $content['email']         = $value->recepient_email;
            $content['name']          = $value->recepient_name;
            // dd($content);

            dispatch(new SendSmartClearBlastJob($content));

            // dd('done');
        }
    }

    public function sendTicketId(Request $request){
        $content = array();
        
        $attendance = DB::table('tr_attendance')
                        ->where('id',$request->id)
                        // ->where('ticket_sent_status',0)
                        ->get();
        // dd($attendance);

        foreach($attendance as $value){
            $content['id']         = $value->id;
            $content['email']         = $value->attendance_email;
            $content['name']          = $value->attendance_name;
            $content['phone']         = $value->attendance_phone;
            $content['company']       = $value->attendance_company;
            $content['attendance_qr_code']  = $value->attendance_qr_code;
            $content['password']       = $value->attendance_password;
            // dd($content);
            $pdf = PDF::loadView('print.tiket',$content);
            // $pdf->setPaper('A4');
            if(!File::isDirectory($this->path)){
                File::makeDirectory($this->path);
            }
            
            $filename = 'Ticket-'.$value->id.'.pdf';
            $data = $pdf->save($this->path . '/' . $filename);

            dispatch(new SendTicketJob($content));

            $update_ticket_time = Checkin::where('id', $value->id)
                                                ->update([
                                                'ticket_sent_status'  => 1,
                                                'ticket_sent_time'    => DB::raw('ticket_sent_time+1'), 
                                                'ticket_sent_time_at' => Carbon::now()->setTimezone('Asia/Jakarta')
                                                ]);

            // dd('done');
        }
    }

    public function view(Request $request){
        $event = Event::find($request->id);
        $recepient = DB::table('tr_broadcast as a')
        ->select('a.id','a.broadcast_recepient_id','b.recepient_name','b.recepient_email','b.recepient_phone','b.recepient_company','a.broadcast_time','a.broadcast_time_at')
        ->join('tr_recepient as b','a.broadcast_recepient_id','b.id')
        ->where('a.broadcast_event_id', $request->id)
        ->orderBy('a.id', 'desc')
        ->get();

        return view('admin.broadcast.detail_broadcast')->with(compact(['event','recepient'])); 
    }

    // public function detailTable($id=""){
    //     $data = DB::table('tr_broadcast as a')
    //     ->select('a.id','a.broadcast_recepient_id','b.recepient_name','b.recepient_email','b.recepient_phone','b.recepient_company','a.broadcast_time','a.broadcast_time_at')
    //     ->join('tr_recepient as b','a.broadcast_recepient_id','b.id')
    //     ->where('a.broadcast_event_id', $id)
    //     ->get();
    //     return Datatables::of($data)->make(true);
    // }

    // public function deleteFile(){
    //     $filename = 'Ticket-rqtrY7.pdf';
    //     $myFile = $this->path.'/'.$filename;
    //     File::delete($myFile);
    //     return "success";
    // }
}
