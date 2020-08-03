<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tr_event';
    
    public function eventCategory(){
       return $this->belongsTo('App\EventCategory','event_cat_id');
    }
}
