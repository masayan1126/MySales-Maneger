@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
@if (Session::has('message_add_cart'))
<div class="alert alert-primary max-width-1400 mx-auto">{{ session('message_add_cart') }}</div>
@endif
<product-component :products="{{ $all_products }}"></product-component>
@endsection