<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orderCount = DB::select("SELECT count(id) as orderCount FROM pos_orders WHERE created_at='".date('Y-m-d')."'");
        $customerCount = DB::select("SELECT count(id) as customerCount FROM users WHERE type=2");
        $employeeCount = DB::select("SELECT count(id) as employeeCount FROM users WHERE type=1");

        $product_stocks = DB::table('products')->where('prod_status',1)->orderBy('prod_qty','asc')->limit(5)->get();
        $product_best = DB::table('pos_order_items')->select(
                            "psod_item_name",
                            DB::raw("SUM(psod_item_qty) as qty")
                        )
                        ->groupBy('psod_item_name')
                        ->limit(5)
                        ->orderBy('qty','desc')
                        ->get();

        $dataYear = DB::table('pos_orders')
                        ->select(
                            DB::raw("MONTH(created_at) as m"),
                            DB::raw("COUNT(id) as pos"),
                            DB::raw("(SELECT count(id) FROM pos_order_items WHERE MONTH(created_at) = m ) as qty"),
                            DB::raw("SUM(psod_net_total) as total")
                        )
                        ->where('psod_status',1)
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(['m'])
                        ->get();
        $months = "";
        $dataLine = "";
        foreach($dataYear as $item){
            $months .= "'".Helper::monthThaiLong($item->m)."',";
            $dataLine .= $item->total.",";
            
        }

        return view('dashboard',[
            'orderCount' => $orderCount[0]->orderCount,
            'customerCount' => $customerCount[0]->customerCount,
            'employeeCount' => $employeeCount[0]->employeeCount,
            'product_stocks' => $product_stocks,
            'product_best' => $product_best,
            'months' => $months,
            'dataLine' => $dataLine
        ]);
    }
}
