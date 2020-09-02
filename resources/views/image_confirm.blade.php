@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
<div class="jumbotron mt-4 w-100 card mx-auto max-width-500 pt-3">
  <h2 class="mb-3 mt-3 border-bottom">確認画面</h2>
  <form action="image_complete" method="post">
    @csrf
    <h4 class="">商品画像</h4>
    <img src="{{ $data['read_temp_path'] }}" width="200" height="200"></td>
    <h4 class="mt-3">商品名：{{ $data['product_name'] }}</h4>
    <input type="submit" class="btn bg-lite-orange text-white mt-4" name="action" value="完了" />
  </form>
</div>
@endsection