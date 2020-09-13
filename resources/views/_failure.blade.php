@include('layouts.menu')
@extends('common.template')
@section('title')
complete
@endsection
@section('content')
<div class="jumbotron max-width-500 mx-auto mt-4">
  <h3 class="">登録失敗!</h3>
  <p class="lead">処理を正常に完了できませんでした。</p>
  <hr class="my-4">
    <div class="col-6">
      <a class="d-block btn bg-mauve shadow-sm text-white" href="/sales-list" role="button">一覧に戻る</a>
    </div>  
    <div class="col-6">  
      <a class="d-block btn bg-lite-green" href="/sale" role="button">続けて入力する</a>
    </div>
</div>
@endsection