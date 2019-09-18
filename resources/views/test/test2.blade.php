<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VINH TEST LARAVEL</title>
        <meta name="_token" content="{{ csrf_token() }}">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="{{asset('js/update_cart.js')}}"></script>
    </head>

    <body style="padding:0px;">


        <div class="col-12" style="background:#0fdbec;min-height:41px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">
                        <p style="color: white; padding-top: 10px; padding-left: 0px; font-size: 14px; font-family:Open Sans, sans-serif;">Chào mừng bạn đến với SangMobile</p>
                    </div>
                    <div class="col-2" style="margin-top: 10px;float:right;">
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
        <div class="col-12" style="min-height: 100px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12" style="margin-top:15px;">
                        <a href="/">
                            <img src="{{asset('images/logo1.png')}}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="margin-top:26px;margin-left:0px;">
                        <form class="form-inline my-2 my-lg-0" method="GET" style="width:100%;" action="/submit_search">
                            <input id="input" class=" form-control mr-sm-2" name="key" required type="search" style="height: 44px; border-top: 4px solid #0fdbec; border-left: 4px solid #0fdbec; border-bottom: 4px solid #0fdbec; border-radius: 6px 0px 0px 6px;min-width:90%" placeholder="Nhập tên hoặc mã sản phẩm" aria-label="Search" />
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px solid transparent;padding: 11px 15px;border-radius: 0px 6px 6px 0px;background: #0fdbec;margin-left:-10px;height: 44px;">

                            </button>
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
        <div class="col-12" style="background: black;">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/2.png')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/1.png')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/3.png')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class ="row">
                    <h1 style="margin-left: 45%;">BEST SELL</h1>
                </div>
            </div>
        </div>
        <div class="col-12" style="background:whitesmoke;margin-top: 10px;">


            <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
                <ol class="carousel-indicators" style="margin-top: 50px;">
                    <?php $i = 0; ?>
                    <?php $v = count($product) / 6; ?>
                    @foreach($product as $products)
                    @if($i<$v)
                    <li data-target="#carousel-example-multi" data-slide-to="{{$i}}" <?php if ($i == 0) ; ?> class="active" style="color: black;"></li>
                    @endif
                    <?php $i++; ?>
                    @endforeach
                </ol>
                <div class="carousel-inner v-2" role="listbox">
                    <?php $i = 0; ?>
                    <?php $v = count($product) / 6; ?>
                    @foreach($product as $products)
                    @if($i<$v)
                    @if($i == 0)
                    <div class="carousel-item active">
                        <div class="row">
                            @for($r=0;$r<6;$r++)
                            <div class="col-6 col-md-2">
                                <div class="card mb-2">
                                    <img  src="{{$product[$r]->image}}" alt="Card image cap" width="90%">
                                </div>

                            </div>
                            @endfor

                        </div>
                    </div>
                    @else
                    <div class="carousel-item">
                        <div class="row">
                            @for($r=6;$r<12;$r++)
                            <div class="col-6 col-md-2">
                                <div class="card mb-2">
                                    <img  src="{{$product[$r]->image}}" alt="Card image cap" width="90%">
                                </div>
                            </div>
                            @endfor 
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @for($r=12;$r<17;$r++)
                            <div class="col-6 col-md-2">
                                <div class="card mb-2">
                                    <img  src="{{$product[$r]->image}}" alt="Card image cap" width="90%">
                                </div>
                            </div>
                            @endfor 
                        </div>
                    </div>
                </div>
                @endif
                @endif
                <?php $i++; ?>
                @endforeach


            </div>
        </div>
    </body>
</html>
