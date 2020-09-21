@include('layouts.menu')
@extends('common.template')
@section('title')
complete
@endsection
@section('content')
<div class="jumbotron max-width-600 mx-auto mt-5 w-90">
  <h3 class="">処理完了</h3>
  <p class="lead">処理は正常に完了しました。</p>
  <hr class="my-4">
  <form action= "{{ $action }}" id="product-operation-form" name="operation-form" method="GET" class="form-horizontal w-100">
    <div class="form-group">
      <div class="col-6 max-width-150">
        <button type="submit" class="d-block btn btn-primary shadow-sm text-white" role="button">一覧に戻る</button>
      </div>  
    </div>
  </form>
</div>
@endsection