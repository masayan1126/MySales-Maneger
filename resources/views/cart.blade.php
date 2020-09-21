@include('layouts.menu')
@extends('common.template')
@section('cart')
product
@endsection
@section('content')
@if (Session::has('message_add_empty'))
<div class="alert alert-primary max-width-1400 mx-auto">{{ session('message_add_empty') }}</div>
@elseif(Session::has('message_order_complete'))
<div class="alert alert-primary max-width-1400 mx-auto">{{ session('message_order_complete') }}</div>
@endif
<cart-component :cart="{{ $cart }}"></cart-component>
@endsection