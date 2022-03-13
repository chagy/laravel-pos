<table>
    <thead>
        <th>วันที่ / เวลา</th>
        <th>เลขที่ใบเสร็จ</th>
        <th>ลูกค้า</th>
        <th>จำนวนรายการ</th>
        <th>จำนวนเงิน</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->psod_qty }}</td>
            <td>{{ $item->psod_net_total }}</td>
        </tr>   
        @endforeach
    </tbody>
</table>