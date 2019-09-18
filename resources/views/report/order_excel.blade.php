
<div class='panel'>
    <h1 style="font-family:Saira, sans-serif;"> BẢNG THỐNG KÊ CHI TIẾT BÁN HÀNG CỦA THÁNG 9</h1>


    <tr style="border:1px double black;width: 0px;">
        <th style="border:1px double black;width: 30px;text-align: center;">
            MÃ ĐƠN HÀNG 
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            THỜI GIAN
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            TÊN KHÁCH HÀNG
        </th>
        <th style="border:1px double black;width: 50px;text-align: center;">
            ĐỊA CHỈ
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            PHONE
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            EMAIL
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            TỔNG GIÁ
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            TỔNG SỐ LƯỢNG
        </th>
        <th style="border:1px double black;width: 30px;text-align: center;">
            HÌNH THỨC THANH TOÁN
        </th>


    </tr>

    @foreach ($order as $orders)
    <tr style="border:1px double black;width: 30px;">

        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->id}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->order_date}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->full_name}}
        </td>
        <td style="border:1px double black;width: 50px;text-align: center;">
            {{$orders->address}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->phone}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->email}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{number_format($orders->total_price)}}₫
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            {{$orders->total_quantity}}
        </td>
        <td style="border:1px double black;width: 30px;text-align: center;">
            @if($orders->status == 2)
            <button class="btn btn-success progress-bar-striped">Đã thanh toán OnePay</button>
            @else
            <button class="btn btn-warning progress-bar-striped">Thanh toán tại nhà</button>
            @endif
        </td>
    </tr>
    @endforeach   
</div>
