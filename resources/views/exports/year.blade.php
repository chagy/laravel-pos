<table class="table table-bordered">
    <thead>
        <tr>
            <th>ปี</th>
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
            <td class="text-center">{{$item->y }}</td>
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