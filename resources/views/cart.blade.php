@include('layouts.menu')
@extends('common.template')
@section('cart')
product
@endsection
@section('content')
@if (Session::has('message_cart'))
<div class="alert alert-primary max-width-1400 mx-auto">{{ session('message_cart') }}</div>
@endif
<cart-component :cart="{{ $cart }}"></cart-component>
@endsection