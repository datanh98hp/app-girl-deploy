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
//Route::get('/', function () {
//    return redirect('/login');
//});

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::group(['middleware' => 'auth', 'prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('post/data', 'PostController@data')->name('post.data');
    Route::resource('post', 'PostController');

    Route::get('category/data', 'CategoryController@data')->name('category.data');
    Route::resource('category', 'CategoryController');

    Route::get('page/data', 'PageController@data')->name('page.data');
    Route::resource('page', 'PageController');

    Route::get('brand/data', 'BrandController@data')->name('brand.data');
    Route::resource('brand', 'BrandController');

    Route::get('product/data', 'ProductController@data')->name('product.data');
    Route::post('product/upload-file', 'ProductController@uploadFile')->name('product.uploadFile');
    Route::post('product/delete-file', 'ProductController@deleteFile')->name('product.deleteFile');
    Route::get('product/reset-file', 'ProductController@resetFile')->name('product.resetFile');
    Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
    Route::resource('product', 'ProductController');


    Route::get('sim/data', 'SimController@data')->name('sim.data');
    Route::get('sim/delete/{id}', 'SimController@delete')->name('sim.delete');
    Route::resource('sim', 'SimController');

    Route::get('smartphone/data', 'SmartPhoneController@data')->name('smartphone.data');
    Route::get('smartphone/delete/{id}', 'SmartPhoneController@delete')->name('smartphone.delete');
    Route::resource('smartphone', 'SmartPhoneController');

    Route::get('locate/data', 'LocateController@data')->name('locate.data');
    Route::get('locate/delete/{id}', 'LocateController@delete')->name('locate.delete');
    Route::resource('locate', 'LocateController');

    Route::get('bank/data', 'BankController@data')->name('bank.data');
    Route::resource('bank', 'BankController');

    Route::get('banner/data', 'BannerController@data')->name('banner.data');
    Route::resource('banner', 'BannerController');

    Route::get('contact/data', 'ContactController@data')->name('contact.data');
    Route::resource('contact', 'ContactController');

    Route::get('bill/data', 'BillController@data')->name('bill.data');
    Route::resource('bill', 'BillController');

    Route::get('widget/data', 'WidgetController@data')->name('widget.data');
    Route::resource('widget', 'WidgetController');

    Route::get('config/data', 'ConfigController@data')->name('config.data');
    Route::resource('config', 'ConfigController');

    Route::get('member/data', 'MemberController@data')->name('member.data');
    Route::resource('member', 'MemberController');
    Route::get('user/data', 'UserController@data')->name('user.data');
    Route::get('user/change-password', 'UserController@changePassword')->name('user.changePassword');
    Route::post('user/change-password', 'UserController@postChangePassword')->name('user.post.changePassword');
    Route::resource('user', 'UserController');
});
Route::get('/', 'HomeController@index');
Route::get('/danh-sach-san-pham', 'ProductController@index')->name('product.list');
Route::get('/danh-muc', 'ProductController@categoryList')->name('category.list');
Route::get('/danh-sach-thuong-hieu', 'ProductController@brandList')->name('brand.list');
Route::get('/tin-tuc', 'BlogController@index')->name('post.list');
Route::get('/danh-sach-san-pham/{id}', 'ProductController@show')->name('product.detail');
Route::get('/tin-tuc/{id}', 'BlogController@show')->name('post.detail');
Route::get('/thuong-hieu/san-pham/{id}', 'ProductController@productByBrand')->name('product.brand');
Route::get('/lien-he', 'ProductController@contact')->name('contact.index');
Route::post('/lien-he', 'ProductController@saveContact')->name('contact.save');
Route::get('/search', 'ProductController@search')->name('product.search');
