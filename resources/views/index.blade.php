@include('layouts.menu')
@extends('common.template')
@section('title')
login
@endsection
@section('content')
<h3>売上一覧</h3>
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
  <div class="row mx-auto">
  <form action="/delete" method="POST" class="form-horizontal w-100">
  <div class="form-group">
  {{ csrf_field() }}
  <div class="table-responsive">
    <table class="table table-sm table-responsive-sm table-bordered">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-nowrap">✔︎</th>
          <th scope="col" class="text-nowrap">#</th>
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
      <td scope="row"><input name="check[]" type="checkbox" value="{{ $sales->id }}"></td>
      <td scope="row">{{$sales->id}}</td>
      <td scope="row">{{$sales->product_number}}</td>
      <td scope="row">{{$sales->sales_channel}}</td>
      <td scope="row">{{$sales->sales_date}}</td>
      <td scope="row">{{$sales->sales_amount}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
  <input type="submit" class="btn bg-lite-orange text-white" value="編集する">
  <input type="submit" class="btn bg-lite-green text-black" value="削除する">
</div>
</form>
</div>
@endsection