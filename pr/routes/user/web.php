<?php

use Illuminate\Support\Facades\Route;

// All Routes after Login
Route::group(['middleware' => ['checkUser']], function () {
    Route::match(['get', 'post'], '/user/account', 'Web\User\AccountController@account')->name('account');
    Route::match(['get', 'post'], '/user/update-user-pwd', 'Web\User\AccountController@updatePassword')->name('user.password');
    Route::post('/check-user-pwd', 'Web\User\AccountController@chkUserPassword');
    //cart
    Route::match(['get', 'post'], '/cart', 'Web\User\OrdersController@cart')->name('cart');
    Route::match(['get', 'post'], '/add-cart', 'Web\User\OrdersController@addtocart');
    // Update Product Quantity from Cart
    Route::get('/cart/update-quantity/{id}/{quantity}', 'Web\User\OrdersController@updateCartQuantity');
    Route::get('/cart/del-quantity/{id}', 'Web\User\OrdersController@delCartQuantity');
    // Delete Product from Cart Route
    Route::get('/cart/delete-product/{id}', 'Web\User\OrdersController@deleteCartProduct');
    //cart
    //shippings
    Route::match(['get', 'post'], '/shippings', 'Web\User\OrdersController@shippings')->name('shippings');
    //sellers
    Route::match(['get', 'post'], '/check/sellers', 'Web\User\OrdersController@checkSeller')->name('checkSeller');
    //payment
    Route::match(['get', 'post'], '/payments', 'Web\User\OrdersController@payments')->name('payments');
    Route::match(['get', 'post'], '/payments', 'Web\User\OrdersController@payments')->name('payments');
    Route::match(['get', 'post'], '/factor', 'Web\User\OrdersController@factor')->name('factor');
    Route::match(['get', 'post'], '/pay/online', 'Web\User\PayController@payonline')->name('pay.online');

    //referal
    Route::match(['get', 'post'], '/products/referral', 'Web\User\OrdersController@referral')->name('product.referral');
    //raferal
    //cart add
    Route::match(['get', 'post'], '/bank/cards', 'Web\User\CardController@cardbank')->name('user.card');
    //cart add
    //panel
    Route::group(['prefix' => 'user', 'namespace' => 'Web\User'], function () {
        Route::match(['get', 'post'], '/orders', 'AccountController@showorder')->name('order.user');
        Route::match(['get', 'post'], '/orders/{id}', 'AccountController@ordershow');
        Route::match(['get', 'post'], '/profile', 'AccountController@profile')->name('profile.user');
        Route::match(['get', 'post'], '/addresses', 'AccountController@showaddress')->name('address.user');
        Route::match(['get', 'post'], '/addresses/add', 'AccountController@addaddress')->name('user.address.add');
        Route::match(['get', 'post'], '/addresses/edit/{id}', 'AccountController@editaddress');
        Route::match(['get', 'post'], '/addresses/del/{id}', 'AccountController@deladdress');

    });

    Route::group(['namespace' => 'Web\User'], function () {
        Route::match(['get', 'post'], '/add-comment', 'CommentController@AddComment');
        Route::match(['get', 'post'], '/reply-add', 'CommentController@replyStore');
    });
});
Route::match(['get', 'post'], '/pay/success/{id}', 'Web\User\PayController@success');
Route::match(['get', 'post'], '/pay/not-success', 'Web\User\PayController@notsuccess');
Route::match(['get', 'post'], '/pay/callback', 'Web\User\PayController@callbackpay');
Route::match(['get', 'post'], '/get-product', 'Web\User\ProductController@getproduct');
