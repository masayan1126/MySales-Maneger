<template>
  <div class="mx-auto">
    <div v-for="(product) in this.$props.product" :key="product.product_id" class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> 
      <div class="card max-width-500 mx-auto">
        <img class="card-img-top" :src="product.path" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">{{ product.product_name }}</h5>
          <a href="#" class="btn bg-lite-orange text-white">詳細を見る</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'product',
    props: ['product'],
    numberOfProducts: null,
    created() {
      this.numberOfProducts = this.$props.product.length;
    },
    mounted() {
      console.log(this.numberOfProducts)
  }
}
</script>
