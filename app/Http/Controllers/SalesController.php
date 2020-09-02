<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;

class SalesController extends Controller
{
    public function form(){
      $view = view('sale');
      return $view;
    }

    public function store(Request $request){
      $sale = new Sale();
      $sale->product_number = $request->productNumber;
      $sale->product_color = $request->productColor;
      $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      $sale->sales_amount = $request->salesAmount;
      $sale->sales_channel = $request->salesChannel;
      $sale->save();
      $view = view('complete');
      return $view;
    }

    public function delete(Request $request){
      $all_sales = Sale::where('id', '=' , $request->check)
      ->delete();
      $view = view('index');
      $all_sales = DB::table('sales')->get();
      $view->all_sales = $all_sales;
      return $view;
    }

    public function index(){
      $view = view('index');
      $all_sales = DB::table('sales')->get();
      $view->all_sales = $all_sales;
      return $view;
    }

    public function showProduct(){
      $view = view('product');
      $all_product = DB::table('products')->get();
      $view->product = $all_product;
      return $view;
    }
    
    public function drawChart(){
      $view = view('analytics');
      $all_sales = DB::table('sales')
      // ->where('id', '=' , 6)
      ->get();
      $view->all_sales = $all_sales;
      // return redirect(route('analytics',[
      //   'sales_amount' => $sales_amount,
      // ]))
      return $view;
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

    public function entrance(){
      $view = view('home');
      return $view;
    }

    public function card(){
      $view = view('card');
      return $view;
    }

    public function maintenance(){
      $view = view('Maintenance');
      return $view;
    }

}
