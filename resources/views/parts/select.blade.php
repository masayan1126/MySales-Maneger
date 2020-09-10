<div id="select">
  <div class="form-group">
    <div class="row">
      <div class="col-12 p-0 pl-3">
        <label for="product-number-Selection">商品名</label>
      </div>
      <div class="col-12">
        <select name="productNumber" class="form-control col-8 custom-select" id="product-number-Selection">
          @foreach($products as $product)
            <option>{{$product->product_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-12 p-0 pl-3">
        <label for="sales_channel">販路</label>
      </div>
      <div class="col-12">
        <select name="salesChannel" class="form-control col-4 custom-select" id="sales_channel">
          @foreach($all_channel as $channel)
            <option>{{$channel->sales_channel}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <!-- <div class="form-group">
    <label for="product-color-selection">商品カラー</label>
    <select name="productColor" class="form-control col-4" id="product-color-selection">
      <option value="ゴールド">ゴールド</option>
      <option value="ブラック">ブラック</option>
      <option value="ブラウン">ブラウン</option>
      <option value="グリーン">グリーン</option>
      <option value="カーキ">カーキ</option>
      <option value="ピーチ">ピーチ</option>
      <option value="オレンジ">オレンジ</option>
      <option value="レッド">レッド</option>
      <option value="ブルー">ブルー</option>
      <option value="パープル">パープル</option>
      <option value="グレー">グレー</option>
    </select>
  </div> -->
</div>