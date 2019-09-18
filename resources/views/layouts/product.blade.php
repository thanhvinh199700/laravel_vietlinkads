<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>bán điện thoại</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

        <link href="{{asset('css/style.css')}}" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script
            src="https://code.jquery.com/jquery-1.12.4.js"
            integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>
        <script src="{{asset('js/update_cart.js')}}"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    </head>
    <script>
$(document).ready(function () {
    $('a.hethang').click(function (event) {
        event.preventDefault();
        alert('sản phẩm tạm hết hàng . Chúng tôi sẽ cập nhật sao');
    });
});
    </script>
    <script>
        $(document).ready(function () {
            $('a.concu').click(function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var product_id = $(this).attr('data_product_id');

                $.ajax({
                    url: "/add_to_cart/" + product_id,
                    type: "GET",
                    dateType: "JSON",
                    cache: false,

                    success: function () {

                    }
                }).done(function (response) {

                    //console.log(response.items);
                    $('div.cart div.beta-select').empty();
                    $('div.cart div.beta-select').append("\<img src='{{asset('images/giohang.jpg')}}' width='50px'>\n\
            <span style='color: #999;' id='cart'>" + response.totalQty + "&nbsp;Sản&nbsp;phẩm</span>");
                    $('div.cart div.cart-body').empty();
                    for (x in response.items) {
                        $('div.cart div.cart-body').append("\
                    <div class='cart-item'>\n\
                        \n\<div class='media'>\n\
                            \n\<a class='pull-left'><img width='35px' height='35px' src='" + response.items[x].item.image + "' alt=''></a>\n\
                                <div class='media-body'>\n\
                                    <span class='cart-item-title'>" + response.items[x].item.product_name + "</span> || \n\
                                    <span class='cart-item-amount'>" + response.items[x].qty + "x</span>\n\
                                    " + response.items[x].item.price + " ₫&nbsp;\n\
                                </div>\n\
                        </div>\n\
                    </div>");
                    }
                    $('div.cart div.cart-body').append("\
            <div class='cart-total text-right' style='text-align: center;border: 1px solid black;background: #33FFFF;'>\n\
                        Tổng tiền:<span class='cart-total-value'>" + (response.totalPrice) + "VNĐ</span>\n\
            </div>\n\
            <div class='center'>\n\
                <div class='space10'>&nbsp;</div>\n\
                <a href='/order' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>\n\
            </div>");
                    alert('thêm thành công 1 sản phẩm ' + response.items[product_id].item.product_name + '');
                });
            });
        });
    </script>
    <body style="padding:0px;">
        <!--LOGIN-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="background:#dc3545;min-height:41px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                            <p style="color: white; padding-top: 10px; padding-left: 0px; font-size: 14px; font-family:Open Sans, sans-serif;">Chào mừng bạn đến với SangMobile</p>
                        </div>

                        <div class="col-md-2" style="margin-top: 10px;float:right;">  
                            @if (Auth::check()) 
                            <a href=""style="margin-right:50px;color:white">{{Auth::user()->name}}</a>   
                            <a href="/logout" style="color:white">logout</a>
                            @else
                            <a href="/registration" style="margin-right:50px;color:white">Registrator</a>
                            <a href="/login" style="color:white">Login</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--HEADER-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="min-height: 100px; background:white">
                <div class="container-fluid">

                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12" style="margin-top:15px;">
                        <a href="/">
                            <img src="{{asset('images/logo1.png')}}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="margin-top:26px;margin-left:0px;">
                        <form class="form-inline my-2 my-lg-0" method="GET" style="width:100%;" action="/sreach">
                            <input class=" form-control mr-sm-2" name="key" type="search" style="height: 44px; border-top: 4px solid #dc3545; border-left: 4px solid #dc3545; border-bottom: 4px solid #dc3545; border-radius: 6px 0px 0px 6px;min-width:90%" placeholder="Nhập tên hoặc mã sản phẩm" aria-label="Search" name="key" />
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="    border: 1px solid transparent;padding: 11px 15px;border-radius: 0px 6px 6px 0px;background: #dc3545;margin-left:-3px;">
                                <i class="glyphicon glyphicon-search" style="color:#FFFFFF"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6" style="margin-top:20px;">                 
                        <div class="cart">
                            <div class="beta-select nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('images/giohang.jpg')}}" width="50px"> 
                                <span style="color: #999; ">
                                    @if(Session::has('cart'))
                                    {{Session('cart')->totalQty}}
                                    @else Không có
                                    @endif &nbsp;Sản&nbsp;phẩm
                                </span>
                            </div>
                            <div class="dropdown-menu cart-body">
                                @if(Session::has('cart'))

                                @foreach($product_cart as $product)
                                <div class="dropdown-item cart-item">
                                    <div class="media">
                                        <a class="cart-item-delete" href="{{route('deleteitem',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
                                        <a class="pull-left"><img width="35px" height="35px" src="{{$product['item']['image']}}" alt=""></a>
                                        <div class="media-body">
                                            <span class="cart-item-title">{{$product['item']['product_name']}}</span> ||
                                            <span class="cart-item-amount">{{$product['qty']}}x<span>
                                                    @if($product['item']['sale']==0)
                                                    {{number_format($product['item']['price'])}}₫&nbsp;@else{{number_format($product['item']['saleprice'])}}₫&nbsp;@endif</span></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="cart-caption">
                                    <div class="cart-total text-right" style="text-align: center;border: 1px solid black;background: #33FFFF;">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VNĐ</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="/order" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!--MENU-->
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="navbar">
                <div class="container-fluid">
                    @foreach($menus as $menu)
                    <a href="{{$menu->menu_link}}"><b>{{$menu->menu_name}}</b></a>
                    @endforeach
                </div>
            </div>
        </div>
 
        <!--CONTAIN-->
        @yield('content')


        <!--SUBFOOTER-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="background: #F5F5F5">
                <div class="container-fluid">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="margin-top:40px;">
                        <!--                        <div class="facebook">
                                                    <iframe scrolling="no" frameborder="0" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsangmobile.com.vn%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" style="border:none; width:100%; height:259px;" allowtransparency="false"></iframe>
                                                </div>-->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xs-12" style="margin-top:40px;">
                        <div class="menu_info_wapper">
                            <p class="sococial">
                                <a target="blank_" href="https://www.facebook.com/Studionoithat" title="Chia sẻ lên facebook"><img src="{{asset('images/7.jpg')}}"></a>
                                <a target="blank_" href="https://twitter.com/studionoithat" title="Chia sẻ lên Twitter"><img src="{{asset('images/8.jpg')}}"></a>
                                <span><a href="#"><img src="{{asset('images/9.jpg')}}"></a></span>
                                <span><a href="#"><img src="{{asset('images/10.jpg')}}"></a></span>
                                <span><a href="#"><img src="{{asset('images/11.jpg')}}"></a></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                        <div class="menu_info_wapper">
                            <h3>THÔNG TIN CÔNG TY</h3>
                            <ul class="menu_info_wapper_ul">
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Kho mẫu</a></li>
                                <li><a href="">Chính sách</a></li>
                                <li><a href="">Hình thức thanh toán</a></li>
                                <li><a href="">Lợi ích khách hàng</a></li>
                                <li><a href="">FAQS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                        <div class="menu_info_wapper">
                            <h3>LIÊN HỆ</h3>
                            <ul class="menu_info_wapper_ul">
                                <li>
                                    <div class="posioton-footer-icon">
                                        <img src="{{asset('images/4.png')}}">

                                    </div>
                                    <h5><strong>TPHCM</strong></h5>
                                    <p>Mr.Thái <a href="tel:+84903935666"><span class="pink"><strong>0903 935 666</strong></span></a></p>
                                </li>
                                <li>
                                    <div class="posioton-footer-icon">
                                        <img src="{{asset('images/4.png')}}">

                                    </div>
                                    <h5><strong>Hà Nội</strong></h5>
                                    <p>Mr.Giáp <a href="tel:+84913867940"><span class="pink"><strong>0913 867 940</strong></span></a></p>
                                </li>
                                <li>
                                    <div class="posioton-footer-icon">
                                        <img src="{{asset('images/4.png')}}">

                                    </div>
                                    <h5><strong>Ninh Thuận</strong></h5>
                                    <p>Chị Ấn <a href="tel:+84927207916"><span class="pink"><strong>0927 207 916</strong></span></a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--FOOTER-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="background: #E7E7E7">
                <div class="container-fluid">

                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-top:20px;margin-bottom:20px;">
                        <div class="copyright">
                            <p>
                                Copyright © SANGMOBLIE.com
                            </p>
                            <p>
                                Công ty TNHH Sangmobile
                            </p>
                            <p>
                                103 Đường Năng Nhơn Phú , Phường Phước Long B , Quận 9 ,TP.HCM
                            </p>
                            <p>
                                Hotline: <span style="font-size:14px;"><a href="tel:+840903935666">0903 935 666</a></span> (Mr.vinh)
                            </p>
                        </div>
                        <div>
                            <a href="" target="_blank"><img src=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border:1px solid black;border-radius:5px;margin-top:40px;width:16%;margin-left:20px;">
                        <div class="bay_nam" style="margin-left:-20px;">

                            <div class="col-lg-1 col-md-1">
                                <h3 style="font-size:40px">12</h3>
                            </div>
                            <div class="col-lg-2 col-md-2" style="margin-left:30px;margin-top:2px;">
                                <p style="color: #ED1667;font-weight:bold;font-size:18px;">Years&nbsp;Online</p>
                                <p style="color: #ED1667; font-weight: bold; font-size: 18px;">2008&nbsp;-&nbsp;2019</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
