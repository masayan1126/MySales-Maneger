@include('layouts.menu')
@extends('common.template')
@section('cart')
product
@endsection
@section('content')
@if (Session::has('message'))
<div class="alert alert-primary">{{ session('message') }}</div>
@endif
<cart-component :cart="{{ $cart }}"></cart-component>
@endsection