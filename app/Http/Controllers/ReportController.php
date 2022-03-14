<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\User;
use App\Helpers\Helper;
use App\Exports\ReportDay;
use App\Exports\ReportYear;
use App\Exports\ReportMonth;
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

    public function dayExcel(Request $request)
    {
        return Excel::download(new ReportDay(
            $request->billNo,
            $request->employee,
            $request->dateStart,
            $request->dateEnd
        ),'report_day.xlsx');
    }

    public function dayPdf(Request $request)
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
        

        $mpdf = Helper::mpdf('A4','16');
        $mpdf->WriteHTML(view('report.day-pdf',['data' => $data]));
        $mpdf->Output('day-report-'.date('d-m-Y').".pdf","I");
    }

    public function month(Request $request)
    {
        $year = $request->year;
        $data = [];

        if($year){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("MONTH(created_at) as m"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereYear('created_at',$year)
                        ->groupBy(['m'])
                        ->get();
        }

        return view('report.month',['year' => $year,'data' => $data,'months' => '','dataBar' => '']);
    }

    public function monthExcel(Request $request)
    {
        return Excel::download(new ReportMonth(
            $request->year
        ),'report_month.xlsx');
    }

    public function monthPdf(Request $request)
    {
        $year = $request->year;
        $data = [];

        if($year){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("MONTH(created_at) as m"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereYear('created_at',$year)
                        ->groupBy(['m'])
                        ->get();

        }

        $mpdf = Helper::mpdf('A4','16');
        $mpdf->WriteHTML(view('report.month-pdf',['data' => $data]));
        $mpdf->Output('month-report-'.date('d-m-Y').".pdf","I");

    }

    public function year(Request $request)
    {
        $yearStart = $request->yearStart;
        $yearEnd = $request->yearEnd;
        $data = [];

        if($yearStart && $yearEnd){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("YEAR(created_at) as y"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereRaw('YEAR(created_at) BETWEEN ? AND ?',[$yearStart,$yearEnd])
                        ->groupBy(['y'])
                        ->get();
        }

        return view('report.year',[
            'yearStart' => $yearStart,
            'yearEnd' => $yearEnd,
            'data' => $data,
            'years' => '',
            'dataBar' => ''
        ]);
    }

    public function yearExcel(Request $request)
    {
        return Excel::download(new ReportYear(
            $request->yearStart,
            $request->yearEnd
        ),'report_year.xlsx');
    }

    public function yearPdf(Request $request)
    {
        $yearStart = $request->yearStart;
        $yearEnd = $request->yearEnd;
        $data = [];

        if($yearStart && $yearEnd){
            $data = DB::table('pos_orders')
                        ->select(
                            DB::raw("YEAR(created_at) as y"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("SUM(psod_qty) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereRaw('YEAR(created_at) BETWEEN ? AND ?',[$yearStart,$yearEnd])
                        ->groupBy(['y'])
                        ->get();
        }

        $mpdf = Helper::mpdf('A4','16');
        $mpdf->WriteHTML(view('report.year-pdf',['data' => $data]));
        $mpdf->Output('year-report-'.date('d-m-Y').".pdf","I");

    }
}
