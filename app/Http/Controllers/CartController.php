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
use Session;

class CartController extends Controller
{
    //
      public function addCart(Request $request){
        $cart = new Cart();
        $cart->product_name = $request->product_name;
        $cart->price = $request->price;
        $cart->purchase_number = $request->purchase_number;
        $cart->path = $request->path;
        $cart->user_id = Auth::id();
        $cart->save();
        $cart = Cart::get();
        $view = view('cart');
        $view->cart = $cart;
        return $view;
      }

      public function showCart(Request $request){
        $my_cart = Cart::where('user_id', '=' ,Auth::id())->get();
        $view = view('cart');
        $view->cart = $my_cart;
        // dd(count($my_cart));
        if (count($my_cart) === 0) {
          Session::put('message', 'カートは空です');
          return $view;
        } else {
          return $view;
        }
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

    // 作成予定(完了画面は全てview('complete')へ遷移させ、vueコンポーネントで動的に文言を表示させる)
    public function complete(Request $request){
      $view = view('complete');
      return $view;
    }
}
