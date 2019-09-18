<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RATING</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <style>



            .searchbar{
                margin-bottom: auto;
                margin-top: auto;
                height: 60px;
                background-color: #353b48;
                border-radius: 30px;
                padding: 10px;
            }

            .search_input{
                color: white;
                border: 0;
                outline: 0;
                background: none;
                width: 0;
                caret-color:transparent;
                line-height: 40px;
                transition: width 0.4s linear;
            }

            .searchbar:hover > .search_input{
                padding: 0 10px;
                width: 450px;
                caret-color:red;
                transition: width 0.4s linear;
            }

            .searchbar:hover > .search_icon{
                background: white;
                color: #e74c3c;
            }

            .search_icon{
                height: 40px;
                width: 40px;
                float: right;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                color:white;
            }
        </style>

        <div class="col-12" style="min-height: 100px;  height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    background: #e74c3c !important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12" style="margin-top:15px;">
                        <a href="/">
                            <img src="{{asset('images/logo1.png')}}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="margin-top:26px;margin-left:0px;">
                        <form class="form-inline my-2 my-lg-0" method="GET" style="width:100%;" action="/submit_search">
                            <div class="container h-100">
                                <div class="d-flex justify-content-center h-100">
                                    <div class="searchbar">
                                        <input class="search_input" type="text" name="key" placeholder="Search...">
                                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="showtimkiem" style="z-index:999;position: absolute;;margin-top: 270px">
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
                $('div#showtimkiem').append(" <a href='/product/" + respones[0][i].id + "'><div class='col-md-12 col-lg-12' style='background:white;border: 1px dotted #343030;border-radius:5px;width:800px;box-shadow: 10px 10px 5px #eeeeee;'>\n\
                                                                                                                                                       <div class='row'>\n\
                                                                                                                                                            <div class='col-md-3 col-lg-3'>\n\
                                                                                                                                                               <img style='margin-left:-10px;'src='" + respones[0][i].image + "' width='50px' height='50px'/>\n\
                                                                                                                                                            </div><div class='col-md-9 col-lg-9'>\n\
                                                                                                                                                               <h5 style='color:black;font-weight:bold'>" + respones[0][i].product_name + "</h5>\n\
                                                                                                                                                                <span style='margin-top:-10px;color:red;'>" + respones[0][i].price + "₫&nbsp;</span>\n\
                                                                                                                                                            </div>\n\
                                                                                                                                                       </div></div></a>");
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
        </div>
        <style>

            #myCarousel .carousel-item .mask {
                position: absolute;
                top: 0;
                left:0;
                height:100%;
                width: 100%;
                background-attachment: fixed;
            }
            #myCarousel h4{
                font-size:50px;
                margin-bottom:15px;
                color:#FFF;
                line-height:100%;
                letter-spacing:0.5px;
                font-weight:600;
            }
            #myCarousel p{
                font-size:18px;
                margin-bottom:15px;
                color:#d5d5d5;
            }
            #myCarousel .carousel-item a{background:#F47735; font-size:14px; color:#FFF; padding:13px 32px; display:inline-block; }
            #myCarousel .carousel-item a:hover{background:#394fa2; text-decoration:none;  }

            #myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft; animation-name:fadeInLeft;} 
            #myCarousel .carousel-item p{-webkit-animation-name:slideInRight; animation-name:slideInRight;} 
            #myCarousel .carousel-item a{-webkit-animation-name:fadeInUp; animation-name:fadeInUp;}
            #myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight; animation-name:slideInRight; display:block; height:auto; max-width:100%;}
            #myCarousel h4, #myCarousel p, #myCarousel a, #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;
                                                                                               animation-duration: 1.2s;
                                                                                               -webkit-animation-fill-mode: both;
                                                                                               animation-fill-mode: both;
            }
            #myCarousel .container {max-width: 1430px;  }
            #myCarousel .carousel-item{height:100%; min-height:550px; }
            #myCarousel{position:relative; z-index:1; background:url(https://i.imgur.com/6axE29k.jpg) center center no-repeat; background-size:cover; }

            .carousel-control-next, .carousel-control-prev{height:40px; width:40px; padding:12px; top:50%; bottom:auto; transform:translateY(-50%); background-color: #f47735; }


            .carousel-item {
                position: relative;
                display: none;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                width: 100%;
                transition: -webkit-transform .6s ease;
                transition: transform .6s ease;
                transition: transform .6s ease,-webkit-transform .6s ease;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-perspective: 1000px;
                perspective: 1000px;
            }
            .carousel-fade .carousel-item {
                opacity: 0;
                -webkit-transition-duration: .6s;
                transition-duration: .6s;
                -webkit-transition-property: opacity;
                transition-property: opacity
            }
            .carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active {
                opacity: 1
            }
            .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active {
                opacity: 0
            }
            .carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
                -webkit-transform: translateX(0);
                -ms-transform: translateX(0);
                transform: translateX(0)
            }

            @-webkit-keyframes fadeInLeft {
                from {
                    opacity: 0;
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }

                to {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes fadeInLeft {
                from {
                    opacity: 0;
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }

                to {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            .fadeInLeft {
                -webkit-animation-name: fadeInLeft;
                animation-name: fadeInLeft;
            }

            @-webkit-keyframes fadeInUp {
                from {
                    opacity: 0;
                    -webkit-transform: translate3d(0, 100%, 0);
                    transform: translate3d(0, 100%, 0);
                }

                to {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    -webkit-transform: translate3d(0, 100%, 0);
                    transform: translate3d(0, 100%, 0);
                }

                to {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            .fadeInUp {
                -webkit-animation-name: fadeInUp;
                animation-name: fadeInUp;
            }

            @-webkit-keyframes slideInRight {
                from {
                    -webkit-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
                    visibility: visible;
                }

                to {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes slideInRight {
                from {
                    -webkit-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
                    visibility: visible;
                }

                to {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            .slideInRight {
                -webkit-animation-name: slideInRight;
                animation-name: slideInRight;
            }

        </style>
        <script> $('#myCarousel').carousel({
                interval: 3000,
            })</script>
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                    <h4>Present your <br>
                                        awesome product</h4>
                                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                        necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                    <a href="#">BUY NOW</a> </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/NKvkfTT.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                    <h4>Present your <br>
                                        awesome product</h4>
                                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                        necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                    <a href="#">BUY NOW</a> </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/duWgXRs.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2">
                                    <h4>Present your <br>
                                        awesome product</h4>
                                    <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                                        necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                                    <a href="#">BUY NOW</a> </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/DGkR4OQ.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

    </body>

</html>