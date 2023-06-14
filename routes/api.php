<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.api_admin'], function () {
    Route::group(['namespace' => 'Api', 'prefix' => 'banners'], function () {
        Route::get('', 'BannerController@getList')->name('banners.list');
        Route::post('add', 'BannerController@postAdd')->name('banners.add');
        Route::post('delete/{id}', 'BannerController@postDelete')->name('banners.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'category'], function () {
        Route::get('', 'CategoryController@getList')->name('category.list');
        Route::post('add', 'CategoryController@postAdd')->name('category.add');
        Route::get('update/{id}', 'CategoryController@getUpdate')->name('category.view.update');
        Route::post('update/{id}', 'CategoryController@postUpdate')->name('category.update');
        Route::post('delete/{id}', 'CategoryController@postDelete')->name('category.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'image'], function () {
        Route::get('list-image', 'ImageController@ListImage');
        Route::post('add', 'ImageController@imageAdd')->name('image.add');
        Route::get('update/{id}', 'ImageController@getUpdate')->name('image.view.update');
        Route::post('update/{id}', 'ImageController@imageUpdate')->name('image.update');
        Route::post('delete/{id}', 'ImageController@imageDelete')->name('image.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'brand'], function () {
        Route::get('', 'BrandController@getList')->name('brand.list');
        Route::post('add', 'BrandController@postAdd')->name('brand.add');
        Route::get('update/{id}', 'BrandController@getUpdate')->name('brand.view.update');
        Route::post('update/{id}', 'BrandController@postUpdate')->name('brand.update');
        Route::post('delete/{id}', 'BrandController@postDelete')->name('brand.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'product'], function () {
        Route::get('', 'ProductController@getList')->name('product.list');
        Route::post('add', 'ProductController@postAdd')->name('product.add');
        Route::get('update/{id}', 'ProductController@getUpdate')->name('product.view.update');
        Route::post('update/{id}', 'ProductController@postUpdate')->name('product.update');
        Route::post('delete/{id}', 'ProductController@postDelete')->name('product.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'post'], function () {
        Route::get('', 'PostController@getList')->name('post.list');
        Route::post('add', 'PostController@postAdd')->name('post.add');
        Route::get('update/{id}', 'PostController@getUpdate')->name('post.view.update');
        Route::post('update/{id}', 'PostController@postUpdate')->name('post.update');
        Route::post('delete/{id}', 'PostController@postDelete')->name('post.delete');
    });

    Route::group(['namespace' => 'Api', 'prefix' => 'page'], function () {
        Route::get('', 'PageController@getList')->name('page.list');
        Route::post('add', 'PageController@postAdd')->name('page.add');
        Route::get('update/{id}', 'PageController@getUpdate')->name('page.view.update');
        Route::post('update/{id}', 'PageController@postUpdate')->name('page.update');
        Route::post('delete/{id}', 'PageController@postDelete')->name('page.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'notifications'], function () {
        Route::get('', 'NotificationController@getList')->name('notification.list');
        Route::post('add', 'NotificationController@postAdd')->name('notification.add');
        Route::get('update/{id}', 'NotificationController@getUpdate')->name('notification.view.update');
        Route::post('update/{id}', 'NotificationController@postUpdate')->name('notification.update');
        Route::post('delete/{id}', 'NotificationController@postDelete')->name('notification.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'contact'], function () {
        Route::get('', 'ContactController@getList')->name('contact.list');
        Route::post('add', 'ContactController@postAdd')->name('contact.add');
        Route::get('update/{id}', 'ContactController@getUpdate')->name('contact.view.update');
        Route::post('update/{id}', 'ContactController@postUpdate')->name('contact.update');
        Route::post('delete/{id}', 'ContactController@postDelete')->name('contact.delete');
    });
    Route::group(['namespace' => 'Api', 'prefix' => 'bank'], function () {
        Route::get('', 'BankController@getList')->name('bank.list');
        Route::post('add', 'BankController@postAdd')->name('bank.add');
        Route::get('update/{id}', 'BankController@getUpdate')->name('bank.view.update');
        Route::post('update/{id}', 'BankController@postUpdate')->name('bank.update');
        Route::post('delete/{id}', 'BankController@postDelete')->name('bank.delete');
    });
});


Route::group(['namespace' => 'Api', 'prefix' => 'home'], function () {
    Route::get('', 'HomeController@getIndex')->name('home.index');
});
// Hình ảnh
Route::post('add-love-image', 'Api\ImageController@pushLoveImage')->name('new.love.image');
Route::post('remove-love-image/{id}', 'Api\ImageController@RemoveLoveImage');
Route::get('list-love-image', 'Api\ImageController@ListLoveImage')->name('new.list.love.image');
Route::get('filter-category', 'Api\ImageController@FilterImage');

Route::get('new', 'Api\NewController@getIndex')->name('new.index');
Route::get('detail/{slug}', 'Api\NewController@getDetailPost')->name('new.detail.post');
Route::get('product/{id}', 'Api\ProductController@getDetail')->name('new.detail.product');
Route::get('setting', 'Api\SettingController@getSetting')->name('setting.get');
Route::get('search', 'Api\ProductController@getSearch')->name('search.get');
Route::get('categories', 'Api\CategoryController@getList')->name('category.list');
Route::get('categories/{id}', 'Api\CategoryController@getUpdate')->name('category.detail');
Route::get('brands', 'Api\BrandController@getList')->name('brand.list');
Route::get('brands/{id}', 'Api\BrandController@getUpdate')->name('brand.detail');
Route::get('posts', 'Api\PostController@getList')->name('post.list');
Route::get('posts/{id}', 'Api\PostController@getUpdate')->name('post.detail');
Route::get('page', 'Api\PageController@getList')->name('page.list');
Route::get('page/{id}', 'Api\PageController@getUpdate')->name('page.detail');
Route::get('bank', 'Api\BankController@getList')->name('bank.list');



//Auth
Route::post('user-register', 'Api\UserController@register');
Route::post('user-login', 'Api\UserController@login');

Route::group(['middleware' => 'auth.jwt'], function () {
//Bill
    Route::get('bills', 'Api\BillController@listBill');
    Route::post('add-bill', 'Api\BillController@addBill');

    Route::post('send-contact', 'Api\ContactController@sendContact');
    Route::post('send-contact-find-product', 'Api\ContactController@sendContactFindProduct');
    // Route::get('notifications', 'Api\NotificationController@getList');

//    profile
    Route::post('password/change', 'Api\Auth\AccountController@change');
    Route::get('profile', 'Api\UserController@profile');
    Route::post('profile/update', 'Api\UserController@update');
    Route::get('logout', 'Api\Auth\AccountController@logout');
    Route::post('banking/recharge', 'Api\UserController@Recharge');
    Route::post('banking/deduct', 'Api\UserController@Deduct');
});

Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('confirm-account', 'Api\Auth\RegisterController@confirmRegister');
Route::post('resend-otp', 'Api\Auth\RegisterController@resendOtp');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('password/email', 'Api\Auth\ForgotPasswordController@sendMailForgot');//Gủi mã otp quên mật khẩu
Route::post('password/email-resend', 'Api\Auth\ForgotPasswordController@reSendMailForgot');//Gủi lại mã otp quên mật khẩu
Route::post('password/reset', 'Api\Auth\ForgotPasswordController@resetPassword');//Tạo mật khẩu mới từ otp trên