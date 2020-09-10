<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;

class SalesController extends Controller
{
    public function inputSale(){
      $view = view('sale');
      $all_products = DB::table('products')->get();
      $all_channel = DB::table('channels')->get();
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

    public function addChannel(Request $request){
      $channel = new Channel();
      $channel->sales_channel = $request->channel;
      $channel->save();
      $all_product = DB::table('products')->get();
      $view = view('maintenance');
      $all_channel = DB::table('channels')->get();
      $view->all_channel = $all_channel;
      $view->all_products = $all_product;
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

    // public function editSale(Request $request){
    //   $view = view('sale_update');
    //   $all_sales = Sale::where('id', '=' , $request->check)->first();
    //   // dd($all_sales);
    //   $view->product_numbers = $all_sales->product_number;
    //   $view->product_id = $all_sales->id;
    //   $view->sales_date = $all_sales->sales_date;
    //   $string = $all_sales->sales_date;
    //   // $pattern= '/\d{3}-\d{4}/';
    //   list($yyyy, $mm, $dd) = explode('/', $string);
    //   $view->sales_year = $yyyy;
    //   $view->sales_month = $mm;
    //   $view->sales_day = $dd;
    
    //   $view->sales_amount = $all_sales->sales_amount;
    //   $target_channel = $all_sales->sales_channel;
    //   $else_channel = Channel::where('sales_channel', '!=' , $target_channel)->get();
    //   $view->target_channel = $target_channel;
    //   $view->else_channels = $else_channel;
    //   // $view->product_number = $target_sales->product_number;
    //   return $view;
    // }

    public function updateSale(Request $request){
      // $target_sales = Sale::where('id', '=' , $request->check)->first();
      $sale = Sale::where('id', '=' , $request->check)->first();
      // dd($request->productNumber);
      $sale->product_number = $request->productNumber;
      $sale->sales_channel = $request->salesChannel;
      $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      $sale->sales_amount = $request->salesAmount;
      // dd($request->salesAmount);
      $sale->save();
      $view = view('complete');
      return $view;
    }

    // public function deleteSale(Request $request){

    // }

    public function _updateSale(Request $request){
      $sale = new Sale();
      $sale->product_number = $request->productNumber;
      $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      $sale->sales_amount = $request->salesAmount;
      $sale->sales_channel = $request->salesChannel;
      $sale->save();
      
      return $view;
    }

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

    public function allocateView(Request $request){
      $all_sales = DB::table('sales')->get();
      $all_product = DB::table('products')->get();
      $all_channel = DB::table('channels')->get();
      if ($request->operation === 'add') {
        $view = view('sale');
        $view->all_channel = $all_channel;
        $view->products = $all_product;
        $view->all_channel = $all_channel;
      } else if($request->operation === 'update') {
        if (count($request->check) !== 1 ) {
          $view = view('failure');
        } else {
          $view = view('sale_update');
          $all_sales = Sale::where('id', '=' , $request->check)->first();
          // dd($all_sales);
          $view->product_numbers = $all_sales->product_number;
          $view->product_id = $all_sales->id;
          $view->sales_date = $all_sales->sales_date;
          $string = $all_sales->sales_date;
          // $pattern= '/\d{3}-\d{4}/';
          list($yyyy, $mm, $dd) = explode('/', $string);
          $view->sales_year = $yyyy;
          $view->sales_month = $mm;
          $view->sales_day = $dd;
          $view->sales_amount = $all_sales->sales_amount;
          $target_channel = $all_sales->sales_channel;
          $else_channel = Channel::where('sales_channel', '!=' , $target_channel)->get();
          $view->target_channel = $target_channel;
          $view->else_channels = $else_channel;
        }
      } else if ($request->operation === 'delete') {
        if (!$request->check) {
          $view = view('failure');
        } else {
          // dd($request->check);
          $view = view('complete');
          for ($i = 0; $i < count($request->check); $i++) {
            $delete_sales = Sale::where('id', '=' , $request->check[$i])
            ->delete();
          }
          // dd($delete_sales);
          // ->delete();
        }
      }
      return $view;
    }

    public function showProduct(){
      $view = view('product');
      $all_product = DB::table('products')->get();
      $view->product = $all_product;
      return $view;
    }
    
    public function drawChart(Request $request){
      $view = view('analytics');
      $sale_year = $request->salesYear;
      $sale_month = $request->salesMonth;
      $all_sales = DB::table('sales')
      // ->where('id', '=' , 6)
      ->get();
      $view->all_sales = $all_sales;
      if ($sale_month === '未指定') {
        $target_sales = Sale::whereYear('created_at', $sale_year)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($row) {
          return $row->created_at->format('m');
        })
        ->map(function ($day) {
          return $day->sum('sales_amount');
        });
        $view->target_sales = $target_sales;
        // dd($target_sales);
        $view->salesYear = $request->salesYear;
        $view->salesMonth = $request->salesMonth;
        return $view;
      } else {
        // 日付単位の集計
        // dd($sale_year);
        $target_sales =
        Sale::whereYear('sales_date', '=' ,$sale_year)
        ->whereMonth('sales_date', '=', $sale_month)
        ->get();
        $view->target_sales = $target_sales;
        $view->salesYear = $request->salesYear;
        $view->salesMonth = $request->salesMonth;
        // 月ごとの集計
        return $view;
      }
    }

    public function filter(Request $request){
      $view = view('result');
      // $sale = new Sale();
      $filtered_data = DB::table('sales')
      ->where('product_number', '=' , "{$request->productNumber}")
      ->where('sales_channel', '=' , "{$request->salesChannel}")
      ->get();
      // ->get();
      // $sale->product_number = $request->productNumber;
      // $sale->product_color = $request->productColor;
      // $sale->sales_date = "{$request->salesYear}/{$request->salesMonth}/{$request->salesDay}";
      // $sale->sales_amount = $request->salesAmount;
      // $sale->exhibition_timezone = $request->exhibitionTimeZone;
      $view->all_sales = $filtered_data;
      $all_sales = DB::table('sales')->get();
      $all_product = DB::table('products')->get();
      $all_channel = DB::table('channels')->get();
      $view->all_channel = $all_channel;
      $view->products = $all_product;
      return $view;
    }

    public function entrance(){
      $view = view('home');
      return $view;
    }

    public function complete(){
      $view = view('complete');
      return $view;
    }

}
