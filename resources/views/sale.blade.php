<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
@include('parts.menu')
<div class="container-fluid pt-4">
<h2>売上データの入力</h2>
  <form action="/add" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="product-number-Selection">商品カラー</label>
    <select name="productNumber" class="form-control" id="product-number-Selection">
      <option>【C001】</option>
      <option>【C002】</option>
      <option>【C003】</option>
      <option>【C004】</option>
      <option>【C005】</option>
      <option>【C006】</option>
    </select>
  </div>
  <div class="form-group">
    <label for="product-color-selection">商品カラー</label>
    <select name="productColor" class="form-control" id="product-color-selection">
      <option>ブラック</option>
      <option>ホワイト</option>
      <option>ネイビー</option>
      <option>レッド</option>
      <option>グリーン</option>
      <option>グリーン</option>
      <option>グリーン</option>
      <option>グリーン</option>
    </select>
  </div>
  <div class="form-group">
  <label for="exhibition-year-selection">出品日</label>
  <div class="row">
  <div class="col-3">
  <select name="exhibitionYear" id="exhibition-year-selection" class="form-control">
  
<?php
$now = date("Y");
for($i = 1950; $i<= $now; $i++):?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>
年
</div>
<div class="col-3">
<select name="exhibitionMonth" class="form-control">
<?php
for($i = 1; $i<=12; $i++):?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>
月
</div>
<div class="col-3">
<select name="exhibitionDay" class="form-control">
<?php 
for($i = 1; $i<=31; $i++):?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>日
        </div>
        </div> 
        </div>
  <div class="form-group col-4 p-0">
    <label for="exhibition-timezone">出品時間区分</label>
    <select name="exhibitionTimeZone" class="form-control" id="exhibition-timezone">
      <option>朝(6:00〜10:00)</option>
      <option>昼(10:00〜14:00)</option>
      <option>夕方(14:00〜17:00)</option>
      <option>夜(17:00〜21:00)</option>
    </select>
  </div>
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

    <button type="submit" class="btn btn-primary" name="add">追加</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>