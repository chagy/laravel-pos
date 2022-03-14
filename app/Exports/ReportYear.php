<?php 

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportYear implements FromView 
{
    public function __construct($yearStart,$yearEnd)
    {
        $this->yearStart = $yearStart;
        $this->yearEnd = $yearEnd;

    }

    public function view() : View 
    {
        $data  = [];
        if($this->yearStart && $this->yearEnd){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("YEAR(created_at) as y"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereRaw('YEAR(created_at) BETWEEN ? AND ?',[$this->yearStart,$this->yearEnd])
                        ->groupBy(['y'])
                        ->get();
        }

        

        return view('exports.year',[
            'data' => $data
        ]);
    }
}