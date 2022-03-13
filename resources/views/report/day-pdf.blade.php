<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Day PDF</title>
    <style>
        .gridtable {
            width: 100%;
            //font-size:10px;                       
            color:#333333;            
            border-width: 1px;
            border-color: #000000;
            border-collapse: collapse;
        }

        .gridtable th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #000000;
        // font-weight:bold;
        }

        .gridtable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #000000;
            background-color: #ffffff;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        @page {
            margin: 2%;
            margin-top: 3mm;
            margin-header: 0mm;
            margin-footer: 0mm;
        }
    </style>
</head>
<body>
    <table class="gridtable">
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
</body>
</html>