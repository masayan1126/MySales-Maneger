@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
  <product-component :products="{{ $all_products }}"></product-component>
@endsection
@section('script')
  <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection