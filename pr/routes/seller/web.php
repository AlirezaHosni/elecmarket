<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Web\Seller'], function () {
    Route::match(['get', 'post'], '/sellers/login', 'AuthController@login');
    Route::match(['get', 'post'], '/sellers', 'AuthController@login');
    Route::match(['get', 'post'], '/sellers/lagout', 'AuthController@lagout')->name('sellers.out');
});
//$user_id = Auth::user()->id;
//dd($user_id);
Route::group(['prefix' => 'sellers', 'middleware' => ['checkSeller'], 'namespace' => 'Web\Seller'], function () {
    //dashbaord
    Route::get('dashboard', 'SellerController@DashboardSeller')->name('sellers.dashborad');
    Route::match(['get', 'post'], '/update-user-pwd', 'SellerController@updatePassword')->name('sellers.password');
    Route::post('/check-user-pwd', 'SellerController@chkUserPassword');
    //$usersget = App\User::where(['id' => $user_id])->first()->type_identity;

    //category
    Route::get('category/show', 'CategoryController@showcat')->name('sellers.cat.show');

    //order
    Route::get('orders/show', 'OrderController@showOrders')->name('sellers.orders.show');
    Route::match(['get', 'post'], '/orders/{id}', 'OrderController@ordershow');
    Route::get('orders/user/show', 'OrderController@showuserOrders')->name('sellers.orders.user.show');
    Route::match(['get', 'post'], '/orders/users/factor/{id}/{user_id}', 'OrderController@orderuserfactorshow');
    //customer
    Route::get('genology/show', 'UserController@showCustomer')->name('sellers.genology.show');
    Route::get('orders/genology/{id}', 'UserController@showordergenology');
    Route::get('referal/prodect', 'ProductController@referal')->name('sellers.referal.prodect');


    //profile
    Route::match(['get', 'post'], 'users/profile', 'UserController@showProfile')->name('sellers.profile');
    Route::match(['get', 'post'], 'banks/update', 'UserController@updatebanks')->name('sellers.bank.update');
    Route::match(['get', 'post'], 'wallets', 'WalletController@showWallet')->name('sellers.wallets');

    //address
    Route::match(['get', 'post'], 'addresses', 'AddressController@showAddress')->name('sellers.address');
    Route::match(['get', 'post'], 'addresses/update/{id}', 'AddressController@updateAddress');
    Route::match(['get', 'post'], 'addresses/del/{id}', 'AddressController@delAddress');
    //Route::match(['get', 'post'], '/addresses/change-city', 'AddressController@changeCity');


});
Route::group(['prefix' => 'sellers', 'middleware' => ['checkSeller']], function () {
    //cart
    Route::match(['get', 'post'], '/add-cart', 'Web\Seller\OrdersController@addtocart');
    Route::match(['get', 'post'], '/cart', 'Web\Seller\OrdersController@cart')->name('sellers.cart');
    // Update Product Quantity from Cart
    Route::get('/cart/update-quantity/{id}/{quantity}', 'Web\Seller\OrdersController@updateCartQuantity');
    Route::get('/cart/del-quantity/{id}', 'Web\Seller\OrdersController@delCartQuantity');
    // Delete Product from Cart Route
    Route::get('/cart/delete-product/{id}', 'Web\Seller\OrdersController@deleteCartProduct');
    //cart
    //shippings
    Route::match(['get', 'post'], '/shippings', 'Web\Seller\OrdersController@shippings')->name('sellers.shippings');
    //sellers
    Route::match(['get', 'post'], '/check/sellers', 'Web\Seller\OrdersController@checkSeller')->name('sellers.checkSeller');
    //payment
    Route::match(['get', 'post'], '/payments/{id}', 'Web\Seller\PaymentController@payments')->name('sellers.payments');
    Route::match(['get', 'post'], '/pay/cod', 'Web\Seller\PaymentController@cod')->name('sellers.payments.cod');
    Route::match(['get', 'post'], '/factor', 'Web\Seller\PaymentController@factor')->name('sellers.factor');
    Route::match(['get', 'post'], '/pay/online', 'Web\Seller\PaymentController@payonline')->name('sellers.pay.online');

    //cart
});
Route::match(['get', 'post'], '/sellers/pay/success/{id}', 'Web\Seller\PaymentController@success');
Route::get('page/access', 'Web\IndexController@access');
Route::match(['get', 'post'], 'sellers/pay/callback', 'Web\Seller\PaymentController@callbackpay');

