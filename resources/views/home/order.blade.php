@extends('layouts.product')
@section('content')
@if(session()->has('message')) 
<div class="alert alert-success">          
    {{ session()->get('message') }}    
</div>  @endif 
<section class="col-sm-12 col-md-12 col-xs-12 col-lg-12 margin" style="padding-bottom: 10px;background-color: #DDDDDD; color: black">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">



                <div class="panel panel-default ">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Thông Tin Giỏ Hàng</div>
                    <!-- Table -->


                    <table class="table table-bordered table-hovertext-justify table-responsive table-condensed table-striped text-center">
                        <thead>
                            <tr class="text-info">
                                <th>tên sản phẩm</th>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Tiền (VNĐ)</th>
                                <th>Xóa sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has('cart'))
                        <form action="" method=POST>
                            {{ csrf_field() }}
                            @foreach($product_cart as $cart)
                            <tr>									
                                <td>{{$cart['item']['product_name']}}</td>
                                <td><img src="{{$cart['item']['image']}}" width="35px" height="35px" title="N-11"></td>
                                <td class="price">
                                    @if($cart['item']['sale']==0)
                                    {{number_format($cart['item']['price'])}}₫&nbsp;
                                    @else
                                    {{number_format($cart['item']['saleprice'])}}₫&nbsp;
                                    @endif
                                </td>
                                <td class="parentquantity">
                                    <input min="1" data_product_id="{{$cart['item']['id']}}"size="1" type="text" name="quantity"  value="{{$cart['qty']}}" width="20px" class="text-center">
                                </td>
                                <td class="totalprice">
                                    @if($cart['item']['sale']==0)
                                    {{number_format(($cart['item']['price'])*($cart['qty']))}}₫&nbsp;
                                    @else
                                    {{number_format(($cart['item']['saleprice'])*($cart['qty']))}}₫&nbsp;
                                    @endif

                                </td>	
                                <td>
                                    <a href="{{route('deleteitem',$cart['item']['id'])}}"><img src="{{asset('images/xao.png')}}" width="50px"/></a>

                                </td>	
                            </tr>
                            @endforeach
                        </form>
                        @endif
                        </tbody>
                    </table>

                    <li class="list-group-item bg-info text-center">
                        Số Tiền(Gồm VAT)
                        <h3 class="label label-default">
                            @if(Session::has('cart'))
                            {{number_format(session('cart')->totalPrice)}}₫&nbsp;
                            @endif
                        </h3>
                    </li>
                    <div class="text-center" style="padding:10px 0px ">

                        <a href="/" class="btn btn-xs btn-warning">Tiếp Tục Mua Hàng</a>
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal">
                            xuất hóa đơn
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Hóa đơn của bạn</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered table-hovertext-justify table-responsive table-condensed table-striped text-center">
                                            <thead>
                                                <tr class="text-info">
                                                    <th>tên sản phẩm</th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số Lượng</th>
                                                    <th>Tổng Tiền (VNĐ)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(Session::has('cart'))
                                            <form action="" method=POST>
                                                {{ csrf_field() }}
                                                @foreach($product_cart as $cart)
                                                <tr>									
                                                    <td>{{$cart['item']['product_name']}}</td>
                                                    <td><img src="{{$cart['item']['image']}}" width="35px" height="35px" title="N-11"></td>
                                                    <td class="price">
                                                        @if($cart['item']['sale']==0)
                                                        {{number_format($cart['item']['price'])}}₫&nbsp;
                                                        @else
                                                        {{number_format($cart['item']['saleprice'])}}₫&nbsp;
                                                        @endif
                                                    </td>
                                                    <td class="parentquantity">
                                                        {{$cart['qty']}}
                                                    </td>
                                                    <td class="totalprice">
                                                        @if($cart['item']['sale']==0)
                                                        {{number_format(($cart['item']['price'])*($cart['qty']))}}₫&nbsp;
                                                        @else
                                                        {{number_format(($cart['item']['saleprice'])*($cart['qty']))}}₫&nbsp;
                                                        @endif

                                                    </td>	

                                                </tr>
                                                @endforeach
                                            </form>
                                            @endif

                                            </tbody>
                                        </table>
                                        <li class="list-group-item bg-info text-center">
                                            Số Tiền(Gồm VAT)
                                            <h3 class="label label-default">
                                                @if(Session::has('cart'))
                                                {{number_format(session('cart')->totalPrice)}}₫&nbsp;
                                                @endif
                                            </h3>
                                        </li>
                                        <div style="margin-right:25px;">
                                            <input type="radio"  data-toggle="modal" data-target=".bd-example-modal-sm"/>Thanh toán tại nhà <br />
                                        </div>
                                        <input type="radio" class="online" />Thanh toán qua OnePay
                                        <script>
                                            $(document).ready(function () {
                                                $('input.online').click(function (event) {
                                                    event.preventDefault();
                                                    window.location.href = '/payment_online';
                                                });
                                            });
                                        </script>

                                    </div>
                                    <div class="modal-footer">                               

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    @if(!Auth::check())
                                    <form method="post" action="payment">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <h3 class="text-center"style="border-bottom: 2px solid black;font-family: bebasneue;color:red;"> Nhap thong tin khach hang </h3>
                                                <label>Họ Tên Khách Hàng</label>
                                                <input class="form-control"  type="text" name="inputName"><br>
                                                <label>Địa Chỉ Giao Hàng</label>
                                                <textarea name="inputAddress" class="form-control"  cols="5"></textarea><br>
                                                <label>Số ĐT</label>
                                                <input class="form-control" type="tel" name="inputPhone" ><br>
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="inputEmail" ><br>

                                            </div>
                                            <div class="text-center"><button class="submit"><a class="beta-btn primary" >Ðat hàng <i class="fa fa-chevron-right"></i></a></button></div>
                                    </form>
                                </div>
                                @else
                                <form method="post" action="payment">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <h3 class="text-center"style="border-bottom: 2px solid black;font-family: bebasneue;color:red;"> Nhap thong tin khach hang </h3>
                                            <label>Họ Tên Khách Hàng</label>
                                            <input class="form-control" value="{{Auth::user()->name}}" type="text" name="inputName"><br>
                                            <label>Địa Chỉ Giao Hàng</label>
                                            <textarea name="inputAddress" class="form-control"  cols="5">{{Auth::user()->address}}</textarea><br>
                                            <label>Số ĐT</label>
                                            <input class="form-control" type="tel" name="inputPhone" value="{{Auth::user()->phone}}" ><br>
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="inputEmail" value="{{Auth::user()->email}}"><br>
                                        </div>
                                        <div class="text-center"><button class="submit"><a class="beta-btn primary" >Ðat hàng <i class="fa fa-chevron-right"></i></a></button></div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</section>
@endsection

