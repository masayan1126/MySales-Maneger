@include('layouts.menu')
@extends('common.template')
@section('title')
anaylytics
@endsection
@section('content')
<form action="analytics" method="GET" enctype="multipart/form-data" id="form">
      @csrf
            <div class="form-group">
              <label for="sales-year-selection">売上月</label>
              <div class="row">
                <div class="col-4">
                  <select name="salesYear" id="sales-year-selection" class="form-control custom-select">
                    <?php
                      for($i = 2020; $i<= 2100; $i++):?>
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
              </div> 
              <input class="btn bg-lite-orange text-white mt-4" type="submit" name="confirm" id="button" value="表示" />
            </div>
            </form>
<analytics-component :sales="{{ $target_sales }}"></analytics-component>
@endsection
@section('script')
<script>

</script>
@endsection