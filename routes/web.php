<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// コントローラー
// ProductController(商品関連)
// SalesController(売上関連)
// MainController(認証関連、その他)
// ImageController(画像アップロード関連)

// Route::get('/failure', 'SalesController@complete');
// Route::get('/product', 'SalesController@showProduct');
// Route::get('/card', 'SalesController@card');
// Route::get('/top','SalesController@top');
// Route::post('/delete', 'SalesController@delete');
// Route::post('/product-complete', 'ProductController@postImageComplete');

Route::get('/','MainController@entrance');
Route::post('/channel', function(){
  return view('channel');
});

Route::post('/allocate-maintenance-channel', 'MainController@allocateMaintenanceChannel');
Route::post('/channel-add', 'MainController@store');
Route::get('/channel-input', 'MainController@inputChannel');
Route::post('/channel-update', 'MainController@updateChannel');
Route::post('/complete', 'MainController@complete');

Route::get('/sales-list', 'SalesController@index');
Route::get('/sales-input', 'SalesController@inputSale');
Route::post('/sales-add', 'SalesController@store');
Route::post('/sales-update', 'SalesController@updateSale');
Route::post('/allocate', 'SalesController@allocateView');
Route::post('/sales-result', 'SalesController@filterSale');

Route::get('/analytics','ChartController@firstdrawChart');
Route::get('/drawChart','ChartController@drawChart');

Route::get('/home', 'ProductController@showProduct');
Route::get('/maintenance','ProductController@showProductList');
Route::post('/allocateMaintenanceProductView', 'ProductController@allocateMaintenanceProductView');
Route::get('/product-input', 'ProductController@inputProduct');
Route::post('/product-confirm', 'ProductController@inputProductConfirm');
Route::post('/product-update', 'ProductController@updateProduct');
Auth::routes();
Route::resource('/search', 'SearchController', ['only' => ['index']]);