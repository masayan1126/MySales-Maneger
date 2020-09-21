@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
<div class="mt-4 w-100 card mx-auto max-width-500">
  <div class="card-header">
    <h4>商品の編集</h4>
  </div>
  <div class="card-body">
    <form action="/product-update" method="post" enctype="multipart/form-data" id="form">
    @csrf
    <div class="form-group">
      <input name="check[]" type="hidden" value="{{ $product_id }}">
      <imagepreview-component :now-file-path='{{ json_encode($now_preview_image_path) }}'></imagepreview-component>
      <label class="d-block p-1" for="imagefile">商品タイトル：</label>
      <input class="d-block p-1 form-control" type="text" id="imagefile" name="product_name" size="50" value="{{ $product_name }}"/>
      <input class="btn bg-mauve shadow-sm text-white mt-4" type="submit" name="confirm" id="button" value="確認" />
    </div>
    </form>
  </div>
</div>
@endsection
