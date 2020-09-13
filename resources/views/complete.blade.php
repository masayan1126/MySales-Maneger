@include('layouts.menu')
@extends('common.template')
@section('title')
complete
@endsection
@section('content')
<div class="jumbotron max-width-500 mx-auto mt-4">
  <h3 class="">登録完了!</h3>
  <p class="lead">処理は正常に完了しました。</p>
  <hr class="my-4">
  <form action="/product-input" id="product-operation-form" name="operation-form" method="GET" class="form-horizontal w-100">
    <div class="form-group">
    <div class="col-6">
      <a class="d-block btn bg-mauve shadow-sm text-white" href="/sales-list" role="button">一覧に戻る</a>
    </div>  
    <div class="col-6">
        <input type="submit" class="d-block btn bg-lite-green text-white" value="続けて入力する" role="button">
      </div>
      </form>
    </div>
</div>
@endsection