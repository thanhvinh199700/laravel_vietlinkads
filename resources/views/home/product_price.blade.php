@extends('layouts.app')
@section('content')
@if(count($productPrice)>0)
<div class="row text-center">
    <h3>Đã tìm thấy {{count($productPrice)}} sản phẩm thuộc </h3>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container-fluid">
            @foreach($productPrice as $productPrice)
            <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="margin-top:30px;border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 10px;">
                <div class="item">
                    <div class="product-block-wp">
                        <div class="view view-fifth text-center">
                            <div class="icon-status">
                            </div>
                            <div class="image-prod-list" style="margin-left: -16px;">
                                <a title="Kệ treo tường Entryway" href="/product/{{$productPrice->id}}">
                                    <img title="Kệ treo tường Entryway" src="{{$productPrice->image}}" alt="Kệ treo tường Entryway" width="150px;">
                                </a>
                            </div>

                        </div>
                        <div class="clear"></div>
                        <div class="description top-pro-cen ">
                            <div class="name-product">
                                <p style="font-size:14px;">
                                    <a href="">{{$productPrice->product_name}}</a>

                                </p>

                            </div>
                            <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($productPrice->price)}}</p>
                            <img src="{{asset('images/star.png')}}" width="70px"><br />
                            @if($productPrice->quantity > 0)
                            <a class="concu btn btn-primary" href="#" data_product_id="{{$productPrice->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
                            @else
                            <a class="hethang btn btn-warning" href="#"style="text-decoration:none;color:yellow;width:120px;">hết hàng</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="container" style="margin-left: 40%">
    <img src="{{asset('images/error.jpg')}}" >
    <div class="text">

        <h3>Để tìm được kết quả chính xác hơn, bạn vui lòng:</h3>
        <p>&#9679;Kiểm tra lỗi chính tả của từ khóa đã nhập</p>
        <p>&#9679;Thử lại bằng từ khóa khác</p>
        <p>&#9679;Thử lại bằng những từ khóa tổng quát hơn</p>
        <p>&#9679;Thử lại bằng những từ khóa ngắn gọn hơn</p>
    </div>
</div>
@endif  
@endsection