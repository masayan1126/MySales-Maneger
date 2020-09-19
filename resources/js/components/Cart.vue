<template>
<form action="/order-confirm" method="POST">
<input type="hidden" name="_token" :value="csrf">
<div class="max-width-1400 mx-auto">
    <h3 class="">カート</h3>
    <p class="text-right">総計：{{ totalPrice }}円</p>
  <div class="mx-auto row justify-content-center justify-content-sm-start max-width-1400">
    <table class="table table-striped table-dark">
			<thead>
        <tr>
          <th scope="col">商品名</th>
          <th scope="col">商品画像</th>
          <th scope="col">価格</th>
          <th scope="col">購入数</th>
          <th scope="col" class="text-nowrap"></th>
        </tr>
      </thead>
      <tbody>

        <tr v-for="item in cart" :key="item.id">
          <td style="width:5%" scope="row">{{ item.product_name }}</td>
          <td style="width:2%" scope="row"><img class="w-50" :src="item.path" alt=""></td>
          <td style="width:2%" scope="row">{{ item.price }}</td>
          <td style="width:2%" scope="row">{{ item.purchase_number }}</td>
          <td style="width:1%" scope="row">
            <form action="/item-remove" method="POST" name="delete">
              <input type="submit" class="shadow-sm btn btn-primary" value="削除" v-on:click="makeAction($event)">
              <input type="hidden" name="_token" :value="csrf">
              <input name="check[]" type="hidden" v-bind:value="item.id">
            </form>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
<!-- 　<div class="mx-auto w-75 height-40 mt-3"> -->
    <!-- <paginate class="mx-auto justify-content-center"
      :page-count="getPageCount"
      :page-range="4"
      :margin-pages="2"
      :click-handler="clickCallback"
      :prev-text="'<'"
      :page-link-class="'page-link'"
      :prev-link-class="'page-link'"
      :next-text="'>'"
      :next-class="'page-item'"
      :next-link-class="'page-link'"
      :prev-class="'page-item'"
      :container-class="'pagination'"
      :page-class="'page-item'">
      :clickHandler="clickCallback">
    </paginate>
  </div> -->
</div>
<button type="submit" class="btn bg-mauve shadow-sm text-white">注文画面へ</button>
</form>
</template>

<script>
export default {
  props: ['cart'],
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  created() {
    console.log(this.cart)
  },
  mounted() {
  },
  methods:{
    makeAction (event) {
      console.log(event);
    },
  },
  computed: {
    totalPrice() {
      const priceArray = this.cart.map(item =>item.price);
      const sum = priceArray.reduce((a,x) => {
        return a + x;
      });
      console.log(sum);
      return sum;
    },
  }
}
</script>
