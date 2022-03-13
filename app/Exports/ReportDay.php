<?php 

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportDay implements FromView 
{
    public function __construct($billNo,$employee,$dateStart,$dateEnd)
    {
        $this->billNo = $billNo;
        $this->employee = $employee;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;

    }

    public function view() : View 
    {
        $data  = DB::table('pos_orders')
                    ->select(
                        'pos_orders.created_at',
                        'pos_orders.id',
                        'users.name',
                        'pos_orders.psod_qty',
                        'pos_orders.psod_net_total'
                    )
                    ->join('users','users.id','=','pos_orders.customer_id')
                    ->where('pos_orders.psod_status',1);
        if($this->billNo){
            $data = $data 
                        ->where('pos_orders.id',$this->billNo);
        }

        if($this->employee){
            $data = $data 
                        ->where('pos_orders.employee_id',$this->employee);
        }

        if($this->dateStart && $this->dateEnd){
            $data = $data 
                        ->whereBetween('pos_orders.created_at',[$this->dateStart,$this->dateEnd]);
        }

        $data = $data 
                    ->get();

        return view('exports.day',[
            'data' => $data
        ]);
    }
}