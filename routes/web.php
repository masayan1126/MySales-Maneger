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

Route::get('/','SalesController@top');
Route::get('/index', 'SalesController@index');
Route::get('/form', 'SalesController@form');
Route::get('/complete', 'SalesController@complete');
Route::post('/result', 'SalesController@filter');
Route::post('/add', 'SalesController@store');
Route::get('/top','SalesController@top');