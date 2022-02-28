<?php 
use App\Helpers\Helper;
?>
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
            margin-footer: 5mm;
            footer: html_MyCustomFooter;
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
    <table width="100%" style="margin-top: 5px;">
        <tr>
            <td class="border font-bold" align="center" width="5%">ลำดับ</td>
            <td class="border font-bold" align="center" width="35%">ชื่อสินค้า</td>
            <td class="border font-bold" align="center" width="10%">จำนวน</td>
            <td class="border font-bold" align="center">ราคา / หน่วย</td>
            <td class="border font-bold" align="center">ส่วนลด</td>
            <td class="border font-bold" align="center">จำนวน</td>
        </tr>
        @php
            $sum = 0;
            $tax_total = 0;
            $net_total = 0;
        @endphp
        @foreach ($posOrder->items as $item)
        <tr>
            <td align="center"  class="border-left">{{ $loop->index+1 }}</td>
            <td class="border-left">
                {{ $item->psod_item_name }}
            </td>
            <td class="border-left" align="right">
                {{ number_format($item->psod_item_qty,0) }}
            </td>
            <td class="border-left" align="right">
                {{ number_format($item->psod_item_price,2) }}
            </td>
            <td class="border-left" align="right">
                {{ number_format($item->psod_item_discount,2) }}
            </td>
            <td class="border-left border-right" align="right">
                {{ number_format(($item->psod_item_qty*$item->psod_item_price) - $item->psod_item_discount_total,2) }}
            </td>
        </tr>
        @php
            $sum += ($item->psod_item_qty*$item->psod_item_price) - $item->psod_item_discount_total;
        @endphp
        @endforeach
        @php
            $tax_total = $sum * ( $setting->sett_vat/100);
            $net_total = $sum - $tax_total;
        @endphp
        <tr class="border">
            <td align="center" colspan="3" class="border-left font-bold">
                {{ Helper::ThaiBahtConversion($sum) }}
            </td>
            <td colspan="2" class="border-left font-bold">รวมเงิน</td>
            <td align="right" class="border-left">
                {{ number_format($sum,2) }}
            </td>
        </tr>
        <tr>
            <td colspan="3" ></td>
            <td colspan="2" class="border font-bold">หัก ณ ที่จ่าย {{ $setting->sett_vat }}%</td>
            <td align="right" class="border">
                {{ number_format($tax_total,2) }}
            </td>
        </tr>
        <tr>
            <td colspan="3" ></td>
            <td colspan="2" class="border font-bold">ยอดเงินสุทธิ</td>
            <td align="right" class="border">
                {{ number_format($net_total,2) }}
            </td>
        </tr>
    </table>
    <htmlpagefooter name="MyCustomFooter">
        <table class="border" width="100%">
            <tr>
                <td class="font-bold" align="center" width="33.33%">
                    ผู้รับบิล/Receiver
                </td>
                <td class="font-bold border-right border-left" align="center" width="33.33%">
                    ผู้ตรวจสอบรายการ / Inspector By
                </td>
                <td class="font-bold" align="center" width="33.33%">
                    ผู้มีอำนาจลงนาม / Authorized Signature
                </td>
            </tr>
            <tr>
                <td class="font-bold" align="center" width="33.33%">
                    ได้รับรายการตามรายการเรียบร้อยแล้ว
                </td>
                <td class="font-bold border-right border-left" align="center" width="33.33%">
                    
                </td>
                <td class="font-bold" align="center" width="33.33%">
                    
                </td>
            </tr>
            <tr>
                <td class="font-bold" align="center" width="33.33%">
                    ...................................................
                </td>
                <td class="font-bold border-right border-left" align="center" width="33.33%">
                    ...................................................
                </td>
                <td class="font-bold" align="center" width="33.33%">
                    ...................................................
                </td>
            </tr>
            <tr>
                <td class="font-bold" align="center" width="33.33%">
                    วันที่/Date...................................................
                </td>
                <td class="font-bold border-right border-left" align="center" width="33.33%">
                    วันที่/Date...................................................
                </td>
                <td class="font-bold" align="center" width="33.33%">
                    วันที่/Date...................................................
                </td>
            </tr>
        </table>
    </htmlpagefooter>
</body>
</html>