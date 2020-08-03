<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'mst_cat_event';

    public function event(){
        return $this->hasMany('App/Event');
    }

    
}
