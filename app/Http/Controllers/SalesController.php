<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;

class SalesController extends Controller
{
    public function form(){
      $view = view('sale');
      // $all_sales = DB::table('sales')->get();
      // $view->all_sales = $all_sales;
      return $view;
    }

    public function store(Request $request){
      // $view = view('sale');
      $sale = new Sale();
      // $sale->product_color = 'ネイビー';
      $sale->product_color = $request->color;
      $sale->sales_date = "{$request->year}/{$request->month}/{$request->day}";
      $sale->sales_amount = $request->amount;
      $sale->exhibition_time = $request->exhibitionTime;
      $sale->save();
      // $all_sales = DB::table('sales')->get();
      // $view->all_sales = $all_sales;
      // return $view;
    }

    public function index(){
      $view = view('index');
      $all_sales = DB::table('sales')->get();
      $view->all_sales = $all_sales;
      return $view;
    }

    public function top(){
      $view = view('top');
      return $view;
    }
}
