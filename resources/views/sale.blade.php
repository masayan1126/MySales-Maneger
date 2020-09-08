@include('layouts.menu')
@extends('common.template')
@section('title')
sale
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-10 col-lg-6 col-xl-6">
    <div class="card">
      <div class="card-header"><h5>売上入力</h5></div>
        <div class="card-body">
          <form class="" action="/add" method="POST" class="form-horizontal custom-select">
            {{ csrf_field() }}
            @include('parts.select', ['$products' => '$products'])
            <div class="form-group">
              <label for="sales-year-selection">売上日</label>
              <div class="row">
                <div class="col-4">
                  <select name="salesYear" id="sales-year-selection" class="form-control custom-select">
                    <?php
                      $now = date("Y");
                      for($i = 1950; $i<= $now; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>年
                </div>
                <div class="col-4">
                  <select name="salesMonth" class="form-control custom-select">
                    <?php
                      for($i = 1; $i<=12; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>月
                </div>
                <div class="col-4">
                  <select name="salesDay" class="form-control custom-select">
                    <?php 
                    for($i = 1; $i<=31; $i++):?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>日
                </div>
              </div> 
            </div>
            <div class="form-group">
              <label for="sales-amount">売上利益</label>
              <div class="row">
                <div class="col-6">
                  <input type="text" class="form-control" id="sales-amount" name="salesAmount">
                </div>
                <div class="col-6">
                  <p>円</p>
                </div>
              </div>
            </div>
            <button type="submit" class="btn bg-lite-orange text-white" name="add">追加する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection