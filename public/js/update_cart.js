$(document).ready(function () {
    $('input[name="quantity"]').on('change', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var product_id = $(this).attr('data_product_id');
        var quantity = $(this).val();

        $.ajax({
            url: "/update_quantity_to_item",
            type: "POST",
            dateType: "JSON",
            cache: false,
            data: {
                "quantity": quantity,
                "product_id": product_id
            },
            success: function () {

            }
        }).done(function (response) {
            alert('đã sửa sản phẩm ' + response.items[product_id].item.product_name + ' thành số lượng là ' + quantity + ' vui lòng nhấn F5 để cập nhật đầy đủ');
            //console.log(response.items);
            for (var x in response.items) {
                if (x === product_id) {
                    $('td.totalprice').empty();
                    if (response.items[product_id].item.sale === 1) {
                        $('td.totalprice').append("<span>" + response.items[x].item.saleprice * quantity + "₫&nbsp;</span>");
                    } else {
                        $('td.totalprice').append("<span>" + response.items[x].item.price * quantity + "₫&nbsp;</span>");
                    }
                }
            }
            $('h3.label-default').empty();
            $('h3.label-default').append("" + response.totalPrice + "₫&nbsp;");
            $('div.cart div.beta-select').empty();
            $('div.cart div.beta-select').append("\<img src='images/giohang.jpg' width='50px'>\n\
                            <span style='color: #999;' id='cart'>" + response.totalQty + "&nbsp;Sản&nbsp;phẩm</span>");
        });
    });
});




