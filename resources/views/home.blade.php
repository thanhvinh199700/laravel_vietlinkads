@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12 col-xm-12 col-sm-12" >
        <div class="col-md-2 col-lg-2 col-xm-12 col-sm-12 text-center" >
            <div style="margin-left: 16px;background: #dc3545;">
                <img src="{{asset('images/mai2018.png')}}">
            <img src="{{asset('images/dao2018.png')}}">
            </div>
            
        </div>
        <div class="col-md-10 col-lg-10 col-xm-12 col-sm-12" style="background: white;">
            <div class ="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom: 1px solid #ccc; margin-top: 40px;">

                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-8">
                            <h1 style="text-align:center">BEST SELL</h1>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom:1px solid #ccc; margin-top: 40px;">

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="well">
                        <script>
// optional
                            $('#myCarousel').carousel({
                                interval: 1000
                            });
                        </script>
                        <!-- Carousel
                        ================================================== -->            
                        <div id="myCarousel" class="carousel slide">
                            <div class="carousel-inner">

                                <?php $i = 0; ?>
                                <?php $v = count($sell) / 6; ?>
                                @foreach($sell as $products)
                                @if($i<$v)
                                @if($i == 0)
                                <div class="item active" >
                                    <div class="row">
                                        @for($r=0;$r<6;$r++)
                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 15px;background: white">
                                            <div class="item">
                                                <div class="product-block-wp">
                                                    <div class="view view-fifth text-center">
                                                        <div class="icon-status">
                                                        </div>
                                                        <div class="image-prod-list" style="margin-left: -16px;">
                                                            <a title="Kệ treo tường Entryway" href="/product/{{$sell[$r]['product']->id}}">
                                                                <img title="Kệ treo tường Entryway" src="{{$sell[$r]['product']->image}}" alt="Kệ treo tường Entryway" width="95%">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="description top-pro-cen">
                                                        <div class="name-product">
                                                            <p style="font-size:14px;">
                                                                <a href="">{{$sell[$r]['product']->product_name}}</a>

                                                            </p>

                                                        </div>

                                                        @if($sell[$r]['product']->sale == 0)
                                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($sell[$r]['product']->price)}}</p>
                                                        <p class="product-price" style="color: #EC4282">No Promotion</p>
                                                        @else
                                                        <p class="product-price" style="color: #EC4282;text-decoration: line-through">₫&nbsp;{{number_format($sell[$r]['product']->price)}}</p>
                                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($sell[$r]['product']->saleprice)}}</p>
                                                        @endif
                                                        <img src="{{asset('images/star.png')}}" width="70px"><br />
                                                        @if($sell[$r]['product']->quantity > 0)
                                                        <a class="concu btn btn-primary" href="#" data_product_id="{{$sell[$r]['product']->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
                                                        @else
                                                        <a class="hethang btn btn-warning" href="#"style="text-decoration:none;color:yellow;width:120px;">hết hàng</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                @else
                                <div class="item">
                                    <div class="row">
                                        @for($r=6;$r<12;$r++)
                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 15px;background: white">
                                            <div class="item">
                                                <div class="product-block-wp">
                                                    <div class="view view-fifth text-center">
                                                        <div class="icon-status">
                                                        </div>
                                                        <div class="image-prod-list" style="margin-left: -16px;">
                                                            <a title="Kệ treo tường Entryway" href="/product/{{$sell[$r]['product']->id}}">
                                                                <img title="Kệ treo tường Entryway" src="{{$sell[$r]['product']->image}}" alt="Kệ treo tường Entryway" width="95%">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="description top-pro-cen">
                                                        <div class="name-product">
                                                            <p style="font-size:14px;">
                                                                <a href="">{{$sell[$r]['product']->product_name}}</a>

                                                            </p>

                                                        </div>

                                                        @if($sell[$r]['product']->sale == 0)
                                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($sell[$r]['product']->price)}}</p>
                                                        <p class="product-price" style="color: #EC4282">No Promotion</p>
                                                        @else
                                                        <p class="product-price" style="color: #EC4282;text-decoration: line-through">₫&nbsp;{{number_format($sell[$r]['product']->price)}}</p>
                                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($sell[$r]['product']->saleprice)}}</p>
                                                        @endif
                                                        <img src="{{asset('images/star.png')}}" width="70px"><br />
                                                        @if($sell[$r]['product']->quantity > 0)
                                                        <a class="concu btn btn-primary" href="#" data_product_id="{{$sell[$r]['product']->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
                                                        @else
                                                        <a class="hethang btn btn-warning" href="#"style="text-decoration:none;color:yellow;width:120px;">hết hàng</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div> 
                                @endif
                                @endif
                                <?php $i++; ?>
                                @endforeach
                            </div>

                            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>


                        </div><!-- End Carousel --> 
                    </div><!-- End Well -->
                </div>
            </div>
            <div class ="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom: 1px solid #ccc; margin-top: 40px;">

                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-8">
                            <h1 style="text-align:center">NEW PRODUCTS</h1>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom:1px solid #ccc; margin-top: 40px;">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        @foreach($result as $newproduct)
                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="margin-top:30px;border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 10px;">
                            <div class="item">
                                <div class="product-block-wp">
                                    <div class="view view-fifth text-center">
                                        <div class="icon-status">
                                        </div>
                                        <div class="image-prod-list" style="margin-left: -16px;">
                                            <a title="Kệ treo tường Entryway" href="/product/{{$newproduct->id}}">
                                                <img title="Kệ treo tường Entryway" src="{{$newproduct->image}}" alt="Kệ treo tường Entryway" width="150px;">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="description top-pro-cen ">
                                        <div class="name-product">
                                            <p style="font-size:14px;">
                                                <a href="">{{$newproduct->product_name}}</a>

                                            </p>

                                        </div>
                                        @if($newproduct->sale == 0)
                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($newproduct->price)}}</p>
                                        <p class="product-price" style="color: #EC4282">No Promotion</p>
                                        @else
                                        <p class="product-price" style="color: #EC4282;text-decoration: line-through">₫&nbsp;{{number_format($newproduct->price)}}</p>
                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($newproduct->saleprice)}}</p>
                                        @endif
                                        <img src="{{asset('images/star.png')}}" width="70px"><br />
                                        @if($newproduct->quantity > 0)
                                        <a class="concu btn btn-primary" href="#" data_product_id="{{$newproduct->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
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


            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom: 1px solid #ccc; margin-top: 40px;">

                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-8">
                            <h1 style="text-align:center">PROMOTION PRODUCTS</h1>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-2" style="border-bottom:1px solid #ccc; margin-top: 40px;">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        @foreach($saleproduct as $saleproducts)
                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="margin-top:30px;border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 15px;">
                            <div class="item">
                                <div class="product-block-wp">
                                    <div class="view view-fifth text-center">
                                        <div class="icon-status">
                                        </div>
                                        <div class="image-prod-list" style="margin-left: -16px;">
                                            <a title="Kệ treo tường Entryway" href="/product/{{$saleproducts->id}}">
                                                <img title="Kệ treo tường Entryway" src="{{$saleproducts->image}}" alt="Kệ treo tường Entryway" width="150px;">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                    <div class="description top-pro-cen">
                                        <div class="name-product">
                                            <p style="font-size:14px;">
                                                <a href="">{{$saleproducts->product_name}}</a>

                                            </p>

                                        </div>

                                        <p class="product-price" style="color: #EC4282;text-decoration: line-through">₫&nbsp;{{number_format($saleproducts->price)}}</p>
                                        <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($saleproducts->saleprice)}}</p>
                                        <img src="{{asset('images/star.png')}}" width="70px"><br />
                                        @if($saleproducts->quantity > 0)
                                        <a class="concu btn btn-primary" href="#" data_product_id="{{$saleproducts->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
                                        @else
                                        <a class="hethang btn btn-warning" href="#"style="text-decoration:none;color:yellow;width:120px;">hết hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center"> {{$saleproduct->links()}}</div>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection
