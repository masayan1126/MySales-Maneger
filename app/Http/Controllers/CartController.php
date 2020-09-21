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
  public function addCart(Request $request){
    $cart = new Cart();
    $cart->product_name = $request->product_name;
    $cart->price = $request->price;
    $cart->purchase_number = $request->purchase_number;
    $cart->path = $request->path;
    $cart->user_id = Auth::id();
    $cart->save();
    $cart = Cart::get();
    // $view = view('cart');
    return redirect('home')->with('message_add_cart', 'カートに追加しました');
    // $view->cart = $cart;
    // return $view;
  }

  public function showCart(Request $request){
    $my_cart = Cart::where('user_id', '=' ,Auth::id())->get();
    $view = view('cart');
    $view->cart = $my_cart;
    return $view;
  }

  public function removeItem(Request $request){
    $delete_item = Cart::where('id', '=' , $request->check);
    $delete_item->delete();
    return redirect()->to('/cart-list');
  }

  public function orderConfirm(Request $request){
    $my_cart = Cart::where('user_id', '=' ,Auth::id())->get();
    if (count($my_cart) === 0) {
      return redirect('cart-list')->with('message_add_empty', 'カートに商品がありません');
    }
    $total_price = $my_cart->sum('price');
    $view = view('order');
    $view->order = $my_cart;
    $view->total_price = $total_price;
    return $view;
  }
}
