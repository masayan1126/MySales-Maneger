<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;
use App\User;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
      public function inputChannel(Request $request){
        $all_products = Product::get();
        $all_channel = Channel::get();
        $view = view('maintenance');
        $view->all_channel = $all_channel;
        $view->all_products = $all_product;
        return $view;
      }

      public function addCart(Request $request){
        $cart = new Cart();
        $cart->product_name = $request->product_name;
        $cart->price = $request->price;
        $cart->purchase_number = $request->purchase_number;
        $cart->path = $request->path;
        $cart->save();
        $cart = Cart::get();
        $view = view('cart');
        $view->cart = $cart;
        return $view;
      }

      public function showCart(Request $request){
        $cart = Cart::get();
        $view = view('cart');
        $view->cart = $cart;
        return $view;
      }

      public function removeItem(Request $request){
        // $delete_item = Cart::find($id);
        // dd($request->check);
        $delete_item = Cart::where('id', '=' , $request->check);
        $delete_item->delete();
        // $cart = Cart::get();
        // $view->cart = $cart;
        return redirect()->to('/cart-list');
      }

      public function orderConfirm(Request $request){
        // $delete_item = Cart::find($id);
        // dd($request->check);
        // $delete_item = Cart::where('id', '=' , $request->check);
        // $delete_item->delete();
        $cart = Cart::get();
        // dd(SUM(Cart::get(array('price'))));
        $total_price = $cart->sum('price');
        // return redirect()->to('/complete');
        $view = view('order');
        $view->order = $cart;
        $view->total_price = $total_price;
        // dd($tortal_price);
        return $view;
      }

      public function orderComplete(Request $request){
        // $delete_item = Cart::find($id);
        // dd($request->check);
        $delete_item = Cart::where('id', '=' , $request->check);
        $delete_item->delete();
        // $cart = Cart::get();
        // $view->cart = $cart;
        $view = view('complete');
        return $view;
        // return redirect()->to('/complete');
      }

      

    public function allocateMaintenanceChannel(Request $request){
      $all_sales = Sale::get();
      $all_product = Product::get();
      $all_channel = Channel::get();
      if ($request->operation === 'add') {
        $view = view('channel_input');
      } else if($request->operation === 'update') {
        if (!$request->check) {
          return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
        } else if(count($request->check) >= 2 ){
          return redirect('maintenance')->with('alert', '1度に編集できるのは1つのデータだけです');
        } else {
          // dd($request->check);
          $view = view('channel_edit');
          $target_channel = Channel::where('id', '=' , $request->check)->first();
          $view->sales_channel = $target_channel->sales_channel;
          $view->channel_url = $target_channel->channel_url;
          $view->id = $target_channel->id;
          // 以降はchannel_edit.blade.php -> form送信 -> updateChannel -> complete.blade.php
        }
      } else if ($request->operation === 'delete') {
        if (!$request->check) {
          return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
        } else {
          $view = view('complete');
          for ($i = 0; $i < count($request->check); $i++) {
            $delete_sales = Channel::where('id', '=' , $request->check[$i])
            ->delete();
          }
        }
      }
      return $view;
    }

    public function updateChannel(Request $request){
      $target_channel = Channel::where('id', '=' , $request->check)->first();
      $target_channel->sales_channel = $request->salesChannel;
      $target_channel->channel_url = $request->channel_url;
      $target_channel->save();
      $view = view('complete');
      return $view;
    }

    // 作成予定(完了画面は全てview('complete')へ遷移させ、vueコンポーネントで動的に文言を表示させる)
    public function complete(Request $request){
      $view = view('complete');
      return $view;
    }
}
