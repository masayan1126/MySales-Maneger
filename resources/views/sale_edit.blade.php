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
      <form action="/sales-update" method="post" enctype="multipart/form-data" id="form">
      @csrf
      <div class="form-group">
        <input name="check[]" type="hidden" value="{{ $product_id }}">
        <label class="d-block p-1" for="imagefile">商品名：</label>
        <input class="d-block p-1 form-control" type="text" id="imagefile" name="productNumber" size="50" value="{{ $product_number }}"/>
        <label class="d-block p-1" for="salesChannel">販路：</label>
        <select name="salesChannel" class="form-control col-4 custom-select" id="sales-channel">
          <option value="{{$target_channel}}" selected class="sales-channel-selection">{{$target_channel}}</option>
          @foreach($else_channels as $else_channel)
          <option value="{{$else_channel->sales_channel}}" class="sales-channel-selection">{{$else_channel->sales_channel}}</option>
          @endforeach
        </select>
        <div class="form-group">
              <label for="sales-year-selection">売上日</label>
              <div class="row">
                <div class="col-4">
                  <select name="salesYear" id="sales-year-selection" class="form-control custom-select">
                  <option value="{{$sales_year}}" selected>{{$sales_year}}</option>
                    <?php
                      for($i = $membership_year; $i<= $membership_year+100; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>年
                </div>
                <div class="col-4">
                  <select name="salesMonth" class="form-control custom-select">
                  <option value="{{$sales_month}}" selected>{{$sales_month}}</option>
                    <?php
                      for($i = 1; $i<=12; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>月
                </div>
                <div class="col-4">
                  <select name="salesDay" class="form-control custom-select">
                  <option value="{{$sales_day}}" selected>{{$sales_day}}</option>
                    <?php 
                    for($i = 1; $i<=31; $i++):?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>日
                </div>
              </div> 
            </div>
        <label class="d-block p-1" for="imagefile">売上：</label>
        <input class="d-block p-1 form-control" type="text"  name="salesAmount" size="50" value="{{$sales_amount}}"/>
        <input class="btn bg-mauve shadow-sm text-white mt-4" type="submit" name="confirm" id="button" value="確認" />
      </div>
      </form>
    </div>
  </div>
@endsection
