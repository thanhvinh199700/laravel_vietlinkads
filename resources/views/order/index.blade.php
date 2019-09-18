@extends('layouts.admin')
@section('content')
<style>
    th{
        text-align: center;
    }
</style>
@if (session('success_message') || session('message'))
<div class="alert alert-success">
    @if(session('success_message'))
    {{ session('success_message')}}
    @else
    {{session('message')}}
    @endif
</div>
@endif

@if (session('error_message'))
<div class="alert alert-danger">
    {{ session('error_message')}}
</div>
@endif
<!--    {{    @$errors->first('parent')}}-->
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-success">
    {{$error}}
</div>
@endforeach
@endif
<div class='panel'>
    <h2> BẢNG ORDERS <a class="btn btn-primary" href="/category/create" role="button">thêm mới</a><a class="btn btn-primary" href="export" role="button">Xuất Báo cáo</a></h2>

    <TABLE class="table-bordered table-striped table-dark " width="100%;" style="text-align: center;color: yellowgreen">
        <tr>
            <th>
                MÃ ĐƠN HÀNG 
            </th>
            <th>
                THỜI GIAN
            </th>

            <th>
                TÊN KHÁCH HÀNG
            </th>
            <th>
                ĐỊA CHỈ
            </th>
            <th>
                PHONE
            </th>
            <th>
                EMAIL
            </th>
            <th>
                TỔNG GIÁ
            </th>
            <th>
                TỔNG SỐ LƯỢNG
            </th>
            <th>
                HÌNH THỨC THANH TOÁN
            </th>
            <th>
                XEM CHI TIẾT
            </th>
            <th>
                CHO PHÉP XÓA
            </th>
            <th>
                THAO TÁC
            </th>

        </tr>

        @foreach ($order as $orders)
        <tr>

            <td>
                {{$orders->id}}
            </td>
            <td>
                {{$orders->order_date}}
            </td>
            <td>
                {{$orders->full_name}}
            </td>
            <td>
                {{$orders->address}}
            </td>
            <td>
                {{$orders->phone}}
            </td>
            <td>
                {{$orders->email}}
            </td>
            <td>
                {{number_format($orders->total_price)}}₫&nbsp
            </td>
            <td>
                {{$orders->total_quantity}}
            </td>
            <td>
                @if($orders->status == 2)
                <button class="btn btn-success progress-bar-striped">Đã thanh toán OnePay</button>
                @else
                <button class="btn btn-warning progress-bar-striped">Thanh toán tại nhà</button>
                @endif
            </td>
            <td>
                <a href="orders/detail/{{$orders->id}}">Xem chi tiết đơn hàng</a>
            </td>
            <td>
                @if($orders->trash==0)
                <a href="change_trash/{{$orders->id}}" data-trash="{{$orders->trash}}" class="btn btn-danger">Không được xóa</a>
                @else
                <a href="change_trash/{{$orders->id}}" data-trash="{{$orders->trash}}" class="btn btn-success">Được xóa</a>
                @endif
            </td>
            <td>
                <form action="orders/{{$orders->id}}" method=post> 
                    @csrf 
                    @method('PUT')  
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>
        </tr>
        @endforeach   
    </table>
</div>
@endsection 
