<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class RecepientImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
    	 $insertCount = 0;
         $updateCount = 0;

        foreach ($rows as $row) 
        {
             $exist = DB::table('tr_recepient')
                            ->where('recepient_email',$row['email'])
                            ->first();

                if($exist == null){
                    $insertCount++;
                    $insert = DB::table('tr_recepient')
                            ->insert([
                                'recepient_name' => $row['name'],
                                'recepient_email' => $row['email'],
                                'recepient_company' => $row['company'],
                                'recepient_phone' => $row['phone'],
                                'recepient_source_from' => 'excel',
                                'is_active' => '1',
                            ]);
                }
                else{
                    $updateCount++;
                    $update = DB::table('tr_recepient')
                            ->where('recepient_email',$row['email'])
                            ->update([
                                'recepient_name' => $row['name'],
                                'recepient_company' => $row['company'],
                                'recepient_phone' => $row['phone'],
                            ]);
                }

        }

        $recepient_import_log = DB::table('tr_recepient_import_log')
                                                ->insert([
                                                'import_type'    => 'excel',
                                                'recepient_total_added' => $insertCount,
                                                'recepient_total_updated' => $updateCount, 
                                                ]);
    }
}
