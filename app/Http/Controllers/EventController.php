<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\EventApiController as EventApi;
use Datatables;

class EventController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(EventApi $eventApi){
        $this->eventApi = $eventApi;
    }

    public function create()
    {
        //
        return view('admin.event.create_event');
    }

    public function list()
    {
        //
        return view('admin.event.list_event');
    }

    public function table(){
        $data = $this->eventApi->getEventAll();
        return Datatables::of($data)->make(true);
    }
}
