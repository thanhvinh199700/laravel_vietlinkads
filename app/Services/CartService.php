<?php

namespace App\Services;

use Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CartService {

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct() {
        if (Session::has('cart')) {

            $this->items = Session('cart')->items;
            $this->totalQty = Session('cart')->totalQty;
            $this->totalPrice = Session('cart')->totalPrice;
        }
    }

    public function add($item, $id) {
        $product = Product::find($id);
        $giohang = ['qty' => 0, 'price' => $item->price, 'sale' => $item->sale, 'saleprice' => $item->saleprice, 'item' => $item,'product_name'=>$item->product_name];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty'] ++;
        $this->items[$id] = $giohang;

        if ($this->items[$id]['qty'] <= $product->quantity) {
            $this->totalQty++;
        } else {
            echo 'sản phẩm không đủ';
            die;
        }
        if ($this->items[$id]['sale'] == 0) {
            $this->totalPrice += $item->price;
        }
        $this->totalPrice += $item->saleprice;
    }

    public function deleteItem($id) {
        $cart = session('cart');
        foreach ($cart->items as $k => $v) {
            if ($k == $id) {
                $cart->totalQty -= $cart->items[$id]['qty'];
                if ($cart->items[$id]['sale'] == 0) {
                    $cart->totalPrice -= $cart->items[$id]['price'] * $cart->items[$id]['qty'];
                } else {
                    $cart->totalPrice -= $cart->items[$id]['saleprice'] * $cart->items[$id]['qty'];
                }
            }
        }
        unset($cart->items[$id]);
        session(['cart' => $cart]);
    }

    public function updateItem($quantity, $product_id) {
        $product = Product::find($product_id);
        $cart = Session('cart');
        if (count($cart->items) > 0) {
            foreach ($cart->items as $k => $v) {
                $total = $cart->totalPrice;
                $totalQty = $cart->totalQty;
                if ($k == $product_id) {
                    if ($cart->items[$k]['sale'] == 1) {
                        $total -= $cart->items[$k]['saleprice'] * $cart->items[$k]['qty'];
                    } else {
                        $total -= $cart->items[$k]['price'] * $cart->items[$k]['qty'];
                    }
                    $totalQty -= $cart->items[$k]['qty'];
                    if ($quantity <= $product->quantity) {
                        $cart->items[$k]['qty'] = $quantity;
                        if ($cart->items[$k]['sale'] == 1) {
                            $total += $cart->items[$k]['qty'] * $cart->items[$k]['saleprice'];
                        } else {
                            $total += $cart->items[$k]['qty'] * $cart->items[$k]['price'];
                        }
                        $totalQty += $cart->items[$k]['qty'];
                        $cart->totalQty = $totalQty;
                        $cart->totalPrice = $total;
                    } else {
                        $cart->items[$k]['qty'] = $product->quantity;
                        if ($cart->items[$k]['sale'] == 1) {
                            $total += $cart->items[$k]['qty'] * $cart->items[$k]['saleprice'];
                        } else {
                            $total += $cart->items[$k]['qty'] * $cart->items[$k]['price'];
                        }
                        $totalQty += $cart->items[$k]['qty'];
                        $cart->totalQty = $totalQty;
                        $cart->totalPrice = $total;
                    }
                }
            }
        }
        Session(['cart' => $cart]);
    }

    public function simplePayment(array $data) {
        $cart = Session('cart');
        //dd($cart);
        $dt = date('y-m-d H:1:S');
        if ((request()->get('vpc_TxnResponseCode')) != null) {
            if (Auth::check()) {
                $order = Order::create([
                            'order_date' => $dt,
                            'full_name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                            'address' => Auth::user()->address,
                            'phone' => Auth::user()->phone,
                            'total_price' => $cart->totalPrice,
                            'total_quantity' => $cart->totalQty,
                            'trash' => 0,
                            'status' => 2
                ]);
            }
        } else {
            $order = Order::create([
                        'order_date' => $dt,
                        'full_name' => $data['inputName'],
                        'email' => $data['inputEmail'],
                        'address' => $data['inputAddress'],
                        'phone' => $data['inputPhone'],
                        'total_price' => $cart->totalPrice,
                        'total_quantity' => $cart->totalQty,
                        'trash' => 0,
                        'status' => 1
            ]);
        }
        foreach ($cart->items as $key => $value) {
            $product = Product::find($key);
            if (($cart->items[$key]['sale']) === 1) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $key,
                    'qty' => $cart->items[$key]['qty'],
                    'product_price' => $cart->items[$key]['saleprice'],
                    'total' => $cart->items[$key]['saleprice'] * $cart->items[$key]['qty'],
                    'brand_id' => $product->brand_id,
                    'category_id' => $product->product_category,
                    'trash' => 0,
                    'status' => 1
                ]);
            } else {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $key,
                    'qty' => $cart->items[$key]['qty'],
                    'product_price' => $cart->items[$key]['price'],
                    'total' => $cart->items[$key]['price'] * $cart->items[$key]['qty'],
                    'brand_id' => $product->brand_id,
                    'category_id' => $product->product_category,
                    'trash' => 0,
                    'status' => 1
                ]);
            }
           
            $product->update([
                'quantity' => ($product->quantity) - ($cart->items[$key]['qty']),
            ]);

        }
        Session::forget('cart');
    }

    public function paymentOnline() {
        $cart = Session('cart');
        $a = mt_rand(1, 600);
        $SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";
        $array = [
            'vpc_Version' => 2,
            'vpc_Currency' => 'VND',
            'vpc_Command' => 'Pay',
            'vpc_AccessCode' => 'D67342C2',
            'vpc_Merchant' => 'ONEPAY',
            'vpc_Locale' => 'vn',
            'vpc_ReturnURL' => 'http://homestead.test/process',
            'vpc_MerchTxnRef' => "'$a'",
            'vpc_OrderInfo' => 'THANH TOAN CHO SANGMOBILE',
            'vpc_Amount' => $cart->totalPrice . '00',
            'vpc_TicketNo' => '192.168.10.10',
            'AgainLink' => 'http://homestead.test/order',
            'Title' => 'THANH TOAN KHI MUA SAN PHAM SANGMOBIE',
            'vpc_SecureHash' => '',
        ];
        $stringHashData = "";
        $vpcURL = "";
        ksort($array);
        $appendAmp = 0;
        foreach ($array as $key => $value) {
            if (strlen($value) > 0) {
                if ($appendAmp == 0) {
                    $vpcURL .= urlencode($key) . '=' . urlencode($value);
                    $appendAmp = 1;
                } else {
                    $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                }
                if ((strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    $stringHashData .= $key . "=" . $value . "&";
                }
            }
        }
        $stringHashDatas = rtrim($stringHashData, "&");
        if (strlen($SECURE_SECRET) > 0) {
            $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $stringHashDatas, pack('H*', $SECURE_SECRET)));
        }

        $url = 'https://mtf.onepay.vn/onecomm-pay/vpcpost.op?' . $vpcURL . '';
        //dd($url);
        return $url;
    }

}
