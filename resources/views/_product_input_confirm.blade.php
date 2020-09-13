@include('layouts.menu')
@extends('common.template')
@section('title')
product_input_confirm
@endsection
@section('content')
<div class="jumbotron mt-4 w-100 card mx-auto max-width-500 pt-3">
  <h2 class="mb-3 mt-3 border-bottom">確認画面</h2>
  <form action="/complete" method="POST">
    @csrf
    <h4 class="">商品画像</h4>
    <img src="{{ $path }}" width="200" height="200"></td>
    <h4 class="mt-3">商品名：{{ $data['product_name'] }}</h4>
    <label class="d-block p-1" for="price">価格：</label>
    <input class="d-block p-1 form-control" type="text" id="price" name="price" size="50" value=""/>
    <label class="d-block p-1" for="stock-quantity">在庫数：</label>
    <select name="stock_quantity" id="stock-quantity" class="form-control custom-select">
      <?php
        for($i = 0; $i<= 50; $i++):?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php endfor;?>
    </select>
    <input type="submit" class="btn bg-mauve shadow-sm text-white mt-4" name="action" value="完了" />
  </form>
</div>
@endsection