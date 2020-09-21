<template>
<form action="/cart" method="GET">
  <input type="hidden" name="_token" :value="csrf">
  <div class="modal-body">
    <div v-for="(product) in targetProduct = productDetails.filter(product => product.product_id === id)" :key="product.product_id" class="modal-content">
      <div class="row">
        <div class="offset-1 col-5">
          <input type="hidden" name="path" v-model="product.path">
          <img class="card-img-top" :src="product.path" alt="スダンダードコースのイメージ画像">
        </div>
        <div class="col-6">
        <h5 class="modal-title" id="exampleModalLabel"><input type="hidden" name="product_name" v-model="product.product_name">{{ product.product_name }}</h5>
        <h6 class="mt-5"><input type="hidden" name="price" v-model="product.price">価格：¥{{ product.price }}</h6>　
        <h6>在庫：{{ product.stock_quantity }}点</h6>　
        <select name="purchase_number" id="">
          <option v-for="n in 10" :key="n" v-bind:value="n">{{ n }}</option>
        </select>
        </div>
      </div>
      <div class="modal-footer p-2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="カートに追加" >
      </div>
    </div>
  </div>
</form>
</template>

<script>
export default {
  name: 'product',
  props: [
    'productDetails',
    'id',
  ],
  numberOfProducts: null,
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  created() {
  },
  mounted() {
  },
  methods: {
  },
}
</script>
