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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>