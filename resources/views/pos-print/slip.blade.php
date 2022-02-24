<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip</title>

    <style>
        body {
            font-size: 80%;
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
    <div style="text-align: center;font-size: 2rem;line-height: 25px;">
        ร้าน {{ $setting->sett_name }}
    </div>
    <div style="text-align: center;font-size: 2rem;line-height: 25px;">
        เบอร์โทร : {{ $setting->sett_phone }}
    </div>
    <table width="100%">
        @foreach ($posOrder->items as $item)
        <tr>
            <td>{{ $item->psod_item_name }}</td>
            <td align="right">{{ $item->psod_item_qty }} X </td>
            <td align="right">{{ number_format($item->psod_item_price,2) }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2">รวม</td>
            <td align="right">{{ number_format($posOrder->psod_total,2) }}</td>
        </tr>
        <tr>
            <td colspan="2">Vat</td>
            <td align="right">{{ number_format($posOrder->psod_total*($setting->sett_vat/100),2) }}</td>
        </tr>
        <tr>
            <td colspan="2"><h2>สุทธิ</h2></td>
            <td align="right"><h2>{{ number_format($posOrder->psod_net_total,2) }}</h2></td>
        </tr>
        <tr>
            <td colspan="2">รับเงิน</td>
            <td align="right">{{ number_format($posOrder->psod_money,2) }}</td>
        </tr>
        <tr>
            <td colspan="2">รับเงิน</td>
            <td align="right">{{ number_format($posOrder->psod_change,2) }}</td>
        </tr> 
        <tr>
            <td colspan="2">พนักงาน</td>
            <td align="right">{{ $posOrder->employee->name }}</td>
        </tr> 
        <tr>
            <td colspan="2">เลขที่</td>
            <td align="right">{{ $posOrder->id }}</td>
        </tr> 
    </table>
    <div style="text-align: center;font-size: 12px;line-height: 25px;">
        *** วันที่ {{ date('d/m/y H:i:s',strtotime($posOrder->created_at)) }} ***
    </div>
</body>
</html>