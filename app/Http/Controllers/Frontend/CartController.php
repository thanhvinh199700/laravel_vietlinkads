<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Services\CartService;
use App\Services\MenuService;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductService;
use Session;
//sử dụng khi viết event Listener
//use App\Events\OrderPayment;
//use App\Events\OrderPaymentOnline;
//sử dụng khi viết QUEUES JOB
use App\Jobs\SendMailAfterPayment;
use App\Jobs\SendMailAfterPaymentOnline;

class CartController extends Controller {

    protected $menusService;
    protected $productService;
    protected $cartService;

    /**
     * @var ProductService
     */

    /**
     * Create a new controller instance.

     * @param  ProductService  $productService
     * @return  void
     */
    public function __construct(ProductService $productService, MenuService $menuService, CartService $cartService) {

        $this->productService = $productService;
        $this->menuService = $menuService;
        $this->cartService = $cartService;
    }

    public function getAddToCart(request $request, $id) {
        if (Auth::check()) {
            $product = $this->productService->getProductDetail($id);
            $cart = new CartService();
            $cart->add($product, $id);
            $request->Session()->put('cart', $cart);
            return response()->json($cart);
        }
    }

    public function getPageOrder() {
        $menu = $this->menuService->getMenus();
        return view('home.order', ['menus' => $menu]);
    }

    public function deleteItemInCart(Request $request, $product_id) {

        $c = $this->cartService->deleteItem($product_id);
        $request->Session()->get('cart', $c);
        $carts = Session('cart');
        if (count($carts->items) > 0) {
            Session()->put('cart', $carts);
            return redirect()->back();
        } else {
            Session::forget('cart');
            return redirect('/');
        }
    }

    public function updateItem(Request $request) {

        $c = $this->cartService->updateItem($request->get('quantity'), $request->get('product_id'));
        $request->Session()->get('cart', $c);
        return response()->json(Session('cart'));
    }

    public function payment(Request $request) {
        $cart = session('cart');
        if (Auth::check()) {
            //$this->dispatch(new SendMailAfterPayment(Auth::user(), $cart));
            $this->cartService->simplePayment($request->all());
        }
        return redirect('/')->with("message", "Đặt hàng thành công");
    }

    public function paymentOnline(Request $request) {
        $url = $this->cartService->paymentOnline($request->all());
        return redirect($url);
    }

    public function process(Request $request) {
        if (($request->get('vpc_TxnResponseCode')) == 0) {
            $cart = session('cart');
            if (Auth::check()) {
                $this->dispatch(new SendMailAfterPaymentOnline(Auth::user(), $cart));
                $this->cartService->simplePayment($request->all());
                return redirect('/')->with('message', 'đã thanh toán thành công. Chúng tôi sẽ giao hàng trong 2 đến 3 ngày');
            }
        } else {
            echo $request->get('vpc_Message');
            echo "<br />";
            echo 'thanh toán không thành công';
        }
    }

}
