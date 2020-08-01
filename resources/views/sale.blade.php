<body>
@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4">
  <form action="/add" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  @include('parts.select')
  <div class="form-group">
  <label for="sales-year-selection">売上日</label>
  <div class="row">
  <div class="col-3">
  <select name="salesYear" id="sales-year-selection" class="form-control">
  
<?php
$now = date("Y");
for($i = 1950; $i<= $now; $i++):?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>
年
</div>
<div class="col-3">
<select name="salesMonth" class="form-control">
<?php
for($i = 1; $i<=12; $i++):?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>
月
</div>
<div class="col-3">
<select name="salesDay" class="form-control">
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

    <button type="submit" class="btn btn-warning" name="add">追加</button>
  </form>
</body>
@endsection