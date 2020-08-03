<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use Excel;
use App\Exports\StatisticExport;
use Illuminate\Support\Facades\Input;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.dashboard');
    }

    public function topStatistic()
    {
        $recepient  = DB::table('tr_recepient')->count();
        $event      = DB::table('tr_event')->count();
        $attendees  = DB::table('tr_attendance')->count();
        $campaign   = DB::table('tr_campaign')->where('campaign_sent_status','1')->count();

        $data = array(
                            'recepient' => $recepient,
                            'event'     => $event,
                            'attendees' => $attendees,
                            'campaign'  => $campaign 
                        );
        return \Response::json($data);
    }

    public function circleStatistic($id_campaign='')
    {
        if($id_campaign == 'all'){
            $data = DB::table('tr_campaign_detail')
                    ->select(DB::raw('count(recepient_group_id) as total_recepient, sum(sent_time) as sent_time, sum(click_time) as click_time, sum(open_time) as open_time'))
                    ->first();
        }else{
             $data = DB::table('tr_campaign_detail')
                    ->select(DB::raw('count(recepient_group_id) as total_recepient, sum(sent_time) as sent_time, sum(click_time) as click_time, sum(open_time) as open_time'))
                    ->where('campaign_id',$id_campaign)
                    ->groupBy('campaign_id')
                    ->first();
        }

           return \Response::json($data);
    }

    public function detailStatistic($id_campaign='')
    {
         $sql = DB::table('tr_campaign_detail as a')
                    ->join('tr_campaign as b','a.campaign_id','b.id')
                    ->join('tr_recepient as c','a.recepient_id','c.id')
                    ->select('a.id','b.campaign_title','c.recepient_name','c.recepient_email','c.recepient_phone','c.recepient_company','a.sent_time_at','a.click_time_at','a.open_time_at');

        if($id_campaign != 'all'){
            $sql->where('a.campaign_id',$id_campaign);
        }


        $data = $sql->get();

        return Datatables::of($data)->make(true);

    }

    public function downloadStatistic($id_campaign)
    {
         $campaign = DB::table('tr_campaign')->select('campaign_title')->where('id',$id_campaign)->first();
		 $filename = 'Statistik - '.$campaign->campaign_title.'.xlsx';
		
         return Excel::download(new StatisticExport($id_campaign), $filename);
    }

}
