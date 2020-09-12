<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;

class SalesController extends Controller
{
    public function index(){
      $view = view('index');
      $all_sales = DB::table('sales')->get();
      $all_product = DB::table('products')->get();
      $all_channel = DB::table('channels')->get();
      $view->all_sales = $all_sales;
      $view->all_channel = $all_channel;
      $view->products = $all_product;
      return $view;
    }

    public function inputSale(){
      $view = view('sale_input');
      $all_products = Product::get();
      $all_channel = Channel::get();
      $view->all_channel = $all_channel;
      // ->get();
      // $sale->product_number = $request->productNumber;
      // $sale->product_color = $request->productColor;
      // $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      // $sale->sales_amount = $request->salesAmount;
      // $sale->exhibition_timezone = $request->exhibitionTimeZone;
      $view->products = $all_products;
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

    public function allocateView(Request $request){
      $all_sales = Sale::get();
      $all_product = Product::get();
      $all_channel = Channel::get();
      if ($request->operation === 'add') {
        $view = view('sale_input');
        $view->all_channel = $all_channel;
        $view->products = $all_product;
      } else if($request->operation === 'update') {
        if (!$request->check) {
          return redirect('index')->with('alert', '最低1つのデータを選択してください');
        } else if(count($request->check) >= 2 ){
          return redirect('index')->with('alert', '1度に編集できるのは1つのデータだけです');
        } else {
          $view = view('sale_edit');
          $target_sale = Sale::where('id', '=' , $request->check)->first();
          $view->product_number = $target_sale->product_number;
          $view->product_id = $target_sale->id;
          // $view->sales_date = $target_sale->sales_date;
          $date_string = $target_sale->sales_date;
          list($yyyy, $mm, $dd) = explode('/', $date_string);
          $view->sales_year = $yyyy;
          $view->sales_month = $mm;
          $view->sales_day = $dd;
          $view->sales_amount = $target_sale->sales_amount;
          $target_channel = $target_sale->sales_channel;
          $else_channel = Channel::where('sales_channel', '!=' , $target_channel)->get();
          $view->target_channel = $target_channel;
          $view->else_channels = $else_channel;
          // 以降はsale_edit.blade.php -> form送信 -> updateSale -> complete.blade.php
        }
      } else if ($request->operation === 'delete') {
        if (!$request->check) {
          return redirect('index')->with('alert', '最低1つのデータを選択してください');
        } else {
          $view = view('complete');
          for ($i = 0; $i < count($request->check); $i++) {
            $delete_sales = Sale::where('id', '=' , $request->check[$i])
            ->delete();
          }
        }
      }
      return $view;
    }

    public function updateSale(Request $request){
      $target_sale = Sale::where('id', '=' , $request->check)->first();
      $target_sale->product_number = $request->productNumber;
      $target_sale->sales_channel = $request->salesChannel;
      $target_sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      $target_sale->sales_amount = $request->salesAmount;
      $target_sale->save();
      $view = view('complete');
      return $view;
    }

    public function filterSale(Request $request){
      $view = view('result');
      // $sale = new Sale();
      $filtered_data = DB::table('sales')
      ->where('product_number', '=' , "{$request->productNumber}")
      ->where('sales_channel', '=' , "{$request->salesChannel}")
      ->get();
      $view->all_sales = $filtered_data;
      $all_sales = DB::table('sales')->get();
      $all_product = DB::table('products')->get();
      $all_channel = DB::table('channels')->get();
      $view->all_channel = $all_channel;
      $view->products = $all_product;
      return $view;
    }
}
