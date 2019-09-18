<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderService {

    public function getOrder() {
        return Order::all();
    }

    public function trash($order_id) {
        $order_trash = order::find($order_id)->first();
        if ($order_trash->trash == 0) {
            $order_id->update([
                'trash' => 1
            ]);
        } else {
            $order_id->update([
                'trash' => 0
            ]);
        }
    }

    public function deleteOrder($Order) {
        $order = Order::find($Order->id);
        //dd(($order->trash));
        if (($Order->orderDetails()->exists()) || ($order->trash) == 0) {
            throw new \Exception('còn sản phẩm trong chi tiết sản phẩm thuộc hóa đơn hoặc đơn hàng đang trong trạng thái không được xóa');
        }
        $Order->delete();
    }

    public function detail($order) {
        //dd(OrderDetail::with('order')->with('product')->where('order_id',$order->id)->get());
        return OrderDetail::with('product')->where('order_id',$order->id)->get();
    }
    public function infoDetail($order_id){
        return Order::find($order_id->id);
    }

}
