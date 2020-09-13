@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
  <h3 class="ml-3">商品一覧</h3>
  <product-component :products="{{ $all_products }}"></product-component>
@endsection