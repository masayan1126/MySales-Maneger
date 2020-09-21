<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;
use App\User;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Session;


class Ordercontroller extends Controller
{
    //
    public function showOrder(Request $request){
      $received_order = Order::all();
      $view = view('received_order');
      // dd($received_order);
      $view->received_order = $received_order;

      return $view;
    }

    public function shipping(Request $request){
      $target_order = Order::where('order_number', '=' , $request->check)->first();
      if ($target_order->shipping === 0) {
        $target_order->shipping = 1;
      } else if ($target_order->shipping === 1) {
        $target_order->shipping = 0;
      }
      $target_order->save();
      
      // return redirect('order-list')->with('alert', '最低1つのデータを選択してください');
      return redirect('order-list');
      // $view = view('received_order');
      // dd($received_order);
      // $view->received_order = $received_order;

      // return $view;
    }
}
