<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VINH TEST LARAVEL</title>
    </head>
    <body>
        <div class="panel-heading">Thông Tin Giỏ Hàng</div>
        <table class="table table-bordered table-hovertext-justify table-responsive table-condensed table-striped text-center" style="border: 1px dotted black;text-align: center;">
            <thead>
                <tr class="text-info" style="border: 1px solid black">
                    <th style="border: 1px solid black">tên sản phẩm</th>

                    <th style="border: 1px solid black">Giá</th>
                    <th style="border: 1px solid black">Số Lượng</th>
                    <th style="border: 1px solid black">Tổng Tiền (VNĐ)</th>
                </tr>
            </thead>
            <tbody>


                @foreach($detail as $cart)
                <tr style="border: 1px solid black">									
                    <td style="border: 1px solid black">{{$cart['product_name']}}</td>

                    <td class="price" style="border: 1px solid black">
                        @if($cart['sale']==0)
                        {{number_format($cart['price'])}}₫&nbsp;
                        @else
                        {{number_format($cart['saleprice'])}}₫&nbsp;
                        @endif
                    </td>
                    <td class="parentquantity" style="border: 1px solid black">
                        <p>{{$cart['qty']}}</p>
                    </td>
                    <td class="totalprice" style="border: 1px solid black"> 
                        @if($cart['sale']==0)
                        {{number_format(($cart['price'])*($cart['qty']))}}₫&nbsp;
                        @else
                        {{number_format(($cart['saleprice'])*($cart['qty']))}}₫&nbsp;
                        @endif

                    </td>		
                </tr>
                @endforeach
            </tbody>
        </table>
    <li class="list-group-item bg-info text-center">
        Số Tiền(Gồm VAT)
        <h3 class="label label-default">

            {{number_format($totalprice)}}₫&nbsp;

        </h3>
    </li>

</body>
</html>