@include('layouts.menu')
@extends('common.template')
@section('title')
anaylytics
@endsection
@section('content')
<form action="/drawChart" method="GET" enctype="multipart/form-data" id="form">
      @csrf
            <div class="form-group max-width-600 mx-auto">
              <label for="sales-year-selection">売上月</label>
              <div class="row">
                <div class="col-4">
                  <select name="salesYear" id="sales-year-selection" class="form-control custom-select">
                    <!-- <option selected disabled value="未指定">未指定</option> -->
                    <option value="{{ $salesYear }}">{{ $salesYear }}</option>
                    <?php
                      for($i = $membership_year; $i<= $membership_year+100; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  </select>年
                </div>
                <div class="col-4">
                  <select name="salesMonth" class="form-control custom-select">
                  <option value="{{ $salesMonth }}">{{ $salesMonth }}</option>
                    <?php
                      for($i = $default_count; $i<=12; $i++):?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php endfor;?>
                  <option value="{{ $unspecified }}">{{ $unspecified }}</option> 
                  </select>月
                </div>
                <div class="col-4">
                  <input class="btn bg-mauve shadow-sm text-white" type="submit" name="confirm" id="button" value="表示する" />
                </div> 
              </div> 
            </div>
            </form>
<analytics-component :sales="{{ $target_sales }}"></analytics-component>
@endsection
@section('script')
<script>
</script>
@endsection