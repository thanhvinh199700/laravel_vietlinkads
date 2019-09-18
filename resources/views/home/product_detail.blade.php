@extends('layouts.product')
@section('content')

<div class="col-md-12 col-lg-12 col-xm-12 col-sm-12" style="margin-top: 10px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container-fluid" style="padding:0px">
            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                <div class="left-column-block">
                    <div class="title-left-menu" style="margin-top:-20px;">
                        <h3>Danh mục sản phẩm</h3>
                        <div class="borber" style="border-bottom: 5px solid #FF0000;">

                        </div>
                    </div>
                    <div class="menu-left">
                        <div class="u-vmenu">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="/cat/{{$category->id}}"id="parent-id-7" data-cat-id="7" data-option="off" style="font-weight: bold;">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                            <form  action="/sreach_price" method="get" name="searchprice" >
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="1den5" > <b style="color: #333333; font-size: 18px">từ 1 đến 5 triệu</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="5den10"><b style="color: #333333; font-size: 18px;"> từ 5 đến 10 triệu</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="10den15"> <b style="color: #333333; font-size: 18px;">từ 10 đến 15 triệu</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom:1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="15den20"><b style="color: #333333; font-size: 18px;">từ 15 đến 20 triệu</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="tren20"> <b style="color: #333333; font-size: 18px;">trên 20 triệu</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="moinhat"> <b style="color: #333333; font-size: 18px;">Sản phẩm mới nhất</b><br>
                                </li>
                                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                                    <input type="radio" onchange="searchprice.submit()" name="gia" value="sale"> <b style="color: #333333; font-size: 18px;">Sản phẩm đang giảm giá</b><br>
                                </li>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/mai2018.png')}}">

            </div>
            <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12">
                        <div class="slider-product-wp">
                            <div class="gallery">
                                <div class="full" style="overflow:hidden">
                                    <img src="{{$productDetail->image}}" style="border: 4px solid #eee;width:40%" >
                                </div>
                                <div class="full" style="overflow:hidden;margin-top:20px;">
                                    <img src="{{$productDetail->image}}" alt="" style="width: 10%; border: 3px solid #777777">
                                    <img src="{{$productDetail->image}}" alt="" style="width: 10%; border: 3px solid #EEEEEE;">
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                        <form action="" id="add-to-cart" method="post" accept-charset="utf-8">
                            <input type="hidden" name="cartkey" value="">
                            <input type="hidden" name="id" value="2270">
                            <div class="des-product-wp">
                                <h1 class="title-des">{{$productDetail->product_name}}</h1>
                                <p class="status">Tình trạng : <span class="pink" style="color:#dc3545">Còn hàng</span></p>
                                <p class="status">Mã sản phẩm :<span class="pink" style="color:#dc3545">{{$productDetail->id}}</span></p>

                                <p class="status">Đánh giá :<span class="pink" style="color:#dc3545">{{$poinRating[5]}}<img src="{{asset('images/images.jpg')}}" width="30px" style="margin-top:-10px;"><br></span></p>
                                <hr>
                                <div class="product-price-block">
                                    <p class="product-price" style="font-weight: bold; font-size: 20px; color: #dc3545">₫&nbsp;{{number_format($productDetail->price)}}</p>
                                </div>
                                <hr>
                                <div class="form-inline button-product-detail">
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input style="width: 45px; margin-left: 5px;" type="text" class="form-control"  value="{{$productDetail->quantity}}">
                                    </div>

                                    @if($productDetail->quantity > 0)
                                    <a class="concu btn btn-primary" href="#" data_product_id="{{$productDetail->id}}"style="text-decoration:none;color:yellow"><i class="fa fa-cart-plus">Đặt mua hàng</i></a>
                                    @else
                                    <a class="hethang btn btn-warning" href="#"style="text-decoration:none;color:blue;width:120px;">hết hàng</a>
                                    @endif
                                    <div class="form-group">
                                        <a class="btn btn-wishlist" style="margin-right: 0px; background-color: #F0C76A;text-decoration:none;color:#ffffff;"><i class="far fa-heart" style="padding-right: 5px;"></i></a>
                                    </div>
                                </div>

                            </div>
                        </form>                  
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form action="/comment/{{$productDetail->id}}" method="post">
                                {{csrf_field()}}
                                <h3>Hãy để lại bình luận</h3>
                                <textarea name="content" style="width:200%"></textarea> 
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">thêm mới</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <img src="{{$productDetail->image}}" width="90%">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <p>{!!$productDetail->product_detail!!}</p>
                </div>  
                @foreach($comment as $comment)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top:5px">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-2">
                            <img src="{{$comment->user->avatar}}" alt="" width="50px" height="55px">
                            <i style="color:#5624A9">{{$comment->user->name}}</i>
                        </div>
                        <div class="col-lg-10 " style="background:#CCFFFF;margin-left:-15px;height: 55px;padding-top:20px; ">

                            <p>{{$comment->comment_content}}</p>
                        </div>
                    </div>   
                </div>
                @endforeach

                <div class="row" >             
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="border-top: 1px solid #EEEEEE;margin-bottom: 10px;">
                        <h1 class="text-center">CÁC SẢN PHẨM LIÊN QUAN </h1>
                        <div class="container-fluid">
                            @foreach($productRelate as $productRelates)
                            <div class="col-lg-2 col-md-3 col-xs-6 col-sm-6 " style="margin-top:30px;border: 1px solid #EEEEEE;border-radius: 3px;padding-top: 10px;">
                                <div class="item">
                                    <div class="product-block-wp">
                                        <div class="view view-fifth text-center">
                                            <div class="icon-status">
                                            </div>
                                            <div class="image-prod-list" style="margin-left: -16px;">
                                                <a title="Kệ treo tường Entryway" href="/product/{{$productRelates->id}}">
                                                    <img title="Kệ treo tường Entryway" src="{{$productRelates->image}}" alt="Kệ treo tường Entryway" width="150px;">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="clear"></div>
                                        <div class="description top-pro-cen ">
                                            <div class="name-product"><span>Mã sản phẩm : {{$productRelates->id}}</span>
                                                <p style="font-size:14px;">
                                                    <a href="">{{$productRelates->product_name}}</a>

                                                </p>

                                            </div>
                                            <p class="product-price" style="color: #EC4282">₫&nbsp;{{number_format($productRelates->price)}}</p>
                                            <button id ="sosanh" data_product_id="{{$productRelates->id}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" data-json-object="{{json_encode($productRelates)}}">
                                                So sánh
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-center" id="exampleModalLongTitle">So sánh cấu hình và mức giá của 2 sản phẩm</h3>
                                                            <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>        
                                                        <div class="modal-body">
                                                            <div class="col-md-6 col-lg-6" style="border-right: 2px solid #eee">
                                                                <label>Mã sản phẩm : <span>{{$productDetail->id}}</span></label>
                                                                <label>Tên Sản Phẩm : <span>{{$productDetail->product_name}}</span></label>
                                                                <label>hình ảnh : <img src="{{$productDetail->image}}" width="100px"/></label>
                                                                <label>Giá : <span>{{number_format($productDetail->price)}}₫&nbsp;</span></label><br />
                                                                <label>Giá khuyến mãi : <span>{{number_format($productDetail->saleprice)}}₫&nbsp;</span></label>
                                                                <span>{!!$productDetail->product_detail!!}</span>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6" id="lienquan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ex_nx">
                        @if (session('success_message') || session('message'))
                        <div class="alert alert-success">
                            @if(session('success_message'))
                            {{ session('success_message')}}
                            @else
                            {{session('message')}}
                            @endif
                        </div>
                        @endif
                        <h3 class="ex_cntitle">Đánh giá &amp; Nhận xét {{$productDetail->product_name}}</h3>
                        <div class="container" style="margin-left: -10px;height: 150px;">
                            <div class="col-lg-4 col-md-4" style="height: 210px;border: 1px solid #d8d8d8;text-align: center;padding-top: 30px">
                                <div class="ex_chiba ex_diemsao">
                                    <h1 class="ex_diemso" style="color: #fd9727">{{$poinRating[5]}}<img style="margin-top: -15px;"src="{{asset('images/rating.png')}}" width="50px;"/></h1>
                                    <a href="">{{$poinRating[6]}} đánh giá &amp; nhận xét</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="height: 210px;border: 1px solid #d8d8d8;text-align: center;padding-top: 30px">
                                <ul>                      
                                    <li style = "list-style-type: none;">
                                        <span class = "ex_5sao" style = "font-size: 20px;">5<img src = "{{asset('images/rating.png')}}" width = "10px;"/></span>
                                        <span class = "ex_5sao">đã có được tổng cộng là :</span>
                                        <span class = "ex_sdem" style = "font-size: 20px;">{{$poinRating[0]}} <img src="{{asset('images/danhgia.png')}}" width="35px"/></span>
                                    </li>
                                    <li style = "list-style-type: none;">
                                        <span class = "ex_5sao" style = "font-size: 20px;">4<img src = "{{asset('images/rating.png')}}" width = "10px;"/></span>
                                        <span class = "ex_5sao">đã có được tổng cộng là :</span>
                                        <span class = "ex_sdem" style = "font-size: 20px;">{{$poinRating[1]}} <img src="{{asset('images/danhgia.png')}}" width="35px"/></span>
                                    </li>
                                    <li style = "list-style-type: none;">
                                        <span class = "ex_5sao" style = "font-size: 20px;">3<img src = "{{asset('images/rating.png')}}" width = "10px;"/></span>
                                        <span class = "ex_5sao">đã có được tổng cộng là :</span>
                                        <span class = "ex_sdem" style = "font-size: 20px;">{{$poinRating[2]}} <img src="{{asset('images/danhgia.png')}}" width="35px"/></span>
                                    </li>
                                    <li style = "list-style-type: none;">
                                        <span class = "ex_5sao" style = "font-size: 20px;">2<img src = "{{asset('images/rating.png')}}" width = "10px;"/></span>
                                        <span class = "ex_5sao">đã có được tổng cộng là :</span>
                                        <span class = "ex_sdem" style = "font-size: 20px;">{{$poinRating[3]}} <img src="{{asset('images/danhgia.png')}}" width="35px"/></span>
                                    </li>
                                    <li style = "list-style-type: none;">
                                        <span class = "ex_5sao" style = "font-size: 20px;">1<img src = "{{asset('images/rating.png')}}" width = "10px;"/></span>
                                        <span class = "ex_5sao">đã có được tổng cộng là :</span>
                                        <span class = "ex_sdem" style = "font-size: 20px;">{{$poinRating[4]}} <img src="{{asset('images/danhgia.png')}}" width="35px"/></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4" style="height: 210px;border: 1px solid #d8d8d8;padding-top: 30px">
                                <span><p>Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *</p></span>
                                <span><p>Hãy nhập số điểm từ 1 tới 5 dựa trên đánh giá của bạn về sản phẩm</p></span>
                                <h3>Đánh giá của bạn</h3>
                                <form action="/rating/{{$productDetail->id}}" method="POST" name="danhgia">
                                    @csrf
                                    <input type="number" name="rating" min="1" max="5" width="50px;"><img src="{{asset('images/rating.png')}}" width="20px;"/>
                                    <input type="submit" class="btn btn-success btn-md danhgia">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("button#sosanh").click(function () {
            var data = $(this).attr("data-json-object");
            var obj = jQuery.parseJSON(data);
            $("div#lienquan").empty();
            $("div#lienquan").append("<label>Mã sản phẩm :<span> " + obj.id + " </span></label>\n\
                                      <label>Tên sản phẩm :<span> " + obj.product_name + " </span></label>\n\
                                      <label>hình ảnh : <img src=" + obj.image + " width='100px'/></label>\n\
                                      <label>Giá : <span>" + obj.price + "₫&nbsp;</span></label><br />\n\
                                      <label>Giá : <span>" + obj.saleprice + "₫&nbsp;</span></label><br />\n\
                                      <span>" + obj.product_detail + "</span>");
        });
    });
</script>
@endsection
