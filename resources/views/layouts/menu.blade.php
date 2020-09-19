<div id="menu" class="mb-4">
  <nav class="navbar navbar-expand-md navbar-light bg-dark-bluish-gray shadow">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{ url('/') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          @guest
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
              </a>
              <a class="dropdown-item" href="{{ url('/home') }}">商品一覧</a>
              <a class="dropdown-item" href="{{ url('/sales-list') }}">売上一覧</a>
              <a class="dropdown-item" href="{{ url('/analytics') }}">売上分析</a>
              <a class="dropdown-item" href="{{ url('/cart-list') }}">カート</a>
              <a class="dropdown-item" href="{{ url('/cart-list') }}">注文内容</a>
              <a class="dropdown-item" href="{{ url('/maintenance') }}">メンテナンス</a>
              <form class="text-white" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
</div>
