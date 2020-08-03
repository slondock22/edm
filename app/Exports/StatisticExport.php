<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;

class StatisticExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function __construct(string $id_campaign)
    {
        $this->id_campaign = $id_campaign;
    }

    public function collection()
    {
    	
        $sql = DB::table('tr_campaign_detail as a')
                    ->join('tr_campaign as b','a.campaign_id','b.id')
                    ->join('tr_recepient as c','a.recepient_id','c.id')
                    ->select('a.id','b.campaign_title','c.recepient_name','c.recepient_email','c.recepient_phone','c.recepient_company','a.sent_time_at','a.click_time_at','a.open_time_at');

        if($this->id_campaign != 'all'){
            $sql->where('a.campaign_id',$this->id_campaign);
        }


        $data = $sql->get();

        return $data;
    }
	
	public function headings(): array
    {
		
        return ["#","Campaign Title", "Name", "E-mail", "Phone", "Company", "Sent Time", "Click Time", "Open Time"];
    }
}
