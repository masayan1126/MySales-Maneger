<template>
  <div class="mx-auto row">
    <div v-for="(product) in products" :key="product.product_id" class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> 
      <div class="card">
        <img class="card-img-top" :src="product.path" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">{{ product.product_name }}</h5>
          <input @click="passProductId(product.product_id)" value="詳細を見る" type="button" class="btn bg-lite-orange text-white" data-toggle="modal" data-target="#exampleModal">
        </div>
      </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">商品詳細</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <productmodal-component :id="productId" :productDetails="products"></productmodal-component>
      </div>
    </div>
  </div>
</div>
  </div>
</template>

<script>
export default {
  props: ['products'],
  data() {
    return {
      productId:'',

    }
  },
  numberOfProducts: null,
  created() {
  },
  mounted() {
    console.log(this.products);
  },
  methods:{
    passProductId(id) {
      this.productId = id;
      console.log(this.productId);
    },
  }
}
</script>
