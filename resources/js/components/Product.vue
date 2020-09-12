<template>
  <div class="mx-auto row">
    <div v-for="(item) in getItems" :key="item.product_id" class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> 
      <div class="card">
        <img class="card-img-top" :src="item.path" alt="スダンダードコースのイメージ画像">
        <div class="card-body">
          <h5 class="card-title">{{ item.product_name }}</h5>
          <input @click="passProductId(item.product_id)" value="詳細を見る" type="button" class="btn bg-lite-orange text-white" data-toggle="modal" data-target="#exampleModal">
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
          <productmodal-component :id="productId" :productDetails="products"></productmodal-component>
        </div>
      </div>
    </div>
  
  　<div class="mx-auto d-block w-75 height-40 mt-3">
    <paginate class="mx-auto justify-content-center"
    :page-count="getPageCount"
    :page-range="4"
    :margin-pages="2"
    :click-handler="clickCallback"
    :prev-text="'＜'"
    :page-link-class="'page-link'"
    :prev-link-class="'page-link'"
    :next-text="'＞'"
    :next-class="'page-item'"
    :next-link-class="'page-link'"
    :prev-class="'page-item'"
    :container-class="'pagination'"
    :page-class="'page-item'">
    :clickHandler="clickCallback">
  </paginate>
  </div>
  
  </div>
</template>

<script>
export default {
  props: ['products'],
  data() {
    return {
      items: [],
      productId:'',
      parPage: 8,
      currentPage: 1,
    }
  },
  numberOfProducts: null,
  created() {
    this.products.forEach(element => {
      this.items.push(element);
    });
  },
  mounted() {
  },
  methods:{
    passProductId(id) {
      this.productId = id;
    },
    clickCallback: function (pageNum) {
       this.currentPage = Number(pageNum);
    }
  },
  computed: {
    getItems: function() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.items.slice(start, current);
    },
    getPageCount: function() {
      return Math.ceil(this.items.length / this.parPage);
    }
  }
}
</script>
