@include('layouts.menu')

@extends('common.template')
@section('title')
product
@endsection

@section('content')
<div class="jumbotron mt-4 w-100 card mx-auto max-width-500 pt-3">
  <h2 class="mb-3 mt-3 border-bottom">登録完了</h2>
  <a href="{{ url('/product') }}" class="btn bg-lite-orange text-white mt-4">続けて登録する</a>
  <a href="{{ url('/image_input') }}" class="btn bg-lite-green text-white mt-4">商品一覧画面に戻る</a>
</div>
@endsection