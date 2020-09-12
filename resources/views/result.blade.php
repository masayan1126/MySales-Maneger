@include('layouts.menu')
@extends('common.template')
@section('title')
index
@endsection
@section('content')
<h3>売上一覧</h3>
<div class="row mx-auto">
  <form action="/sales-list" id="sale-operation-form" method="GET" class="form-horizontal w-100">
  <div class="form-group">
    {{ csrf_field() }}
    <div class="table-responsive">
      <table class="table table-sm table-responsive-sm table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-nowrap">商品名
              <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal">
              </span>
            </th>
            <th scope="col" class="text-nowrap">販路
              <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal">
              </span>
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
      {{ csrf_field() }}
        <input class="btn bg-lite-orange text-white" type="submit" name="confirm" id="button" value="全件表示"/>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection