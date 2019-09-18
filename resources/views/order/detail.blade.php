@extends('layouts.admin')
@section('content')
<a href="/orders" class="btn btn-outline-primary" style="margin-bottom: 60px;">QUAY TRỞ LẠI</a>
<!-- Default panel contents -->
<div class="panel-heading"><h2>Thông tin chi tiết đơn hàng<a class="btn btn-primary" href="/detail/export/{{$info->id}}" role="button">Xuất Báo cáo</a></h2></div>
<!-- Table -->


<b style="color: red;font-size: 20px;">Tên Khách Hàng :<i style="color: black;font-size: 13px;">{{$info->full_name}}</i></b><br />
<b style="color: red;font-size: 20px;">Địa chỉ : <i style="color: black;font-size: 13px;">{{$info->address}}</i></b><br />
<b style="color: red;font-size: 20px;">Số Điện thoại : <i style="color: black;font-size: 13px;">{{$info->phone}}</i></b><br />
<b style="color: red;font-size: 20px;">Địa Chỉ Email :<i style="color: black;font-size: 13px;">{{$info->email}}</i></b><br />
<b style="color: red;font-size: 20px;">Hình thức thanh toán :<i style="color: black;font-size: 13px;font-weight: bold;">@if($info->status == 1) Thanh toán khi nhận hàng @else Đã thanh toán bằng ATM @endif</i></b><br />
<table class="table-bordered table-striped text-center" style="width: 100%;">
    <thead>
        <tr class="text-info">
            <th>Mã đơn hàng</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản Phẫm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $details)
        <tr>	
            <td>{{$details->order_id}}</td>						
            <td>{{$details->product_id}}</td>
            <td>{{$details->product->product_name}}</td>
            <td>{{number_format($details->product_price)}}₫&nbsp</td>
            <td>{{$details->qty}}</td>	
            <td>{{number_format($details->total)}}₫&nbsp</td>	
        </tr>
        @endforeach
    </tbody>

</table>

<div><h3 class="text-center"> Tổng Tiền :{{number_format($info->total_price)}} Vnđ</h3></div>



@endsection