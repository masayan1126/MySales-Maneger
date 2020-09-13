@include('layouts.menu')
@extends('common.template')
@section('title')
product_input
@endsection
@section('content')
  <div class="mt-4 w-100 card mx-auto max-width-500">
    <div class="card-header">
      <h4>商品の追加</h4>
    </div>
    <div class="card-body">
      <form action="/product-confirm" method="POST" enctype="multipart/form-data" id="form">
      @csrf
      <div class="form-group">
        <label class="d-block p-1" for="imagefile">商品画像：</label>
        <input class="d-block p-1 mb-2" type="file" name="imagefile" id="imagefile" value=""/>
        <label class="d-block p-1" for="imagefile">商品名：</label>
        <input class="d-block p-1 form-control" type="text" id="imagefile" name="product_name" size="50" value=""/>
        <label class="d-block p-1" for="price">価格：</label>
        <input class="d-block p-1 form-control" type="text" id="price" name="price" size="50" value=""/>
        <label class="d-block p-1" for="stock-quantity">在庫数：</label>
        <select name="stock_quantity" id="stock-quantity" class="form-control custom-select">
          <?php
            for($i = 0; $i<= 50; $i++):?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php endfor;?>
        </select>
        <input class="btn bg-lite-orange text-white mt-4" type="submit" name="confirm" id="button" value="確認" />
      </div>
      </form>
    </div>
  </div>
@endsection