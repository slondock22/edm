<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepient extends Model
{
    protected $table = 'tr_recepient';

    protected $fillable = ['recepient_name','recepient_email','recepient_phone','recepient_company'];
}
