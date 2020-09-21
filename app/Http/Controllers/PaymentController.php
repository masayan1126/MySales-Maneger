<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Order;

class PaymentController extends Controller
{
  public function pay(Request $request) {  
    Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
    $charge = Charge::create(array(
      'amount' => $request->total_price,
      'currency' => 'jpy',
      'source'=> $request->stripeToken,
    ));
    // 注文完了後、オーダーテーブルに保存。カートを空にする
    $my_cart = Cart::where('user_id', '=' ,Auth::id())->get();
    for ($i = 0; $i < count($my_cart); $i++) {
      $order = new Order();
      $order->product_name = $my_cart[$i]->product_name;
      $order->price = $my_cart[$i]->price;
      $order->purchase_number = $my_cart[$i]->purchase_number;
      $order->path = $my_cart[$i]->path;
      $order->user_id = Auth::id();
      $order->mail_address = $request->stripeEmail;
      $order->orderer = $request->stripeBillingName;
      $order->postal_code = $request->stripeBillingAddressZip;
      $order->address_line1 = $request->stripeBillingAddressCity;
      $order->address_line2 = $request->stripeBillingAddressLine1;
      $order->save();
    }
    for ($i = 0; $i < count($my_cart); $i++) {
      $my_cart[$i]->delete();
    }
    return redirect('cart-list')->with('message_order_complete', '購入処理が完了しました');
  }
}
