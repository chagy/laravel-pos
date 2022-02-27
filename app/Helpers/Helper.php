<?php 
namespace App\Helpers;

class Helper 
{
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
}