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

Route::get('/','SalesController@entrance');
Route::get('/index', 'SalesController@index');
Route::get('/product', 'SalesController@showProduct');
Route::get('/sale', 'SalesController@inputSale');
Route::get('/card', 'SalesController@card');
Route::get('/complete', 'SalesController@complete');
Route::get('/failure', 'SalesController@complete');
Route::post('/result', 'SalesController@filter');
Route::post('/add', 'SalesController@store');
Route::post('/delete', 'SalesController@delete');
Route::get('/top','SalesController@top');
Route::get('/maintenance','ImageController@getProductList');
Route::get('/analytics','SalesController@firstdrawChart');
Route::get('/drawChart','SalesController@drawChart');
Route::get('/image_input', 'ImageController@getImageInput');
Route::post('/image_confirm', 'ImageController@postImageConfirm');
Route::post('/add-channel', 'SalesController@addChannel');
Route::post('/update-product', 'SalesController@updateProduct');
// Route::post('/sale-edit', 'SalesController@editSale');
Route::post('/sale-update', 'SalesController@updateSale');
Route::post('/allocate', 'SalesController@allocateView');
Route::post('/channel', function(){
  return view('channel');
});
Route::post('/image_complete', 'ImageController@postImageComplete');
Auth::routes();
Route::get('/home', 'SalesController@showProduct');
Route::resource('/search', 'SearchController', ['only' => ['index']]);