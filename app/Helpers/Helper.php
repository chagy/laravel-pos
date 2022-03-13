<?php 
namespace App\Helpers;

use App\Models\Product;
use App\Models\Promotion;
use Cart;

class Helper 
{

    public static function checkPromotion($productId,$dateC,$qty)
    {
        $product = Product::findOrFail($productId);
        $promotion = Promotion::select('promotions.id')
                            ->join("promotion_products",'promotion_products.promotion_id','=','promotions.id')
                            ->whereRaw("'$dateC' BETWEEN prom_begin AND prom_end")
                            ->where('promotion_products.product_id',$product->id)
                            ->first();

        if($promotion)
        {
            $discount = 0;
            foreach($promotion->conditionItems as $value)
            {
                if($value->prom_con_qty < $qty){
                    $discount = $value->prom_com_discount;
                }
            }

            $cart = Cart::get($product->id);

            Cart::update($productId,[
                'attributes' => [
                    'dateOrder' => date('YmdHis'),
                    'psod_item_unit' => $product->prod_unit,
                    'psod_item_price' => $product->prod_price,
                    'psod_item_discount' => $product->prod_discount,
                    'psod_item_promotion' => $discount,
                    'psod_item_discount_total' => $product->prod_discount * $cart->quantity,
                ]
                ]);
        }
    }

    public static function mpdf($paperSize,$fontSize)
    {
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge([
                __DIR__.'/../../ttfonts'
            ],[
                public_path().'/fonts',
            ]),
            'fontdata' => $fontData + [
                'thaisarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNewItalic.ttf',
                    'B' => 'THSarabunNewBold.ttf',
                    'BI' => 'THSarabunNewBoldItalic.ttf',
                ]
                ],
                'default_font_size' => $fontSize,
                'default_font' => 'thaisarabun',
                'mode' => 'utf-8',
                'format' => $paperSize
            ]);

            return $mpdf;
    }

    public static function ThaiBahtConversion($amount_number)
    {
        $amount_number = number_format($amount_number, 2, '.', '');
        $pt = strpos($amount_number, '.');
        $number = $fraction = '';
        if ($pt === false) {
            $number = $amount_number;
        } else {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }
        $ret = '';
        $baht = self::ReadNumber($number);
        if ($baht != '') {
            $ret .= $baht . 'บาท';
        }
        $satang = self::ReadNumber($fraction);
        if ($satang != '') {
            $ret .= $satang . 'สตางค์';
        } else {
            $ret .= 'ถ้วน';
        }

        return $ret;
    }

    public static function ReadNumber($number)
    {
        $position_call = array('แสน', 'หมื่น', 'พัน', 'ร้อย', 'สิบ', '');
        $number_call = array('', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า');
        $number = $number + 0;
        $ret = '';
        if ($number == 0) {
            return $ret;
        }
        if ($number > 1000000) {
            $ret .= seft::ReadNumber(intval($number / 1000000)) . 'ล้าน';
            $number = intval(fmod($number, 1000000));
        }
        $divider = 100000;
        $pos = 0;
        while ($number > 0) {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? 'ยี่' : ((($divider == 10) && ($d == 1)) ? '' : ((($divider == 1) && ($d == 1) && ($ret != '')) ? 'เอ็ด' : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : '');
            $number = $number % $divider;
            $divider = $divider / 10;
            ++$pos;
        }

        return $ret;
    }

    protected static $month_th_long = [
        1   => "มกราคม",
        2   => "กุมภาพันธ์",
        3   => "มีนาคม",
        4   => "เมษายน",
        5   => "พฤษภาคม",
        6   => "มิถุนายน",
        7   => "กรกฎาคม",
        8   => "สิงหาคม",
        9   => "กันยายน",
        10  => "ตุลาคม",
        11  => "พฤศจิกายน",
        12  => "ธันวาคม"
    ];

    protected static $month_th_short = [
        1   => "ม.ค.",
        2   => "ก.พ.",
        3   => "มี.ค.",
        4   => "เม.ย.",
        5   => "พ.ค.",
        6   => "มิ.ย.",
        7   => "ก.ค.",
        8   => "ส.ค.",
        9   => "ก.ย.",
        10  => "ต.ค.",
        11  => "พ.ย.",
        12  => "ธ.ค."
    ];


    public static function dateThaiShotMonth($date_m){
        $day_s = date('d',strtotime($date_m));
        $month_s = date('n',strtotime($date_m));
        $year_s = date('Y',strtotime($date_m)) + 543;

        $month_v = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];

        return $day_s.' '.$month_v[$month_s].' '.$year_s;
    }


    public static function monthThaiShort($strMonth)
    {
        $month = date('n',strtotime($strMonth));

        return self::$month_th_short[$month];
    }

    public static function monthThaiLong($strMonth)
    {
        return self::$month_th_long[$strMonth];
    }
}