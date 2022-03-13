<?php 

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportMonth implements FromView 
{
    public function __construct($year)
    {
        $this->year = $year;

    }

    public function view() : View 
    {
        $data  = [];
        if($this->year){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("MONTH(created_at) as m"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereYear('created_at',$this->year)
                        ->groupBy(['m'])
                        ->get();
        }

        

        return view('exports.month',[
            'data' => $data
        ]);
    }
}