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
      $sale = new Sale();
      $sale->product_number = $request->productNumber;
      $sale->product_color = $request->productColor;
      $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      $sale->sales_amount = $request->salesAmount;
      $sale->exhibition_date = "{$request->exhibitionYear}/{$request->exhibitionMonth}/{$request->exhibitionDay}";
      $sale->exhibition_timezone = $request->exhibitionTimeZone;
      $sale->save();
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
