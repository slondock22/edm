<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\CampaignApiController as CampaignApi;
use Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Request as Req;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use Carbon\Carbon;
use Validator;
use Mail;



class CampaignController extends Controller
{
	public function __construct(CampaignApi $campaignApi){
        $this->campaignApi = $campaignApi;
    }

    public function create($value='')
    {
        return view('admin.campaign.create_campaign');
    }

    public function list()
    {
        //
        return view('admin.campaign.list_campaign');
    }

     public function table(){
        $data = $this->campaignApi->getCampaign();
        return Datatables::of($data)->make(true);
    }

    public function view(Request $request)
    {
        $campaign = DB::table('tr_campaign')->where('id',$request->id)->first();
        $edit = $request->action;

        return view('admin.campaign.detail_campaign')->with(compact('campaign','edit'));
    }

    public function url_callback()
    {
    	$campaign  = base64url_decode(Input::get('utm_campaign'));
    	$group     = base64url_decode(Input::get('utm_group'));
    	$recepient = base64url_decode(Input::get('utm_recepient'));
    	$url = Input::get('url_callback');

    	//update stat detail
        $ip_address = Req::ip();
        $location = \Location::get($ip_address);
        $location_ip_lat = "";
        $location_ip_long = "";
        $location_country_name = "";
        $location_country_code = "";
        $location_region_name = "";
        $location_city_name = "";
        $location_zip_code = "";

        if($location){
            $location_ip_lat = $location->latitude;
            $location_ip_long = $location->longitude;
            $location_country_name = $location->countryName;
            $location_country_code = $location->countryCode;
            $location_region_name = $location->regionName;
            $location_city_name = $location->cityName;
            $location_zip_code = $location->zipCode;
        }

        $exist = DB::table('tr_campaign_detail')
                        ->where('campaign_id',$campaign)
                        ->where('recepient_group_id',$group)
                        ->where('recepient_id',$recepient)
                        ->where('click_time',1)
                        ->first();



        if($exist == null){
    
        	$update = DB::table('tr_campaign_detail')
                            ->where('campaign_id',$campaign)
                            ->where('recepient_group_id',$group)
                            ->where('recepient_id',$recepient)
                            ->update([
                                'click_time' => 1,
                                'click_time_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
                                'ip_address' => $ip_address,
                                'location_ip_lat' => $location_ip_lat, 
                                'location_ip_long' => $location_ip_long,
                                'location_country_name' => $location_country_name,
                                'location_country_code' => $location_country_code,
                                'location_region_name' => $location_region_name,
                                'location_city_name' => $location_city_name,
                                'location_zip_code' => $location_zip_code,
                            ]);

        }


    	return Redirect::to($url);
    }

    public function showUnsubscribe($id_recepient)
    {
        $recepient_id = base64url_decode($id_recepient);

        return view('mail.unsubscribe')->with(compact('recepient_id'));
    }

    public function storeUnsubscribe(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'recepient_id'  => 'required',
            'unsubs_option' => 'required',
        ]);     

         if ($validator->fails())
        {
             return redirect()->back()->with(['message' => 'Please Choose At Least One Reason', 'alert' => 'alert-danger']);  
        }


        $is_active = 0;
        $unsubs_until = "";

        if($request->unsubs_option == 1){
            $is_active = 0;
            $unsubs_until = "";
            $redirect = redirect('/confirm-unsubscribe');
        }
        elseif ($request->unsubs_option == 2) {
            $is_active = 0;
            $unsubs_until = Carbon::now()->addMonths($request->unsubs_until);
            $redirect = redirect('/confirm-unsubscribe');
        }
        else{
            $is_active = 1;
            $unsubs_until = "";
            $redirect = redirect()->back()->with(['message' => 'Thank you for trusting us, your email is still in our marketing lists ', 'alert' => 'alert-success']);
        }

        $unsub = DB::table('tr_recepient')
                ->where('id',$request->recepient_id)
                ->update([
                    'is_active' => $is_active,
                    'unsubscribe_until' => $unsubs_until
                    ]);

        if($unsub){
            return $redirect;
        }


    }

    public function showConfirmUnsubscribe()
    {
        return view('mail.confirm_unsubscribe');
    }

    public function sendMonday()
    {
        $data = array(
                    'mail_to' => 'budi@edi-indonesia.co.id',
                    'name'    => 'Budi Setiawan',
                );

         Mail::send('mail.monday_campaign', $data, function($message) use ($data)
            {
                $message->to($data['mail_to'], $data['name'])
                    ->cc(['airlangga.pasmika@edi-indonesia.co.id', 'masagung@edi-indonesia.co.id'])
                    ->from('noreply@monday.edi-indonesia.co.id','EDII - Monday')
                    ->subject('EDII - Monday Template Email Example');
            });

         return "sukses";
    }
}
