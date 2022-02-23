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
}