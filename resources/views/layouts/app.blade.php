<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VINH TEST LARAVEL</title>
        <meta name="_token" content="{{ csrf_token() }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

        <link href="{{asset('css/style.css')}}" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="{{asset('js/update_cart.js')}}"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
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
                        alert('thêm thành công 1 sản phẩm ' + response.items[product_id].item.product_name + ' vào giỏ hàng');
                    });
                });
            });
        </script>
<!--        <script>
            $(document).ready(function () {
                console.log(typeof (message));
                if (typeof (message) !== 'undefined') {
                    alert('đặt hàng thành công');
                }
            });
        </script>-->
    </head>

    <body style="padding:0px;">
        <style>
            body { padding-top: 50px; }
            /*#####################
            Additional Styles (required)
            ######################*/
            #myCarousel .thumbnail {
                margin-bottom: 0;
            }
            .carousel-control.left, .carousel-control.right {
                background-image:none !important;
            }
            .carousel-control {
                color:#fff;
                top:40%;
                color:#428BCA;
                bottom:auto;
                padding-top:4px;
                width:30px;
                height:30px;
                text-shadow:none;
                opacity:1;
            }
            .carousel-control:hover {
                color: #d9534f;
            }
            .carousel-control.left, .carousel-control.right {
                background-image:none !important;
            }
            .carousel-control.right {
                left:auto;
                right:-32px;
            }
            .carousel-control.left {
                right:auto;
                left:-32px;
            }
            .carousel-indicators {
                bottom:-30px;
            }
            .carousel-indicators li {
                border-radius:0;
                width:10px;
                height:10px;
                background:#ccc;
                border:1px solid #ccc;
            }
            .carousel-indicators .active {
                width:12px;
                height:12px;
                background:#3276b1;
                border-color:#3276b1;
            }
        </style>


        @if(session()->has('message'))  
        <div class="alert alert-success">          
            {{ session()->get('message') }}    
        </div>  @endif 
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
                            <a href=""style="margin-right:50px;color:white;text-decoration: none"><i class="fa fa-user" aria-hidden="true" style="margin-right:2px;"></i>{{Auth::user()->name}}</a>   
                            <a href="/logout" style="color:white;text-decoration: none"><i class="fa fa-unlock" aria-hidden="true"style="margin-right:2px;"></i>logout</a>
                            @else
                            <a href="/registration" style="margin-right:50px;color:white;text-decoration: none"><i class="fa fa-registered" aria-hidden="true"style="margin-right:2px;"></i>Registrator</a>
                            <a href="/login" style="color:white;text-decoration: none"><i class="fa fa-lock" aria-hidden="true"style="margin-right:2px;"></i>Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--HEADER-->
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="min-height: 100px;background: #EFEFFB">
            <div class="container-fluid">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12" style="margin-top:15px;">
                    <a href="/">
                        <img src="{{asset('images/logo1.png')}}" class="img-responsive" />
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="margin-top:26px;margin-left:0px;">
                    <form class="form-inline my-2 my-lg-0" method="GET" style="width:100%;" action="/submit_search">
                        <input id="input" class=" form-control mr-sm-2" name="key" required type="search" style="height: 44px; border-top: 4px solid #dc3545; border-left: 4px solid #dc3545; border-bottom: 4px solid #dc3545; border-radius: 6px 0px 0px 6px;min-width:90%" placeholder="Nhập tên hoặc mã sản phẩm" aria-label="Search" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px solid transparent;padding: 11px 15px;border-radius: 0px 6px 6px 0px;background: #dc3545;margin-left:-3px;">
                            <i class="glyphicon glyphicon-search" style="color:#FFFFFF"></i>
                        </button>
                        <div id="showtimkiem" style="z-index:999;position: absolute;">
                        </div>
                        <script>
                            $(document).ready(function () {
                                $("input#input").on('keyup', function () {
                                    event.preventDefault();
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                        }
                                    });
                                    var key = $(this).val();
                                    $.ajax({
                                        url: "/sreach",
                                        type: "GET",
                                        dateType: "JSON",
                                        cache: false,
                                        data: {
                                            "key": key
                                        },
                                        success: function () {

                                        }
                                    }).done(function (respones) {
                                        var lenght = (respones[1].length);
//                                           console.log(lenght);
//                                                console.log(respones[0]);
                                        $('div#showtimkiem').empty();
                                        for (var i = 0; i <= (respones[0].length); i++) {
                                            if (i === lenght) {
                                                $('div#showtimkiem').empty();
                                            }
                                            $('div#showtimkiem').append(" <a href='/product/" + respones[0][i].id + "'><div class='col-md-12 col-lg-12' style='background:white;border: 1px dotted #343030;border-radius:5px;width:80%;box-shadow: 10px 10px 5px #eeeeee;'>\n\
                                                                                <div class='col-md-3 col-lg-3'>\n\
                                                                                   <img style='margin-left:-10px;'src='" + respones[0][i].image + "' width='50px' height='50px'/>\n\
                                                                                </div><div class='col-md-9 col-lg-9'>\n\
                                                                                   <h5 style='color:black;font-weight:bold'>" + respones[0][i].product_name + "</h5>\n\
                                                                                    <span style='margin-top:-10px;color:red;'>" + respones[0][i].price + "₫&nbsp;</span>\n\
                                                                                </div>\n\
                                                                           </div></a>");
                                        }
                                    });
                                });
                            });
                        </script>

                    </form>                                                    
                </div>
                <div class="col-lg-2 col-md-2 col-xs-6 col-sm-6" style="margin-top:20px;">                 
                    <div class="cart">
                        <div class="beta-select nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('images/giohang.jpg')}}" width="50px"> 
                            <span style="color: #999;" id="cart">
                                @if(Session::has('cart'))
                                {{Session('cart')->totalQty}}
                                @else Không có
                                @endif 
                                &nbsp;Sản&nbsp;phẩm
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


        <!--MENU-->
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="navbar">
                <div class="container-fluid">
                    @foreach($menus as $menu)
                    <a href="{{$menu->menu_link}}"><b style="font-family: Tahoma">{{$menu->menu_name}}</b></a>
                    @endforeach
                    @foreach($categories as $category)
                    <a href="/cat/{{$category->id}}"><b style="font-family: Tahoma">{{$category->category_name}}</b></a>
                    @endforeach
                </div>
            </div>
        </div>
        <!--SLIDE-->



        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
                <div class="container-fluid">
                    <div class="col-lg-8 col-md-7 col-xs-12 col-sm-6">
                        <div id="myCarouse2" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php $i = 0; ?>
                                @foreach($slide as $slides)
                                @if($i==0)
                                <div class="item active">
                                    <img src="{{$slides->slide_image}}" width="100%">
                                    <div class="carousel-caption">
                                        <h3>{{$slides->title}}</h3>
                                        <p>{!!$slides->content!!} <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
                                    </div>
                                </div><!-- End Item -->
                                @else
                                <div class="item">
                                    <img src="{{$slides->slide_image}}" width="100%">
                                    <div class="carousel-caption">
                                        <h3>Headline</h3>
                                        <p> {!!$slides->content!!}<a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
                                    </div>
                                </div><!-- End Item -->
                                @endif
                                <?php $i++; ?>
                                @endforeach
                            </div><!-- End Carousel Inner -->
                            <ul class="nav nav-pills nav-justified">
                                <?php $i = 0; ?>
                                @foreach($slide as $slides)
                                <li data-target="#myCarouse2" data-slide-to="{{$i}}"<?php if ($i == 0) ; ?> class="active"><a href="#">{{$slides->tittle}}<br /><small>{{$slides->short_description}}</small></a></li>
                                <?php $i++; ?>
                                @endforeach

                            </ul>


                        </div><!-- End Carousel -->

                    </div>
                    <div class="col-lg-4 col-md-5 col-xs-12 col-sm-6">
                        <div>
                            <img src="{{asset('images//news/1.jpg')}}" width="100%" style="height:250px;">
                        </div>
                        <div><iframe width="100%" height="285" src="https://www.youtube.com/embed/FxUu9pizUkI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#myCarouse2').carousel({
                    interval: 2000
                });
                var clickEvent = false;
                $('#myCarouse2').on('click', '.nav a', function () {
                    clickEvent = true;
                    $('.nav li').removeClass('active');
                    $(this).parent().addClass('active');
                }).on('slid.bs.carousel', function (e) {
                    if (!clickEvent) {
                        var count = $('.nav').children().length - 1;
                        var current = $('.nav li.active');
                        current.removeClass('active').next().addClass('active');
                        var id = parseInt(current.data('slide-to'));
                        if (count == id) {
                            $('.nav li').first().addClass('active');
                        }
                    }
                    clickEvent = false;
                });
            });
        </script>

        <div class="row"style="">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="container-fluid">
                    <img src="{{asset('images/THONG-DIEP-IPHONE.png')}}" width="98.5%" style="margin-left: 15px;height: 120px;">
                </div>
            </div>
        </div>

        <!--CATEGORY-->
        <div class="row">
            <div class="container-fluid" style="margin-left:15px;">
                <div class="col-lg-12 col-md-12 col-xs-6 col-sm-4">
                    @if(!isset($empty_error))
                    @include('common.category_menu', ['categories' => $categories])
                    @endif
                    <form  action="/sreach_price" method="get" name="searchprice">
                        <select class="text-center" name="gia" onchange="searchprice.submit()" style="border-radius:3px;height: 50px;color:#EEE;border: 1px solid #EEEEEE;width: 160px;padding-left: 20px;font-size: 16px;background: #dc3545">
                            <option hidden="true" value="...">Chọn Phân Khúc</option>
                            <option value="1den5" style="background: #dc3545;color: white;font-weight: bold">Từ 1 đến 5 triệu</option>
                            <option value="5den10" style="background: #dc3545;color: white;font-weight: bold">Từ 5 đến 10 triệu</option>
                            <option value="10den15" style="background: #dc3545;color: white;font-weight: bold">Từ 10 đến 15 triệu</option>
                            <option value="15den20" style="background: #dc3545;color: white;font-weight: bold">Từ 15 đến 20 triệu</option>
                            <option value="tren20" style="background: #dc3545;color: white;font-weight: bold">Trên 20 triệu</option>
                            <option value="moinhat"style="background: #dc3545;color: white;font-weight: bold">Sản phẩm mới</option>
                            <option value="sale" style="background: #dc3545;color: white;font-weight: bold">Khuyến mãi</option>

                        </select>
                    </form>
                </div>
            </div>
        </div>

        <!--CONTAIN-->
        @yield('content')
        <style>.chat
            {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .chat li
            {
                margin-bottom: 10px;
                padding-bottom: 5px;
                border-bottom: 1px dotted #B3A9A9;
            }

            .chat li.left .chat-body
            {
                margin-left: 60px;
            }

            .chat li.right .chat-body
            {
                margin-right: 60px;
            }


            .chat li .chat-body p
            {
                margin: 0;
                color: #777777;
            }

            .panel .slidedown .glyphicon, .chat .glyphicon
            {
                margin-right: 5px;
            }

            .panel-body
            {
                overflow-y: scroll;
                height: 250px;
            }

            ::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar
            {
                width: 12px;
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                background-color: #555;
            }</style>
        <div class="container" style="bottom:0;position: fixed;z-index: 10000;">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="accordion">
                            <span class="glyphicon glyphicon-comment"></span> Chat
                            <div class="btn-group pull-right">
                                <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                            </div>
                        </div>
                        <div class="panel-collapse collapse" id="collapseOne">
                            <div class="panel-body">
                                @if(Auth::check())
                                <ul class="chat">
                                    
                                    @foreach($message as $messages)
                                    
                                    <li class="right clearfix user_id" user-id="{{$messages->user->id}}">
                                        <span class="chat-img pull-right">
                                            <img src="{{$messages->user->avatar}}" width="40px" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>{{$messages->created_at}}</small>
                                                <strong class="pull-right primary-font">{{$messages->user->name}}</strong>
                                            </div>
                                            <p class="pull-left">
                                                {{$messages->message}}
                                            </p>
                                        </div>
                                    </li>
                                    
                                    <?php $i = (count($adminSendMessage)-1);?>
                                   
                                    @foreach($adminSendMessage as $adminSendMessages)
                                    @if(($messages->created_at < $adminSendMessages->created_at && $messages->id+1==$adminSendMessages->id))
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left admin-send" id="{{$adminSendMessage[$i]->from}}">
                                            <img src="{{$adminSendMessages->admin->avatar}}" width="40px" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">

                                                <strong class="pull-left primary-font">{{$adminSendMessages->admin->name}}</strong>
                                                <small class=" text-muted pull-right"><span class="glyphicon glyphicon-time"></span>{{$adminSendMessages->created_at}}</small><br />
                                                <p class="pull-right">
                                                    {{$adminSendMessages->message}}
                                                </p>
                                            </div>

                                        </div>
                                    </li>
                                    @endif
                                    @endforeach         
                                    @endforeach
                                </ul>
                                @else
                                <ul class="chat">

                                </ul>
                                @endif
                            </div>
                            <div class="panel-footer">       
                                <div class="input-group">
                                    <input name="contents" id="btn-input" type="text" class="form-control input-sm contents" placeholder="Type your message here..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning btn-sm user-send" id="btn-chat">
                                            Send</button>
                                    </span>
                                </div>

                            </div>
                            <!--                            CODE XỬ LÝ AJAX CHO ROUTE PUSHER -->
                            <script>
                                $(document).ready(function () {
                                    $("button.user-send").on('click', function () {
                                        //alert('zo day');
                                        event.preventDefault();
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                            }
                                        });
                                        var contents = $("input.contents").val();
                                        var idAdmin = $("span.admin-send").attr('id');
                                        //alert(idAdmin);
                                        $.ajax({
                                            url: "/pusher",
                                            type: "POST",
                                            dateType: "JSON",
                                            cache: false,
                                            data: {
                                                "contents": contents,
                                                "to":idAdmin
                                            },
                                            success: function () {

                                            }
                                        }).done(function (data) {
                                            $('ul.chat').append("<li class='right clearfix'>\n\
                                                                        <span class='chat-img pull-right'>\n\
                                                                           <img src=" + data[0].avatar + " width='40px' alt='User Avatar' class='img-circle' />\n\
                                                                       </span>\n\
                                                                       <div class='chat-body clearfix'>\n\
                                                                           <div class='header'>\n\
                                                                               <strong class='primary-font pull-right'>" + data[0].name + "</strong><small class='text-muted'>\n\
                                                                               <span class='glyphicon glyphicon-time'></span>12 mins ago</small>\n\
                                                                           </div>\n\
                                                                           <p class='pull-left'>" + data[1] + "</p>\n\
                                                                       </div>\n\
                                                                 </li>");
                                        });
                                    });
                                });
                            </script>
                            <!--KẾT THÚC AJAX-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CODE LẮNG NGHE TỪ PUSHER LẤY DATA VÀ IN RA NHƯ Ý MUỐN--> 
        <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('8d25770dd3cc594ee287', {
                cluster: 'ap1'
                        //encrypted: true
                        //forceTLS: true
            });
            var channel = pusher.subscribe('test');
            channel.bind('my_event', function (data) {
                event.preventDefault();
                var id = $("li.user_id").attr('user-id');
                //var idAdmin = $("span.admin-send").attr('id');
                //console.log(idAdmin);
                //console.log(data.toId);
                if (id == data.toId) {
                    $('ul.chat').append("<li class='left clearfix'>\n\
                                            <span class='chat-img pull-left'>\n\
                                                <img src=" + data.user.avatar + " width='40px' alt='User Avatar' class='img-circle' />\n\
                                            </span>\n\
                                             <div class='chat-body clearfix'>\n\
                                                 <div class='header'>\n\
                                                        <strong class='primary-font'>" + data.user.name + "</strong><small class='pull-right text-muted'>\n\
                                                        <span class='glyphicon glyphicon-time'></span>12 mins ago</small>\n\
                                                  </div>\n\
                                                   <p class='pull-right'>" + data.message + "</p>\n\
                                            </div>\n\
                                        </li>");
                }

            });
        </script>
        <!--        KẾT THÚC CODE LẮNG NGHE-->



        <!--SUBFOOTER-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="background: #F5F5F5">
                <div class="container-fluid">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="margin-top:40px;">
                        <div class="facebook">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
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
