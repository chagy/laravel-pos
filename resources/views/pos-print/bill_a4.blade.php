<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A4</title>
    <style>

        table {
            border-collapse: collapse;
        }
        
        body {
            font-size: 16px;
        }

        .border {
            border: 1px solid black;
        }

        .border-left {
            border-left: 1px solid black;
        }

        .border-right {
            border-right: 1px solid black;
        }

        .font-bold{
            font-weight: bold;
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
    <table width="100%">
        <tr>
            <td rowspan="5" width="30%" align="center">
                <img src="https://via.placeholder.com/100" /><br/>
                <span style="font-size: 12px;">เลขประจำตัวผู้เสียภาษาอากร {{ $setting->sett_tax_id }}</span>
            </td>
            <td width="40%">
                {{ $setting->sett_name }}
            </td>
            <td width="30%">
                
            </td>
        </tr>
        <tr>
            <td>เจ้าของร้าน</td>
            <td>{{ $setting->sett_owner }}</td>
        </tr>
        <tr>
            <td>เบอร์โทร</td>
            <td>{{ $setting->sett_phone }}</td>
        </tr>
    </table>
    <h3 align="center">ใบเสร็จรับเงิน</h3>
    <table width="100%" class="border">
        <tr>
            <td width="15%" class="font-bold">ชื่อลูกค้า</td>
            <td width="35%" class="font-bold">{{ $posOrder->customer->name }}</td>
            <td width="15%" class="border-left font-bold">วันที่</td>
            <td width="35%" class="font-bold">{{ date('d/m/y',strtotime($posOrder->created_at)) }}</td>
        </tr>
        <tr>
            <td class="font-bold"></td>
            <td></td>
            <td class="border-left font-bold">เลขที่ใบ</td>
            <td>{{ $posOrder->id }}</td>
        </tr>
        <tr>
            <td class="font-bold">โทร</td>
            <td>{{ $posOrder->phone }}</td>
            <td class="border-left font-bold"></td>
            <td></td>
        </tr>
    </table>
</body>
</html>