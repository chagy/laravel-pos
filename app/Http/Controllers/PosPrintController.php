<?php

namespace App\Http\Controllers;

use Helper;
use App\Models\Setting;
use App\Models\PosOrder;
use Illuminate\Http\Request;

class PosPrintController extends Controller
{
    
    public function printSlip($id)
    {
        $setting = Setting::orderBy('id','asc')->first();

        $posOrder = PosOrder::findOrFail($id);

        $mpdf = Helper::mpdf([100,1500],16);
        $mpdf->WriteHTML(view('pos-print.slip',[
            'setting' => $setting,
            'posOrder' => $posOrder
        ]));
        $mpdf->Output('pos-order-'.date('d-m-Y').".pdf",'I');
        exit;
    }

    public function printA($id)
    {
        $setting = Setting::orderBy('id','asc')->first();

        $posOrder = PosOrder::findOrFail($id);

        $mpdf = Helper::mpdf('A4',16);
        $mpdf->WriteHTML(view('pos-print.bill_a4',[
            'setting' => $setting,
            'posOrder' => $posOrder
        ]));
        $mpdf->Output('pos-order-'.date('d-m-Y').".pdf",'I');
        exit;
    }
}
