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
      $sale->exhibition_timezone = $request->exhibitionTimeZone;
      $sale->save();
      $view = view('complete');
      return $view;
    }

    public function index(){
      $view = view('index');
      $all_sales = DB::table('sales')->get();
      $view->all_sales = $all_sales;
      return $view;
    }
    
    public function drawChart(){
      $view = view('analytics');
      $all_sales = DB::table('sales')->first();
      $view->sales_amount = $all_sales->sales_amount;
      return redirect()->route('analytics')
      ->with('sales_amount', $sales_amount);
      // return $view;
    }

    public function filter(Request $request){
      $view = view('result');
      // $sale = new Sale();
      $all_sales = DB::table('sales')->where('product_color', '=' , "{$request->productColor}")
      ->get();
      // ->get();
      // $sale->product_number = $request->productNumber;
      // $sale->product_color = $request->productColor;
      // $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      // $sale->sales_amount = $request->salesAmount;
      // $sale->exhibition_timezone = $request->exhibitionTimeZone;
      $view->all_sales = $all_sales;
      return $view;
    }

    public function top(){
      $view = view('top');
      return $view;
    }
}
