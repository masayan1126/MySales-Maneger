<template>
  <div>
    <div v-for="(product) in targetProduct = productDetails.filter(product => product.product_id === id)" :key="product.product_id" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ product.product_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
        <div class="col-6">
          <img class="card-img-top" :src="product.path" alt="スダンダードコースのイメージ画像">
        </div>
        <div class="col-6"> 　
        <p>¥1980</p>　
        </div>
      </div>
      <!-- <div class="modal-footer"> -->
        <button type="button" class="mt-3 btn btn-secondary" data-dismiss="modal">Close</button>
      <!-- </div> -->
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
