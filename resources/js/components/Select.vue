<template>
  <div id="select">
    <div class="form-group">
      <div class="row">
        <div class="col-12 p-0 pl-3">
          <label for="product-number-Selection">商品名</label>
        </div>
        <div class="col-12">
          <select name="productNumber" class="form-control col-8 custom-select" id="product-number-Selection">
            <option>アニマル柄iPhoneケース(Type-A)</option>
            <option>【IC002】</option>
            <option>【IC003-1】</option>
            <option>【IC003-2】</option>
            <option>【IC004】</option>
            <option>【IC005-1】</option>
            <option>【IC005-2】</option>
            <option>【IC006】</option>
            <option>【IC007】</option>
            <option>【IC008-1】</option>
            <option>【IC008-2】</option>
            <option>【IC008-3】</option>
            <option>【IC008-4】</option>
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
            <option>メルカリ</option>
            <option>ECサイト</option>
            <option>ミンネ</option>
            <option>クリーマ</option>
            <option>SNS(インスタ)</option>
            <option>その他</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'select-component',
    props: ['products'],
}
</script>
