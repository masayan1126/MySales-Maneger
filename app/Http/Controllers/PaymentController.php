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
  public function pay(Request $request){
    // 返り値 = トークン
    // dd($request->stripeToken);
    // 返り値 = card(決済手段?)
    // dd($request->stripeTokenType);
    // 返り値 = メールアドレス
    // dd($request->stripeEmail);
    // 購入者氏名
    // dd($request->stripeBillingName);
    // 住所(市丁番号)
    // dd($request->stripeBillingAddressLine1);
    // 住所(市丁番号)
    // dd($request->stripeShippingAddressLine1);
    // 郵便番号(XXX-XXXX)
    // dd($request->stripeBillingAddressZip);
    // dd($request->stripeShippingAddressZip);
    // ローマ字の都道府県(Oosakafu)
    // dd($request->stripeBillingAddressState);
    // dd($request->stripeShippingAddressState);
    // 漢字の都道府県(大阪府)
    // dd($request->stripeBillingAddressCity);
    // dd($request->stripeShippingAddressCity);
    // ローマ字の国名
    // dd($request->stripeBillingAddressCountry);
    // dd($request->stripeShippingAddressCountry);
    // アルファベットの国の略名(JP)
    // dd($request->stripeBillingAddressCountryCode);
    // dd($request->stripeShippingAddressCountryCode);
    // 購入者氏名
    // dd($request->stripeShippingName);
  
    Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
      $charge = Charge::create(array(
        'amount' => $request->total_price,
        'currency' => 'jpy',
        'source'=> $request->stripeToken,
      //  'source'=> $request->stripeToken,
      ));
    // 注文完了後、オーダーテーブルに保存。カートを空にする
      
      $my_cart = Cart::where('user_id', '=' ,Auth::id())->get();
      // dd($my_cart[1]->product_name);
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

      return redirect('cart-list')->with('message', '購入処理が完了しました');
    }
}
