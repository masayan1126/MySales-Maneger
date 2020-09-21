@include('layouts.menu')
@extends('common.template')
@section('cart')
order
@endsection
@section('content')
<input name="total_price" class="text-right float-right d-block" type="text" value="総計：{{ $total_price }}円">
<order-component :order="{{ $order }}"></order-component>
@endsection
@section('script')
<form class="text-right mr-3" action="{{ asset('pay') }}" method="POST">
@csrf  
  <input type="hidden" name="order" value="{{ $order }}">
  <input type="hidden" name="total_price" value="{{ $total_price }}">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ env('STRIPE_KEY') }}"
    data-amount="{{ $total_price }}"
    data-name="Stripe決済デモ"
    data-label="決済をする"
    data-description="これはデモ決済です"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-currency="JPY"
    data-shippingAddress="true"
    data-zip-code="true">
  </script>
</form>
@endsection