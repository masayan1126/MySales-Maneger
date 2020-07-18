<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  @include('parts.menu')
  <div class="container-fluid pt-4">
    <h2>売上一覧</h2>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">商品ID</th>
      <th scope="col">商品カラー</th>
      <th scope="col">売上日</th>
      <th scope="col">売上利益</th>
      <th scope="col">出品時間</th>
    </tr>
  </thead>
  <tbody>
  @foreach($all_sales as $sales)
    <tr>
      <td scope="row">{{$sales->id}}</td>
      <td scope="row">{{$sales->product_color}}</td>
      <td scope="row">{{$sales->sales_date}}</td>
      <td scope="row">{{$sales->sales_amount}}</td>
      <td scope="row">{{$sales->exhibition_time}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>