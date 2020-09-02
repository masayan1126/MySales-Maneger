@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
  <h2 class="">Your Product</h2>
@if ($product === null)
   管理画面からあなたの商品を登録しましょう
@else
  <product-component :product="{{ $product }}"></product-component>
@endif
@endsection