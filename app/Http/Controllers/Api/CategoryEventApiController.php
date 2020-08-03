<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventCategory;
use Auth;

class CategoryEventApiController extends Controller
{
    
    public function getCategoryEventAll(){
        return EventCategory::all();
    }

    public function store(Request $request){

        if($request->added_by == '' || $request->added_by == NULL){
            $added_by = Auth::user()->id;
        }
        else{
            $added_by = $request->added_by;
        }

        $cat_event = new EventCategory;
        $cat_event->cat_event_description  = $request->cat_event_description;
        $cat_event->added_by               = $added_by;
        
        $save = $cat_event->save();

        if($save){
            $response = response()->json('Success',200);
        }else{
            $response = response()->json('Failed', 500);
        }
        return $response;

    }
}
