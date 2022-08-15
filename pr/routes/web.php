<?php

use Illuminate\Support\Facades\Route;
Route::get('/wallets/charge','Web\IndexController@checkWallets');
//prefix url
//namespace dir folder
Route::group(['namespace' => 'Web\Front'], function () {
    Route::match(['get', 'post'], '/', 'IndexController@index');
    //search
    Route::match(['get', 'post'], '/search', 'IndexController@search');
//req
    Route::match(['get', 'post'], '/req/{url}', 'IndexController@req');
//product
    Route::match(['get', 'post'], '/products', 'ProductController@products');
    Route::match(['get', 'post'], '/product/{id}/{link}', 'ProductController@product');
    Route::match(['get', 'post'], '/products/category/{slug}', 'ProductController@productsall');

//pages
    Route::match(['get', 'post'], '/pages/{slug}', 'IndexController@pages');
    Route::match(['get', 'post'], '/support', 'IndexController@support');
//complate

    Route::match(['get', 'post'], '/complaints', 'IndexController@complaints');
//article
    Route::match(['get', 'post'], '/articles/{slug}', 'ArticleController@index');
//news
    Route::match(['get', 'post'], '/news/{slug}', 'ArticleController@news');
//catgoery news article
    Route::match(['get', 'post'], '/art/all', 'ArticleController@allarticle')->name('art.all');
    Route::match(['get', 'post'], '/new/all', 'ArticleController@allnews')->name('new.all');
//brands
    Route::match(['get', 'post'], '/brands/{slug}', 'ArticleController@brands');

//jobs
    Route::match(['get', 'post'], '/request/jobs', 'IndexController@jobs')->name('jobs');
//awards
    Route::match(['get', 'post'], '/awards/{slug}', 'ArticleController@awards');
    Route::match(['get', 'post'], '/checkdonator', 'UsersController@checkdonator');
    Route::match(['get', 'post'], '/showdonator', 'UsersController@showdonator');
    Route::match(['get', 'post'], '/checkrahgiri', 'IndexController@checkrahgiri');
// Users Register Form Submit
    Route::match(['get', 'post'], '/get-city', 'UsersController@getcity');

    Route::get('/user-logout', 'UsersController@logout')->name('user-logout');
    Route::group(['prefix' => 'user'], function () {
        Route::match(['get', 'post'], '/register', 'UsersController@register')->name('register');
        Route::match(['get', 'post'], '/login', 'UsersController@login')->name('lgrg');
        Route::match(['get','post'],'/forget-password','UsersController@forgetpass')->name('forgetpass');
        Route::match(['get','post'],'/otp','UsersController@Otp')->name('otp');
    });

    //faq
    Route::group(['prefix' => 'faqs'], function () {
        Route::get('/','FaqController@index');
        Route::match(['get','post'],'/cat/{id}','FaqController@catindex');
        Route::get('/{id}','FaqController@singles');
    });

    Route::match(['get', 'post'], '/products/reports/price/{id}', 'ProductController@reportprice');
    Route::get('/social-share/{id}', 'IndexController@ShareWidget');
});

Route::match(['get', 'post'], '/get-sellers', 'Web\User\OrdersController@getsellers');

