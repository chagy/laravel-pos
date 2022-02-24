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
</body>
</html>