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
                                    <label for="year" class="col-sm-2 col-form-label">ปี</label>
                                    <div class="col-sm-10">
                                        <select
                                            name="year"
                                            id="year"
                                            class="form-control">
                                            <option value="">เลือกปี</option>
                                            @for ($i = date('Y'); $i > date('Y') - 10; $i--)
                                                <option value="{{ $i }}" @if($year == $i) selected="selected" @endif>
                                                {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
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
                                            href="{!! route('report.month.excel',[
                                                'year' => $year,
                                            ]) !!}" 
                                            class="btn btn-warning">
                                            Excel 
                                        </a>
                                        <a 
                                            href="{!! route('report.month.pdf',[
                                                'year' => $year,
                                            ]) !!}" 
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
                                        <th>เดือน</th>
                                        <th>จำนวนการซื้อ</th>
                                        <th>จำนวนสินค้า</th>
                                        <th>จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $pos = 0;
                                        $qty = 0;
                                        $total = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ Helper::monthThaiLong($item->m) }}</td>
                                        <td class="text-right">{{ number_format($item->pos,2) }}</td>
                                        <td class="text-right">{{ number_format($item->qty,2) }}</td>
                                        <td class="text-right">{{ number_format($item->total,2) }}</td>
                                    </tr>   
                                    @php
                                        $pos += $item->pos;
                                        $qty += $item->qty;
                                        $total += $item->total;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center">ยอดรวม</td>
                                        <td class="text-right">{{ number_format($pos,2) }}</td>
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