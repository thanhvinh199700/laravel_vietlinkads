
<div class="panel-heading"><h2>Thông tin chi tiết đơn hàng có mã {{$info->id}}</h2></div>
<!-- Table -->
<b style="color: red;font-size: 20px;">Tên Khách Hàng :<i style="color: black;font-size: 13px;">{{$info->full_name}}</i></b><br />
<b style="color: red;font-size: 20px;">Địa chỉ : <i style="color: black;font-size: 13px;">{{$info->address}}</i></b><br />
<b style="color: red;font-size: 20px;">Số Điện thoại : <i style="color: black;font-size: 13px;">{{$info->phone}}</i></b><br />
<b style="color: red;font-size: 20px;">Địa Chỉ Email :<i style="color: black;font-size: 13px;">{{$info->email}}</i></b><br />
<b style="color: red;font-size: 20px;">Hình thức thanh toán :<i style="color: black;font-size: 13px;font-weight: bold;">@if($info->status == 1) Thanh toán khi nhận hàng @else Đã thanh toán bằng ATM @endif</i></b><br />
<table>
    <thead>
        <tr class="text-info" style="border:1px double black;width: 0px;">
            <th style="border:1px double black;width: 30px;text-align: center;">Mã đơn hàng</th>
            <th style="border:1px double black;width: 30px;text-align: center;">Mã sản phẩm</th>
            <th style="border:1px double black;width: 30px;text-align: center;">Tên sản Phẫm</th>
            <th style="border:1px double black;width: 30px;text-align: center;">Giá sản phẩm</th>
            <th style="border:1px double black;width: 30px;text-align: center;">Số lượng</th>
            <th style="border:1px double black;width: 30px;text-align: center;">Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $details)
        <tr style="border:1px double black;width: 0px;">	
            <td style="border:1px double black;width: 30px;text-align: center;">{{$details->order_id}}</td>						
            <td style="border:1px double black;width: 30px;text-align: center;">{{$details->product_id}}</td>
            <td style="border:1px double black;width: 30px;text-align: center;">{{$details->product->product_name}}</td>
            <td style="border:1px double black;width: 30px;text-align: center;">{{number_format($details->product_price)}}₫</td>
            <td style="border:1px double black;width: 30px;text-align: center;">{{$details->qty}}</td>	
            <td style="border:1px double black;width: 30px;text-align: center;">{{number_format($details->total)}}₫</td>	
        </tr>
        @endforeach
    </tbody>

</table>

<div><h1 class="text-center"> Tổng Tiền :{{number_format($info->total_price)}} Vnđ</h1></div>