<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;

class PosPrintController extends Controller
{
    
    public function printSlip($id)
    {
        $mpdf = Helper::mpdf([100,1500],16);
        $mpdf->WriteHTML(view('pos-print.slip'));
        $mpdf->Output('pos-order-'.date('d-m-Y').".pdf",'I');
        exit;
    }

    public function printA($id)
    {

    }
}
