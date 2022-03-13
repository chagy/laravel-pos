@extends('layouts.main')

@section('content')
<br/>
    <div class="row">
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Day Report</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="get" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="billNo" class="col-sm-2 col-form-label">เลขที่ใบเสร็จ</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="text" 
                                            name="billNo"
                                            id="billNo"
                                            class="form-control" 
                                            value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="employee" class="col-sm-2 col-form-label">พนักงาน</label>
                                    <div class="col-sm-10">
                                        <select
                                            name="employee"
                                            id="employee"
                                            class="form-control">
                                            <option value="">เลือกพนักงาน</option>
                                            @foreach ($employees as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dateStart" class="col-sm-2 col-form-label">วันที่เริ่ม</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="date" 
                                            name="dateStart"
                                            id="dateStart"
                                            class="form-control" 
                                            value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dateEnd" class="col-sm-2 col-form-label">วันที่สิ้นสุด</label>
                                    <div class="col-sm-10">
                                        <input 
                                            type="date" 
                                            name="dateEnd"
                                            id="dateEnd"
                                            class="form-control" 
                                            value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary btn-block">
                                            <i class="fas fa-search"></i> ค้นหา
                                        </button>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a 
                                            href="{!! route('report.day.excel') !!}" 
                                            class="btn btn-warning">
                                            Excel 
                                        </a>
                                        <a 
                                            href="{!! route('report.day.pdf') !!}" 
                                            class="btn btn-info">
                                            PDF 
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>วันที่ เวลา</th>
                                        <th>เลขที่ใบเสร็จ</th>
                                        <th>ลูกค้า</th>
                                        <th>จำนวนรายการ</th>
                                        <th>จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $qty = 0;
                                        $total = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td class="text-center">{{ date('d/m/y H:i',strtotime($item->created_at)) }}</td>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-right">{{ $item->psod_qty }}</td>
                                        <td class="text-right">{{ number_format($item->psod_net_total,2) }}</td>
                                    </tr>   
                                    @php
                                        $qty += $item->psod_qty;
                                        $total += $item->psod_net_total;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center" colspan="4">ยอดรวม</td>
                                        <td class="text-right">{{ number_format($qty,2) }}</td>
                                        <td class="text-right">{{ number_format($total,2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection