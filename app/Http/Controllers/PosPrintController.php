<?php

namespace App\Http\Controllers;

use Helper;
use App\Models\Setting;
use Illuminate\Http\Request;

class PosPrintController extends Controller
{
    
    public function printSlip($id)
    {
        $setting = Setting::orderBy('id','asc')->first();

        $mpdf = Helper::mpdf([100,1500],16);
        $mpdf->WriteHTML(view('pos-print.slip',[
            'setting' => $setting
        ]));
        $mpdf->Output('pos-order-'.date('d-m-Y').".pdf",'I');
        exit;
    }

    public function printA($id)
    {

    }
}
