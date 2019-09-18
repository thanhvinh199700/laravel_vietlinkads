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
    <h2> BẢNG PRORUCTS <a class="btn btn-primary" href="/product/create" role="button">thêm mới</a></h2>

    <TABLE class="table-bordered table-striped table-dark" width="100%;" style="text-align: center;">

        <tr>
            <th>
                ID
            </th>
            <th>
                product_name
            </th>

            <th>
                product_category
            </th>
            <th>
                brand_id
            </th>

            <th>
                Image
            </th>
            <th>
                Quantity
            </th>
            <th>
                Price
            </th>
            <th>
                Sale Price
            </th>
            <th>
                Status
            </th>
            <th>
                Action
            </th>

        </tr>

        @foreach ($products as $product)
        <tr>

            <td>
                {{$product->id}}
            </td>

            <td>
                {{$product->product_name}}
            </td>

            <td>
                @foreach($category as $cat)
                @if($product->product_category == $cat->id)
                {{$cat->category_name}}
                @endif
                @endforeach
            </td>
            <td>
                @foreach($brand as $brands)
                @if($product->brand_id == $brands->id)
                {{$brands->brand_name}}
                @endif
                @endforeach				
            </td>
            <td>
                <img src="{{$product->image}}" style="width: 50px;">
            </td>

            <td>
                {{number_format($product->quantity)}} sản phẩm
            </td>


            <td>
                {{number_format($product->price)}} 	&#8363;
            </td>

            <td>
                {{number_format($product->saleprice)}} 	&#8363;
            </td>

            <td>
                @if($product->quantity > 0)
                <button class="btn btn-success">còn hàng</button>
                @else
                <button class="btn btn-warning">hết hàng</button>
                @endif
            </td>

            <td>
                <a class="btn btn-success"href='product/edit/{{$product->id}}'>Edit</a>
                <form action="product/destroy/{{$product->id}}" method=post> 
                    @csrf 
                    @method('PUT')  
                    <input class="btn btn-danger"type=submit value=Delete onClick= "return confirm('Ban co chac la muon xoa ?');">
                </form> 
            </td>

        </tr>

        @endforeach

    </table>
    {{$products->links()}}

</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="col-md-6 col-lg-6">
            <form action="" method="GET">
                @csrf
                <li style="list-style-type: none;border-bottom:1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                    <input type="radio" name="rank" value="product"><b style="color: #333333; font-size: 18px;">Thống kê doanh số bán hàng theo PRODUCT</b><br>
                </li>
                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                    <input type="radio" name="rank" value="category"> <b style="color: #333333; font-size: 18px;">Thống kê doanh số bán hàng theo CATEGORY</b><br>
                </li>
                <li style="list-style-type: none;border-bottom: 1px solid #CBCBC6;min-height: 40px;margin-top: 10px;">
                    <input type="radio" name="rank" value="brand"> <b style="color: #333333; font-size: 18px;">Thống kê doanh số bán hàng theo BRAND</b><br>
                </li>
            </form>
        </div>

    </div>
</div>
<div class="col-md-12 col-lg-12 ranking">

</div>
<script>
    $(document).ready(function () {
        $("input[name='rank']").on('change', function () {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var rank = $(this).val();
            $.ajax({
                url: "/product/rankSell",
                type: "GET",
                dateType: "JSON",
                cache: false,
                data: {
                    'rank': rank
                },
                success: function () {

                }
            }).done(function (respones) {
                $('div.ranking').empty();
                $('div.ranking').append("<h1>Thông tin doanh số bán hàng theo từng hạng mục</h1>");
                for (x in respones) {
                    console.log(respones[x].sum);
                    if (rank === 'product') {
                        $('div.ranking').append("<h3 style='color:#FE9A2E;font-family: Comic Sans MS, cursive, sans-serif;'>" + respones[x].product.product_name + "</h3>");
                    } else {
                        if (rank === 'brand')
                        {
                            $('div.ranking').append("<h3 style='color:#FE9A2E;font-family: Comic Sans MS, cursive, sans-serif;'>" + respones[x].brand.brand_name + "</h3>");
                        } else {
                            $('div.ranking').append("<h3 style='color:#FE9A2E;font-family: Comic Sans MS, cursive, sans-serif;'>" + respones[x].category.category_name + "</h3>");
                        }
                    }
                    if (((respones[x].sum) / 10) < 25) {
                        $('div.ranking').append("<div class='progress'>\n\
                                              <div class='progress-bar progress-bar-striped bg-danger' role='progressbar' style='width:" + (respones[x].sum) / 10 + "%;color:black' aria-valuenow='" + (respones[x].sum) / 10 + "' aria-valuemin='0' aria-valuemax='1000'>" + (respones[x].sum) / 10 + "%</div>\n\
                                                <p style='margin-left:40%;'>đã bán được&nbsp;<h6 style='color: red;'>" + (respones[x].sum) + "</h6>&nbsp;sản phẩm</p>\n\
                                            </div><br />");
                    } else {
                        if (((respones[x].sum) / 10) < 50) {
                            $('div.ranking').append("<div class='progress'>\n\
                                              <div class='progress-bar progress-bar-striped bg-warning' role='progressbar' style='width:" + (respones[x].sum) / 10 + "%;color:black' aria-valuenow='" + (respones[x].sum) / 10 + "' aria-valuemin='0' aria-valuemax='1000'>" + (respones[x].sum) / 10 + "%</div>\n\
                                                <p style='margin-left:20%;'>đã bán được&nbsp;<h6 style='color: red;'>" + (respones[x].sum) + "</h6>&nbsp;sản phẩm</p>\n\
                                            </div><br />");
                        } else {
                            if (((respones[x].sum) / 10) < 75) {
                                $('div.ranking').append("<div class='progress'>\n\
                                              <div class='progress-bar progress-bar-striped bg-info' role='progressbar' style='width:" + (respones[x].sum) / 10 + "%;color:black' aria-valuenow='" + (respones[x].sum) / 10 + "' aria-valuemin='0' aria-valuemax='1000'>" + (respones[x].sum) / 10 + "%</div>\n\
                                                <p style='margin-left:10%;'>đã bán được&nbsp;<h6 style='color: red;'>" + (respones[x].sum) + "</h6>&nbsp;sản phẩm</p>\n\
                                            </div><br />");
                            } else {
                                $('div.ranking').append("<div class='progress'>\n\
                                              <div class='progress-bar progress-bar-striped bg-success' role='progressbar' style='width:" + (respones[x].sum) / 10 + "%;color:black' aria-valuenow='" + (respones[x].sum) / 10 + "' aria-valuemin='0' aria-valuemax='1000'>" + (respones[x].sum) / 10 + "%</div>\n\
                                                <p style='margin-left:15px;'>đã bán được&nbsp;<h6 style='color: red;'>" + (respones[x].sum) + "</h6>&nbsp;sản phẩm</p>\n\
                                            </div><br />");
                            }
                        }
                    }
                }
            });
        });
    });
</script>



@endsection

