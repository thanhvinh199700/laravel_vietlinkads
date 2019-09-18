<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin', function() {
        return view('welcome');
    });
    Route::namespace('Admin')->group(function () {
        // CATEGORIES
        Route::get('/category', 'CategoriesController@Index');
        Route::get('/category/create', 'CategoriesController@create');
        Route::post('/category/create', 'CategoriesController@store');
        Route::put('/category/destroy/{category}', 'CategoriesController@destroy');
        Route::get('/category/edit/{category}', 'CategoriesController@edit');
        Route::put('/category/edit/{category}', 'CategoriesController@update');
        //BRANDS
        Route::get('/brand', 'BrandsController@Index');
        Route::get('/brand/create', 'BrandsController@create');
        Route::post('/brand/create', 'BrandsController@store');
        Route::get('/brand/edit/{brand}', 'BrandsController@edit');
        Route::put('/brand/delete/{brand}', 'BrandsController@destroy');
        Route::put('/brand/edit/{brand}', 'BrandsController@update');
        // PRODUCTS
        Route::get('/product', 'ProductsController@Index');
        Route::get('/product/create', 'ProductsController@create');
        Route::post('/product/create', 'ProductsController@store');
        Route::get('/product/edit/{product}', 'ProductsController@formEdit');
        Route::put('/product/edit/{product}', 'ProductsController@update');
        Route::put('/product/destroy/{product}', 'ProductsController@destroy');
        Route::get('product/rankSell', 'ProductsController@getRankSell');

        //USERS
        Route::get('users', 'UserController@index');
        Route::put('users/destroy/{user}', 'UserController@destroy');
        //MENU
        Route::get('/menu', 'MenusController@index');
        Route::get('/menu/create', 'MenusController@create');
        Route::post('/menu/create', 'MenusController@store');
        Route::get('/menu/edit/{menu}', 'MenusController@edit');
        Route::put('/menu/edit/{menu}', 'MenusController@update');
        Route::put('/menu/destroy/{menu}', 'MenusController@destroy');
        //CONTACT
        Route::get('contacts', 'ContactController@index');
        Route::put('contacts/delete/{contact}', 'ContactController@delete');
        //NEWS
        Route::get('/news', 'NewsController@index');
        Route::get('/news/create', 'NewsController@create');
        Route::post('/news/create', 'NewsController@store');
        Route::get('/news/edit/{news}', 'NewsController@edit');
        Route::put('/news/edit/{news}', 'NewsController@update');
        Route::put('/news/destroy/{news}', 'NewsController@destroy');

        //COMMENT
        Route::get('comment', 'CommentController@index');
        Route::put('comment/destroy/{comment}', 'CommentController@destroy');
        Route::get('comment/detail/{product_id}', 'CommentController@listCommentProduct');
//        ORDER
        Route::get('orders', 'OrderController@index');
        Route::get('change_trash/{order_id}', 'OrderController@changeTrash');
        Route::put('orders/{order}', 'OrderController@destroy');
        Route::get('orders/detail/{order}', 'OrderController@detail');
        Route::get('export', 'OrderController@export')->name('export');
        Route::get('detail/export/{order}', 'OrderController@detailExport')->name('export');


        //SLIDE
        Route::get('/slide', 'SlideController@index');
        Route::get('/slide/create', 'SlideController@create');
        Route::post('/slide/create', 'SlideController@store');
        Route::get('/slide/edit/{slide}', 'SlideController@edit');
        Route::put('/slide/edit/{slide}', 'SlideController@update');
        Route::put('/slide/destroy/{slide}', 'SlideController@destroy');
        //SEND MAIL WHEN HAVE PROMOTION
        Route::get('sendmail/{slide}', 'SendMailController@sendMailToUser');
        //LIVE CHAT FORM ADMIN TO USER
        Route::get('/messages', function () {
            return view('message.showNotification');
        });
        Route::post('pusher_admin', 'MessagesController@sendMessageAdmin');
    });
});





Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
});

Route::namespace('User')->group(function () {
    //LOGIN_ADMIN
    Route::get('user/login_admin', 'LoginController@showAdminLoginForm')->name('loginAdmin.show');
    Route::post('user/login_admin', 'LoginController@loginAdmin')->name('loginAdmin');
    //REGISTRATOR
    Route::get('registration', 'RegistrationController@showRegisterForm');
    Route::post('registration', 'RegistrationController@register');
    //LOGOUT

    Route::get('admin/logout', 'LoginController@logoutAdmin')->name('LogoutAdmin');
});


Route::namespace('Frontend')->group(function () {

    Route::get('/', 'ProductController@index');
    Route::get('/cat/{category}', 'ProductController@getProductCat');
    Route::get('/product/{product}', 'ProductController@getProductDetail');
    Route::get('sreach', 'ProductController@getProductSearch');
    Route::get('submit_search', 'ProductController@getProductSearchToSubmit');
    Route::get('sreach_price', 'ProductController@getPriceSegment');
    Route::get('sell', 'ProductController@getSell');
    Route::get('contact', 'ContactController@Index');
    Route::post('contact', 'ContactController@create');
    Route::post('comment/{product}', 'CommentController@createComment');
    Route::get('test', 'ProductController@test');
    Route::get('test2', 'ProductController@test2');
    Route::get('test3', 'ProductController@test3');



    //SHOPPING CART
    Route::get('/add_to_cart/{product_id}', ['as' => 'addtocart', 'uses' => 'CartController@getAddToCart']);
    Route::get('/order', 'CartController@getPageOrder');
    Route::get('/delete_item_to_cart/{product_id}', ['as' => 'deleteitem', 'uses' => 'CartController@deleteItemInCart']);
    Route::post('/update_quantity_to_item', 'CartController@updateItem');
    Route::get('/update_quantity_to_item', 'CartController@getPageOrder');
    Route::post('payment', 'CartController@payment');
    Route::get('payment_online', 'CartController@paymentOnline');
    Route::get('process', 'CartController@process');

    //RATING
    Route::post('rating/{product}', 'RatingController@store');
    //LIVE CHART
    Route::post('pusher', 'MessageController@sendMessageUser');
    Route::get('message/{user}', 'MessageController@messageUser');
});


