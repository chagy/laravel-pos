<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Month PDF</title>
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
</body>
</html>