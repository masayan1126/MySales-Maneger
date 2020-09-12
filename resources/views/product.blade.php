@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
  <h2>Your Product</h2>
  <product-component :products="{{ $all_products }}"></product-component>
@endsection