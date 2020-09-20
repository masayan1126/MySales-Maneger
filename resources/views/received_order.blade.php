@include('layouts.menu')
@extends('common.template')
@section('order')
order
@endsection
@section('content')
  <receivedorder-component :order="{{ $received_order }}"></receivedorder-component>
@endsection