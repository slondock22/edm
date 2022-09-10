<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MasterApiController as MasterApi;
use Datatables;
use DB;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RecepientImport;
use Illuminate\Support\Facades\File; 

class MasterController extends Controller
{
    public function __construct(MasterApi $masterApi){
        $this->masterApi = $masterApi;
    }


    //Recepient/Customer
    public function recepient(){
        $last_sync_db = DB::table('tr_recepient_import_log')
                            ->where('import_type','crm')
                            ->select('created_at')
                            ->orderBy('created_at','desc')
                            ->first();

        $last_sync_excel = DB::table('tr_recepient_import_log')
                            ->where('import_type','excel')
                            ->select('created_at')
                            ->orderBy('created_at','desc')
                            ->first();

        return view('admin.master.list_recepient')->with(compact('last_sync_db','last_sync_excel'));
    }

    public function recepient_table(){
        $data = $this->masterApi->getRecepient();
        return Datatables::of($data)->make(true);
    }

    public function recepient_create()
    {
        //
        return view('admin.master.create_recepient');
    }

    public function recepient_store(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'recepient_name'     => 'required',
            'recepient_email'    => 'required|email|unique:tr_recepient,recepient_email',
            'recepient_company'  => 'required',
            'recepient_phone'    => 'required',

        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $insert = DB::table('tr_recepient')->insert([
                'recepient_name'    => $request->recepient_name,
                'recepient_email'   => $request->recepient_email,
                'recepient_company' => $request->recepient_company,
                'recepient_phone'   => $request->recepient_phone,
                'recepient_source_from' => 'app',
                'is_active' => '1',
            ]);

        if($insert){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function recepient_view(Request $request)
    {
       $recepient = DB::table('tr_recepient')->where('id',$request->id)->first();

       return view('admin.master.edit_recepient')->with(compact('recepient'));
    }

    public function recepient_update(Request $request)
    {

       $validator = Validator::make($request->all(),[
            'recepient_name'     => 'required',
            'recepient_email'    => 'required|email',
            'recepient_company'  => 'required',
            'recepient_phone'    => 'required',

        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $exist = DB::table('tr_recepient')->where('recepient_email',$request->recepient_email)->where('id','!=',$request->id)->where('is_active','1')->first();

        if($exist != null){
             return $response = response()->json(['exist'=>'Failed','icon'=>'error', 'msg'=>'Email is already exist in other users'],200);
        }

        $update = DB::table('tr_recepient')
            ->where('id',$request->id)
            ->update([
                'recepient_name'    => $request->recepient_name,
                'recepient_email'   => $request->recepient_email,
                'recepient_company' => $request->recepient_company,
                'recepient_phone'   => $request->recepient_phone
            ]);

        if($update){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function recepient_delete(Request $request)
    {
        $is_not_active = DB::table('tr_recepient')
                            ->where('id',$request->id)
                            ->update([
                                'is_active' => '0'
                                ]);


        if($is_not_active){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been deleted'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function import_recepient(Request $request)
    {

       $type = $request->type;

       if($type == 'db'){

            $leads  = DB::connection('mysql2')
                    ->table('leads')
                    ->select('client_name as recepient_name','email as recepient_email','phone as recepient_phone','company_name as recepient_company')
                    ->addSelect(DB::raw("'leads' as crm_table"));

            $crm = DB::connection('mysql2')
                    ->table('customers as a')
                    ->join('companies as b','a.company_id','b.id')
                    ->select(DB::raw("CONCAT(a.first_name,' ',a.last_name) as recepient_name"),'a.email as recepient_email','a.phone_number as recepient_phone','b.name as recepient_company')
                    ->addSelect(DB::raw("'customers' as crm_table"))
                    ->union($leads)
                    ->get();

            $insertCount = 0;
            $updateCount = 0;

            foreach ($crm as $value) {
                $exist = DB::table('tr_recepient')
                            ->where('recepient_email',$value->recepient_email)
                            // ->where('is_active','1')
                            ->first();

                if($exist == null){
                    $insertCount++;
                    $insert = DB::table('tr_recepient')
                            ->insert([
                                'recepient_name' => $value->recepient_name,
                                'recepient_email' => $value->recepient_email,
                                'recepient_company' => $value->recepient_company,
                                'recepient_phone' => $value->recepient_phone,
                                'recepient_source_from' => 'crm',
                                'is_active' => '1',
                                'crm_table' => $value->crm_table,
                            ]);
                }
                else{
                    $updateCount++;
                    $update = DB::table('tr_recepient')
                            ->where('recepient_email',$value->recepient_email)
                            ->update([
                                'recepient_name' => $value->recepient_name,
                                'recepient_company' => $value->recepient_company,
                                'recepient_phone' => $value->recepient_phone,
                                'recepient_source_from' => 'crm',
                                'crm_table' => $value->crm_table,
                            ]);
                }

            }

            $recepient_import_log = DB::table('tr_recepient_import_log')
                                                ->insert([
                                                'import_type'    => 'crm',
                                                'recepient_total_added' => $insertCount,
                                                'recepient_total_updated' => $updateCount, 
                                                ]);
       }

       elseif($type == 'excel'){

            $validator = Validator::make($request->all(),[
                'file' => 'required|mimes:csv,xls,xlsx'
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
            }

            $file = $request->file('file');
 
            // membuat nama file unik
            $nama_file = rand().$file->getClientOriginalName();

            // upload ke folder di dalam folder public
            $file->move('import_recepient',$nama_file);

            // import data
            Excel::import(new RecepientImport, public_path('/import_recepient/'.$nama_file));   

            //delete file
            File::delete(public_path('/import_recepient/'.$nama_file));

            $recepient_import_log = true;

       }

       if($recepient_import_log){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function download_template_excel(){

            $file = public_path()."/template_excel/Recepient_Import_Template.xlsx";
            $headers = array('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',);
            return \Response::download($file, 'Recepient_Import_Template.xlsx',$headers);
    }


    //Recepient Group

    public function recepient_group(){
        return view('admin.master.list_recepient_group');
    }

    public function recepient_group_table(){
        $data = $this->masterApi->getRecepientGroup();
        return Datatables::of($data)->make(true);
    }

    public function recepient_group_create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name_group'  => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }

        $insert = DB::table('tm_recepient_group')->insert([
                'recepient_group_name' => $request->name_group
            ]);

        if($insert){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;

    }

    public function recepient_group_view(Request $request){
        
        $group = DB::table('tm_recepient_group')->where('id',$request->id)->first();
        $recepient = DB::table('tr_recepient as a')
                        ->select('a.*')
                        ->join('tr_recepient_by_group as b','b.recepient_id','a.id')
                        ->where('b.recepient_group_id',$request->id)
                        // ->where('a.is_active','1')
                        ->get();

        $list_recepient = DB::table('tr_recepient_by_group')->where('recepient_group_id',$request->id)->pluck('recepient_id');
        $recepientAll = DB::table('tr_recepient')
                        ->where('is_active','1')
                        ->whereNotIn('id',$list_recepient)
                        ->get();

        return view('admin.master.detail_recepient_group')->with(compact(['group','recepient','recepientAll'])); 
    }

    public function recepient_group_delete(Request $request){
        
        $detail = DB::table('tr_recepient_by_group')->where('recepient_group_id',$request->id)->delete();
        $master = DB::table('tm_recepient_group')->where('id',$request->id)->delete();


        if($master){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been deleted'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function add_recepient_group(Request $request){
        $insert = DB::table('tr_recepient_by_group')->insert([
                'recepient_id' => $request->recepient_id,
                'recepient_group_id' => $request->recepient_group_id
        ]);

        if($insert){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been saved'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function remove_recepient_group(Request $request){
        
        $delete = DB::table('tr_recepient_by_group')->where([
                'recepient_id' => $request->recepient_id,
                'recepient_group_id' => $request->recepient_group_id
            ])
            ->delete();

        if($delete){
            $response = response()->json(['code'=>'Success','icon'=>'success', 'msg'=>'The record has been delete'],200);
        }else{
            $response = response()->json(['code'=>'Failed', 'msg'=>''], 500);
        }
        return $response;
    }

    public function peserta_doorprize($id_event){
        $data = DB::table('tr_attendance')
                    ->select('attendance_name','attendance_company')
                    ->where('broadcast_event_id', $id_event)
                    ->groupBy('attendance_name','attendance_company')
                    ->get();
        
        return \Response::json($data);
    }
}
