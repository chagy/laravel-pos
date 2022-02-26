<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A4</title>
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
</body>
</html>