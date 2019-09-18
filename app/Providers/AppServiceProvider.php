<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CartService;
use Session;
class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
         //
        view()->composer(['layouts.app','layouts.product','home.order','account.mail'],function($view)
        {
            if(Session::has('cart'))
            {
                $Cart = Session('cart');
                //dd($cart->items);
                $view->with(['product_cart'=>$Cart->items,'totalPrice'=>$Cart->totalPrice,
                    'totalQty'=>$Cart->totalQty]);
            }
        });
      
    }

}
