<?php

use Illuminate\Support\Facades\Route;

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
//-----------Route phần frontend----------------------
Route::get('/', 'frontend\HomepageController@index')->name('frontend.homepage');
Route::get('shop', 'frontend\ShopController@index');
Route::get('cart', 'frontend\CartController@index');
Route::get('category/{id}', 'frontend\CategoryController@index')->where(['id' => '[0-9]{1,6}']);
Route::get('products/{id}', 'frontend\ProductController@index')->where(['id' => '[0-9]{1,6}']);
Route::match(['get','post'],'contact','frontend\ContactController@index')->name('frontend.contact');
//-----------Route phần Cart----------------------
Route::get('addCart/{id}', 'frontend\ProductController@addCart');
Route::get('cart/down/{id}', 'frontend\CartController@downCart')->where(['id' => '[0-9]{1,6}']);
Route::get('cart/up/{id}', 'frontend\CartController@upCart')->where(['id' => '[0-9]{1,6}']);
Route::get('cart/remove/{id}', 'frontend\CartController@delCart')->where(['id' => '[0-9]{1,6}']);
//---------------------------------------------------
//-----------Route phần Auth----------------------
Route::match(['get', 'post'], 'login', 'AuthController@Login')->name('Auth.login');
Route::get('logout', 'AuthController@Logout')->name('Auth.logout');
Route::get('signup', 'backend\UserController@signup');
Route::post('saveUser', 'backend\UserController@saveUser');
//-----------Nhóm Route Auth
Route::middleware(['auth'])->group(function () {
    Route::get('checkout', 'frontend\CheckoutController@index');
    Route::post('order','frontend\CheckoutController@order');
});
//------------Phân quyền động bằng database
Route::get('admin', 'backend\AdminController@index')->name('backend.admin')->middleware('can:backend.admin');
//Route cho phần Backend Products
Route::get('admin/products', 'backend\ProductController@index')->name('backend.list-product')->middleware('can:backend.list-product');
Route::get('admin/products/add', 'backend\ProductController@add')->name('backend.add-product')->middleware('can:backend.add-product');
Route::get('admin/products/{id}', 'backend\ProductController@detail')->name('backend.detail-product')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.detail-product');
Route::get('admin/products/remove/{id}', 'backend\ProductController@remove')->name('backend.remove-product')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.remove-product');
Route::post('admin/products/saveAdd', 'backend\ProductController@saveAdd')->name('backend.save-product')->middleware('can:backend.save-product');
Route::get('admin/products/edit/{id}', 'backend\ProductController@edit')->name('backend.edit-product')->middleware('can:backend.edit-product');
Route::post('admin/products/saveEdit', 'backend\ProductController@saveEdit')->name('backend.saveEdit-product')->middleware('can:backend.saveEdit-product');
//Route cho phần Backend Category
Route::get('admin/category', 'backend\CategoryController@index')->name('backend.list-category')->middleware('can:backend.list-category');
Route::get('admin/category/add', 'backend\CategoryController@add')->name('backend.add-category')->middleware('can:backend.add-category');
Route::post('admin/category/saveAdd', 'backend\CategoryController@saveAdd')->name('backend.save-category')->middleware('can:backend.save-category');
Route::get('admin/category/remove/{id}', 'backend\CategoryController@remove')->name('backend.remove-category')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.remove-category');
Route::get('admin/category/edit/{id}', 'backend\CategoryController@edit')->name('backend.edit-category')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.edit-category');
Route::post('admin/category/saveEdit', 'backend\CategoryController@saveEdit')->name('backend.saveEdit-category')->middleware('can:backend.saveEdit-category');
//Route cho phần Backend User
Route::get('admin/user', 'backend\UserController@index')->name('backend.list-user')->middleware('can:backend.list-user');
Route::get('admin/user/{id}', 'backend\UserController@detail')->name('backend.detail-user')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.detail-user');
Route::get('admin/user/edit/{id}', 'backend\UserController@edit')->name('backend.edit-user')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.edit-user');
Route::post('admin/user/saveEdit', 'backend\UserController@saveEdit')->name('backend.saveEdit-user')->middleware('can:backend.saveEdit-user');
Route::get('admin/user/remove/{id}', 'backend\UserController@remove')->name('backend.remove-user')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.remove-user');
//Route cho phần Backend Order
Route::get('admin/order', 'backend\OrderController@index')->name('backend.list-order')->middleware('can:backend.list-order');
Route::get('admin/order/{id}', 'backend\OrderController@detail')->name('backend.detail-order')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.detail-order');
Route::get('admin/order/done/{id}', 'backend\OrderController@done')->name('backend.edit-order')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.edit-order');
//Route cho phần Backend Comment
Route::get('admin/comment/product/{id}', 'backend\CommentController@index')->name('backend.list-comment')->where(['id' => '[0-9]{1,6}'])->middleware('can:backend.list-comment');
Route::get('admin/comment/product/{product}/remove/{id}', 'backend\CommentController@remove')->name('backend.remove-comment')->where(['id' => '[0-9]{1,6}','product'=>'[0-9]{1,6}'])->middleware('can:backend.remove-comment');
