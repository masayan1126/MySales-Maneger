@include ('common.head', ['title' => 'test'])
<body>
@include('layouts.menu')
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
      <th scope="col" class="text-nowrap">販売経路
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
      <td scope="row">{{$sales->sales_channel}}</td>
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
<div id="app">
    <example-component></example-component>
</div>
@include('common.script')
</body>