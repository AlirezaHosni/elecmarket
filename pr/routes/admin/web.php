<?php

use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => 'categories'], function () {
//
//});
//customer
Route::match(['get', 'post'], '/ad/login', 'Web\Auth\AuthController@Login');
Route::match(['get', 'post'], '/ad', 'Web\Auth\AuthController@Login');
Route::match(['get', 'post'], '/ad/logout', 'Web\Auth\AuthController@logout')->name('ad.logout');
Route::group(['prefix' => 'ad', 'middleware' => ['checkAdmin'], 'namespace' => 'Web\Back'], function () {
    //dashbaord
    Route::get('dashboard', 'AdminController@DashboardAdmin')->name('ad.dashboard');
    Route::match(['get', 'post'], '/users/change-password/', 'AdminController@changePassword')->name('ad.changepass');
    Route::post('/users/check-pwd-user', 'AdminController@chkPass');
    //dashbaord
    //admin
    //other
    Route::post('/sellers/get-cat', 'SallerController@getcat');
    //other
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@allCategory')->name('categories.view');
        Route::match(['get', 'post'], '/add', 'CategoryController@addCategory')->name('categories.add');
        Route::get('/del/{id}', 'CategoryController@deleteCategory');
        Route::match(['get', 'post'], '/edit/{id}', 'CategoryController@editCategory');
    });

    Route::group(['prefix' => 'seller'], function () {
        Route::match(['get', 'post'], '/', 'SallerController@index')->name('seller.show');
        Route::match(['get', 'post'], '/create', 'SallerController@create')->name('seller.add');
        Route::match(['get', 'post'], '/edit/{id}', 'SallerController@edit');
        Route::get('/delete/{id}', 'SallerController@delete');

        Route::match(['get', 'post'], '/marker/{id}', 'SallerController@marker');

        Route::match(['get', 'post'], '/marketer/{id}', 'SallerController@marketer');
        Route::match(['get', 'post'], '/category/{id}', 'SallerController@categorymarker');
        Route::match(['get', 'post'], '/category/del/{id}', 'SallerController@catdelete');

        Route::match(['get', 'post'], '/complate/{id}', 'SallerController@complate');
        Route::match(['get', 'post'], '/state/{id}', 'SallerController@state');
    });
    Route::group(['prefix' => 'marketing'], function () {
        Route::match(['get', 'post'], '/category/{id}', 'MarketerController@catmarker');
        Route::match(['get', 'post'], '/category/del/{id}', 'MarketerController@catmarkerdel');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::match(['post', 'get'], '/', 'UserController@index');
        Route::match(['get', 'post'], '/add', 'UserController@create');
        Route::match(['get', 'post'], '/edit/{id}', 'UserController@edit');
        Route::get('/delete/{id}', 'UserController@delete');
        Route::match(['get', 'post'], '/roles/{id}', 'UserController@roles');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::match(['post', 'get'], '/', 'RoleController@index')->name('admin.roles.all');
        Route::match(['post', 'get'], '/add', 'RoleController@add')->name('admin.roles.add');
        Route::get('/del/{id}', 'RoleController@delete');
    });
    Route::match(['get', 'post'], '/role/permissions/{id}', 'RoleController@rolesindex');

    Route::group(['prefix' => 'permissions'], function () {
        Route::match(['post', 'get'], '/', 'PermissionController@index')->name('admin.permissions.all');
        Route::match(['post', 'get'], '/add', 'PermissionController@add')->name('admin.permissions.add');
        Route::get('/del/{id}', 'PermissionController@delete');
    });
    Route::group(['prefix' => 'customers'], function () {
        Route::match(['post', 'get'], '/', 'CustomerController@index');
        Route::match(['get', 'post'], '/add', 'CustomerController@create');
        Route::match(['get', 'post'], '/edit/{id}', 'CustomerController@edit');
        Route::get('/delete/{id}', 'CustomerController@delete');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/view', 'PageController@viewPages')->name('page.view');
        Route::match(['get', 'post'], '/add', 'PageController@addPage')->name('page.add');
        Route::match(['get', 'post'], '/edit/{id}', 'PageController@editPage');
        Route::get('/delete/{id}', 'PageController@deletePage');


        Route::get('/view-complaints', 'PageController@viewComplaints')->name('Complaints');

        Route::match(['get', 'post'], '/support/show', 'PageController@support')->name('support.show');
    });
    Route::group(['prefix' => 'menus'], function () {
        Route::get('/view', 'MenuController@all')->name('menu.all');
        Route::match(['get', 'post'], '/add', 'MenuController@add')->name('menus.add');
        Route::match(['get', 'post'], '/edit/{id}', 'MenuController@edit');
        Route::get('/delete/{id}', 'MenuController@delete');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/view', 'ProductController@listProducts')->name('products.list');
        Route::match(['get', 'post'], '/add', 'ProductController@addProduct')->name('products.add');
        Route::match(['get', 'post'], '/edit/{id}', 'ProductController@editProduct');
        Route::get('/delete/{id}', 'ProductController@deleteProduct');

        Route::match(['get', 'post'], '/add-imgs/{id}', 'ProductController@addImages');
        Route::get('/delete-alt-image/{id}', 'ProductController@deleteProductAltImage');

        Route::match(['get', 'post'], '/add-countdowns', 'ProductController@addcountdown')->name('countdown.add');
        Route::match(['get', 'post'], '/countdowns', 'ProductController@listcountdown')->name('countdown.list');
        Route::match(['get', 'post'], '/edit-countdown/{id}', 'ProductController@editcountdown');
        Route::get('/delete-countdown/{id}', 'ProductController@deletecountdowns');

        //worked
        Route::match(['get', 'post'], '/add-worked', 'ProductController@addworked')->name('worked.add');
        Route::match(['get', 'post'], '/workeds', 'ProductController@workeds')->name('worked.list');
        Route::match(['get', 'post'], '/edit-worked/{id}', 'ProductController@editworked');
        Route::get('/delete-worked/{id}', 'ProductController@deleteworked');
        

        //add stock
        Route::match(['get','post'],'/stock/{id}','StockController@stock');
        //supplement
        Route::get('/related/{id}','LinkedController@index');
        Route::get('/linked/del/{id}','LinkedController@del');
        Route::match(['get', 'post'], '/linked/add/{id}', 'LinkedController@linkedadd');

        //joziat fani

        Route::match(['get','post'],'/fani/{id}','DetailController@fani');
        Route::match(['get','post'],'/barsi/{id}','DetailController@barsi');
        Route::match(['get','post'],'/points/{id}','DetailController@points');
        Route::match(['get','post'],'/downloads/{id}','DetailController@downloads');
        Route::match(['get','post'],'/downloads/del/{id}','DetailController@downloadsDel');
        Route::match(['get','post'],'/comments/{id}','DetailController@comments');
        Route::match(['get','post'],'/comments/change/{id}','DetailController@commentsCheck');
        //report
        Route::match(['get','post'],'/reportprice/{id}','DetailController@reportPrice');
        //change price

        Route::match(['get','post'],'/change-price/','DetailController@changePrice')->name('products.change.price');
    });

    Route::group(['prefix' => 'sliders'], function () {
        Route::match(['get', 'post'], '/add-slider', 'SliderController@addSlider')->name('sliders.add');
        Route::match(['get', 'post'], '/edit-slider/{id}', 'SliderController@editSlider');
        Route::get('/view-sliders', 'SliderController@viewSliders')->name('sliders.view');
        Route::get('/delete-slider/{id}', 'SliderController@deleteSlider');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::match(['get', 'post'], '/add', 'BrandController@addBrand')->name('brands.add');
        Route::match(['get', 'post'], '/edit/{id}', 'BrandController@editBrand');
        Route::get('/view', 'BrandController@allBrands')->name('brands.list');
        Route::get('/delete/{id}', 'BrandController@deleteBrand');
    });
    Route::group(['prefix' => 'news'], function () {
        Route::match(['get', 'post'], '/add', 'NewsController@addnews')->name('news.add');
        Route::match(['get', 'post'], '/edit/{id}', 'NewsController@editnews');
        Route::get('/all', 'NewsController@allnews')->name('news.list');
        Route::get('/delete/{id}', 'NewsController@deletenews');
    });
    Route::group(['prefix' => 'articles'], function () {
        Route::match(['get', 'post'], '/add', 'ArticleController@addarticles')->name('articles.add');
        Route::match(['get', 'post'], '/edit/{id}', 'ArticleController@editarticles');
        Route::get('/view', 'ArticleController@allarticles')->name('articles.list');
        Route::get('/delete/{id}', 'ArticleController@deletearticles');
    });

    Route::group(['prefix' => 'gallerysites'], function () {
        Route::match(['get', 'post'], '/add-gallerysites', 'GalleryController@addgallerys')->name('gallery.add');
        Route::match(['get', 'post'], '/edit-gallerysites/{id}', 'GalleryController@editgallerys');
        Route::get('/view-gallerysites', 'GalleryController@allgallerys')->name('gallery.list');
        Route::get('/delete-gallerysites/{id}', 'GalleryController@deletegallerys');
    });

    Route::group(['prefix' => 'honors'], function () {
        Route::match(['get', 'post'], '/add', 'HonorController@addhonors')->name('honors.add');
        Route::match(['get', 'post'], '/edit/{id}', 'HonorController@edithonors');
        Route::get('/view', 'HonorController@allhonors')->name('honors.list');
        Route::get('/delete/{id}', 'HonorController@deletehonors');
    });

    Route::group(['prefix' => 'promotes'], function () {
        Route::match(['get', 'post'], '/add-promote', 'PromoteController@add')->name('promote.add');
        Route::match(['get', 'post'], '/edit-promote/{id}', 'PromoteController@edit');
        Route::get('/view-promotes', 'PromoteController@all')->name('promote.list');
        Route::get('/delete-promote/{id}', 'PromoteController@delete');
        Route::post('/change-promote-cover', 'PromoteController@changePromoteCover')->name('promote.changePromoteCover');
    });

    Route::group(['prefix' => 'reqforms'], function () {
        Route::match(['get', 'post'], '/add', 'CatReqController@add')->name('reqforms.add');
        Route::match(['get', 'post'], '/edit/{id}', 'CatReqController@edit');
        Route::get('/view', 'CatReqController@all')->name('reqforms.list');
        Route::get('/delete/{id}', 'CatReqController@delete');
    });
    Route::group(['prefix' => 'texts'], function () {
        Route::match(['get', 'post'], '/add', 'TextController@add')->name('texts.add');
        Route::match(['get', 'post'], '/edit/{id}', 'TextController@edit');
        Route::get('/view', 'TextController@all')->name('texts.list');
        Route::get('/delete/{id}', 'TextController@del');
    });

    Route::group(['prefix' => 'wallets'], function () {
        Route::get('view', 'WalletController@show')->name('wallets.list');
        Route::get('user/show', 'WalletController@showuser')->name('wallets.user');
        Route::match(['get', 'post'], 'request/{id}', 'WalletController@request');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/show-status', 'StatusController@all')->name('orders.status.all');
        Route::match(['get', 'post'], '/add-status', 'StatusController@add')->name('orders.status.add');
        Route::match(['get', 'post'], '/edit-status/{id}', 'StatusController@edit');
        Route::get('/delete-status/{id}', 'StatusController@delete');

        Route::match(['get', 'post'], '/change/{id}', 'OrderController@editorders');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::match(['get', 'post'], '/setting', 'SettingController@all')->name('settings.list');
    });

//socials
    Route::match(['get', 'post'], '/socials', 'SettingController@socials')->name('ad.socials');
//order
    Route::match(['get', 'post'], '/cart/show', 'OrderController@showcarts')->name('cart.show');
    Route::match(['get', 'post'], '/order/show', 'OrderController@showorders')->name('order.show');

    Route::get('/payments/all/', 'OrderController@payments')->name('ad.payments');

    Route::match(['get', 'post'], '/addresses/show', 'AddressController@show')->name('address.show');

    Route::match(['get', 'post'], '/req/show', 'PageController@req')->name('req.show');

    Route::match(['get', 'post'], '/icons', 'SettingController@icons')->name('ad.icons');

    Route::match(['get', 'post'], '/banks/users', 'UserController@showBank')->name('bank.user');

    Route::match(['get', 'post'], '/ref/change/{id}', 'RefController@changeref');
    Route::match(['get', 'post'], '/ref', 'RefController@referral')->name('referral');

    Route::group(['prefix' => 'faqs'], function () {
        Route::match(['get', 'post'], '/', 'FaqController@all')->name('faq.cats.list');
        Route::match(['get', 'post'], '/cats/add', 'FaqController@catadd')->name('faq.cats.add');
        Route::match(['get', 'post'], '/cats/edit/{id}', 'FaqController@catedit');
        Route::get('/cats/del/{id}', 'FaqController@catdel');

        //faq
        Route::match(['get', 'post'], '/{id}', 'FaqController@allFaq');
        Route::match(['get', 'post'], '/add/{id}', 'FaqController@addFaq');
        Route::match(['get', 'post'], '/edit/{id}/', 'FaqController@editFaq');
        Route::get('/del/{id}', 'FaqController@delFaq');
    });
});


