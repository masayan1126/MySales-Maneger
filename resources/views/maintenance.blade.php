@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
<div id="maintenance-menu" class="mx-auto w-90">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">商品一覧</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">販路一覧</a>
    </li>
  </ul>

  <div class="mt-4 tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <form action="/allocateMaintenanceProductView" id="product-operation-form" name="operation-form" method="POST" class="form-horizontal w-100">
    <div class="form-group">
      {{ csrf_field() }}
      <div class="table-responsive">
        <table class="table table-sm table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="text-nowrap">✔︎</th>
              <th scope="col" class="text-nowrap">商品画像</th>
              <th scope="col" class="text-nowrap">商品名</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_products as $product)
            <tr>
              <td style="width:2%" scope="row"><input name="check[]" type="checkbox" value="{{ $product->product_id }}"></td>
              <td style="width:5%" scope="row"><img class="w-100" src="{{ $product->path }}" alt=""></td>
              <td style="width:20%" scope="row">{{$product->product_name}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-12">
          <select name="operation" class="form-control col-md-2 col-lg-2 col-sm-2 col-4 custom-select" id="product-operate-select">
            <option value="add">追加</option>
            <option value="update">更新</option>
            <option value="delete">削除</option>
          </select>
          <input class="btn bg-mauve shadow-sm text-white" type="submit" name="confirm" id="button" value="確認" />
        </div>
      </div>
      </div>
    </form>
    </div>

    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <form action="/allocate-maintenance-channel" id="channel-operation-form" name="operation-form" method="POST" class="form-horizontal w-100">
    <div class="form-group">
      {{ csrf_field() }}
      <div class="table-responsive">
        <table class="table table-sm table-bordered">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="text-nowrap">✔︎</th>
              <th scope="col" class="text-nowrap">販路</th>
              <th scope="col" class="text-nowrap">URL</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_channel as $channel)
            <tr>
              <td scope="row"><input name="check[]" type="checkbox" value="{{ $channel->id }}"></td>
              <td scope="row">{{$channel->sales_channel}}</td>
              <td scope="row">{{$channel->channel_url}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-12">
          <select name="operation" class="form-control col-md-2 col-lg-2 col-sm-2 col-4 custom-select" id="product-operate-select">
            <option value="add">追加</option>
            <option value="update">更新</option>
            <option value="delete">削除</option>
          </select>
          <input class="btn bg-mauve shadow-sm text-white" type="submit" name="confirm" id="button" value="確認" />
        </div>
      </div>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection