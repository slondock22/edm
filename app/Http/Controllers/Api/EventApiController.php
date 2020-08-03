<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\EventCategory;
use Carbon\Carbon;
use Image;
use File;
use Validator;


class EventApiController extends Controller
{

    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = storage_path('app/public/poster');
    }


    public function getEventAll(){
        return Event::all();
    }

    public function store(Request $request){
     
       $validator =  Validator::make($request->all(), [
            'event_name'    => 'required',
            'event_place'   => 'required',
            'event_time_start' => 'required',
            'event_cat_id' => 'required',
            'event_participant_total' => 'required',
            'event_city' => 'required',
            'event_end' => 'required',
            'event_poster'  => 'image|mimes:jpg,png,jpeg'
        ]);

         if ($validator->fails())
        {
             return response()->json(['errors' => $validator->errors()->all()]);  
        }

        
         //Create Directory if not exists
        if(!File::isDirectory($this->path)){
            File::makeDirectory($this->path);
        }
		
        $file = $request->file('event_poster');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        Image::make($file)->save($this->path . '/' . $fileName);


        $event = new Event;
        $event->event_name          = $request->event_name;
        $event->event_cat_id        = $request->event_cat_id;
        $event->event_description   = $request->event_description;
        $event->event_place         = $request->event_place;
        $event->event_city          = $request->event_city;
        $event->event_participant_total = $request->event_participant_total;
        $event->event_time_start    = $request->event_time_start;
        $event->event_time_end        = $request->event_time_end;
        $event->event_poster_filename = $fileName;
        $event->event_poster_filepath = $this->path;
        
        $save = $event->save();

        if($save){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json('Failed', 500);
        }
        return $response;

    }
}
