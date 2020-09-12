@include('layouts.menu')
@extends('common.template')
@section('title')
index
@endsection
@section('content')
@if (session('alert'))
<div class="alert alert-warning">{{ session('alert') }}</div>
@endif
<h3>売上一覧</h3>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">抽出条件</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/sales-result" method="POST" class="form-horizontal">
      <div class="modal-body">
        {{ csrf_field() }}
        @include('parts.select', ['$products' => '$products', '$all_channel' => '$all_channel'])
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary " name="filter">表示する</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- モーダルここまで -->

<div class="row mx-auto">
  <form action="/allocate" name="salesform" id="sale-operation-form" method="POST" class="form-horizontal w-100">
  <div class="form-group">
    {{ csrf_field() }}
    <div class="table-responsive">
      <table class="table table-sm table-responsive-sm table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-nowrap">✔︎</th>
            <th scope="col" class="text-nowrap">商品名
              <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
            </th>
            <th scope="col" class="text-nowrap">販路
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
            <td scope="row"><input class="sale-check"　name="check[]" type="checkbox"  value="{{ $sales->id }}"></td>
            <td scope="row">{{$sales->product_number}}</td>
            <td scope="row">{{$sales->sales_channel}}</td>
            <td scope="row">{{$sales->sales_date}}</td>
            <td scope="row">{{$sales->sales_amount}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-12">
        <select name="operation" class="form-control col-md-2 col-lg-2 col-sm-2 col-4 custom-select"  id="select">
          <option value="add">追加</option>
          <option value="update">更新</option>
          <option value="delete">削除</option>
        </select>
        <input class="btn bg-lite-orange text-white" type="submit" name="confirm" id="sales-operate-button" value="確認"/>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection
@section('script')
@endsection