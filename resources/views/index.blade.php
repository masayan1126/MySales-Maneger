<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salse</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/result" method="POST" class="form-horizontal">
          <div class="modal-body">
            {{ csrf_field() }}
            @include('parts.select')
            <div class="modal-footer">
            <!-- data-dismiss="modal" -->
              <button type="submit" class="btn btn-primary " name="filter">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @extends('layouts.app')
  <div class="container-fluid pt-4">
  <form action="/delete" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  <div class="table-responsive-md">
    <table class="table table-sm">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-nowrap">チェック</th>
          <th scope="col" class="text-nowrap">#</th>
          <th scope="col" class="text-nowrap">商品番号
          <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
          </th>
      <th scope="col" class="text-nowrap">カラー
      <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
      </th>
      <th scope="col" class="text-nowrap">出品時間区分
      <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
      </th>
      <th scope="col" class="text-nowrap">売上日
      </th>
      <th scope="col" class="text-nowrap">利益
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($all_sales as $sales)
    <tr>
      <td scope="row"><input name="check[]" type="checkbox" value="{{ $sales->id }}"></td>
      <td scope="row">{{$sales->id}}</td>
      <td scope="row">{{$sales->product_number}}</td>
      <td scope="row">{{$sales->product_color}}</td>
      <td scope="row">{{$sales->exhibition_timezone}}</td>
      <td scope="row">{{$sales->sales_date}}</td>
      <td scope="row">{{$sales->sales_amount}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
  <button type="submit" class="btn btn-warning" name="delete">削除</button>
</form>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>