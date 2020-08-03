<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $table ="tr_broadcast";

    protected $fillable = ['broadcast_event_id','broadcast_recepient_id','broadcast_status'];

    public function event(){
       return $this->belongsToMany('App\Event', 'broadcast_event_id');
    }

    public function recepient(){
       return $this->belongsToMany('App\Recepient', 'broadcast_recepient_id');
    }
}
