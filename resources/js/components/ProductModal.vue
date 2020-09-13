<template>
  <div class="modal-body">
    <div v-for="(product) in targetProduct = productDetails.filter(product => product.product_id === id)" :key="product.product_id" class="modal-content">
      <div class="row">
        <div class="offset-1 col-5">
          <img class="card-img-top" :src="product.path" alt="スダンダードコースのイメージ画像">
        </div>
        <div class="col-6">
        <h5 class="modal-title" id="exampleModalLabel">{{ product.product_name }}</h5>
        <h6 class="mt-5">価格：¥{{ product.price }}</h6>　
        <h6>在庫：{{ product.stock_quantity }}点</h6>　
        </div>
      </div>
      <div class="modal-footer p-2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'product',
    props: [
      'productDetails',
      'id',
    ],
    numberOfProducts: null,
    created() {
    },
    mounted() {

  }
}
</script>
