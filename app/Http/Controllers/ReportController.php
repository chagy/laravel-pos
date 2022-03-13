<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function day(Request $request)
    {
        return view('report.day');
    }
}
