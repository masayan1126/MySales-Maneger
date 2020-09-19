<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

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
      return redirect('cart-list')->with('message', '購入処理が完了しました');
    }
}
