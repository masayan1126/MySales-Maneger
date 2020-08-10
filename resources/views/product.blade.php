@include('common.head')
@include('layouts.menu')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 p-4"> 
      <div class="card">
        <img class="card-img-top" src="{{ asset('/img/1.JPG') }}" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">the card's content.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 p-4"> 
      <div class="card">
        <img class="card-img-top" src="{{ asset('/img/2.JPG') }}" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">the card's content.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-1 pb-1"> 
      <div class="card">
        <img class="card-img-top" src="{{ asset('/img/3.JPG') }}" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">the card's content.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 p-4"> 
      <div class="card">
        <img class="card-img-top" src="{{ asset('/img/4.JPG') }}" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">the card's content.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
      </div>
    </div>
  </div>
@include('common.script')
</div>


