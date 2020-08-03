<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recepient;
use DB;

class MasterApiController extends Controller
{
    public function getRecepient(){
        return Recepient::where('is_active','1')->orderBy('id','desc')->get();
    }

    public function getRecepientGroup()
    {
    	$data = DB::table('tm_recepient_group as a')
    				->leftjoin('tr_recepient_by_group as b','a.id','b.recepient_group_id')
    				->select(DB::raw('a.id, a.recepient_group_name, count(b.recepient_group_id) as recepient_total'))
    				->groupBy('a.id')
    				->get();
    	return $data;

    }

    public function getRecepientGroupList()
    {
    	$data = DB::table('tr_recepient_by_group as a')
    				->leftjoin('tm_recepient_group as b', 'a.recepient_group_id','b.id')
    				->select('b.id','b.recepient_group_name',DB::raw('count(a.recepient_id) as recepient_total'))
    				->groupBy('a.recepient_group_id')
    				->get();
    	return $data;
    }

    public function addRecepient()
    {
        $data = DB::table('tr_recepient')
                    ->where('is_active','1')
                    // ->where('crm_table','leads')
                    ->get();

        // dd($data);

        $recepient_group_id = 3;

         foreach ($data as $value) {
                $exist = DB::table('tr_recepient_by_group')
                            ->where('recepient_group_id',$recepient_group_id)
                            ->where('recepient_id',$value->id)
                            ->first();

                if($exist == null){
                   
                    $insert = DB::table('tr_recepient_by_group')
                            ->insert([
                                'recepient_id' => $value->id,
                                'recepient_group_id' => $recepient_group_id,
                            ]);
                }

            }

        if($insert){
            return "Success";
        }else{
            return "Error";
        }
    }
}
