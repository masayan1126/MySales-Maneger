<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class PaymentController extends Controller
{
  public function pay(Request $request){
    // dd($request->stripeToken);
    // dd($request->total_price);
    Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
      $charge = Charge::create(array(
        'amount' => $request->total_price,
        'currency' => 'jpy',
        'source'=> $request->stripeToken,
      //  'source'=> $request->stripeToken,
      ));

    // 注文完了後、カートを空にして、注文内容を注文一覧画面に表示する
      $active_order = Cart::where('user_id', '=' ,Auth::id())
      ->get();
      dd($active_order);
      return redirect('cart-list')->with('message', '購入処理が完了しました');
    }
}
