<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function day(Request $request)
    {
        $billNo = $request->billNo;
        $employee = $request->employee;
        
        $dateEnd = $request->dateEnd ? $request->dateEnd : date("Y-m-d");
        $dateStart = $request->dateStart ? $request->dateStart : date("Y-m-d",strtotime("-1 month",strtotime($dateEnd)));

        $employees = User::where('type',1)->get();

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
        if($billNo){
            $data = $data 
                        ->where('pos_orders.id',$billNo);
        }

        if($employee){
            $data = $data 
                        ->where('pos_orders.employee_id',$employee);
        }

        if($dateStart && $dateEnd){
            $data = $data 
                        ->whereBetween('pos_orders.created_at',[$dateStart,$dateEnd]);
        }

        $data = $data 
                    ->get();
        

        return view('report.day',[
            'billNo' => $billNo,
            'employee' => $employee,
            'dateEnd' => $dateEnd,
            'dateStart' => $dateStart,
            'employees' => $employees,
            'data' => $data
        ]);
    }
}
