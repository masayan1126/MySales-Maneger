@include('layouts.menu')
@extends('common.template')
@section('title')
login
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-10 col-lg-6 col-xl-6">
    <div class="card">
      <div class="card-header"><h4>{{ __('ログイン') }}</h4></div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">@csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 offset-md-4 p-1 pl-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
              </div>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="bg-mauve shadow-sm btn text-white">
                {{ __('ログイン') }}
              </button>
                <span onclick="demoLogin()" class="text-warm-gray ml-3">デモユーザーでログイン</span>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  const demoLogin = function() {
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    email.value = 'matsushin@gmail.com'
    password.value = 'matsushin1126'
  }
</script>
@endsection