<template>
<!-- <form action="/pay" method="POST">
<input type="hidden" name="_token" :value="csrf"> -->
<div class="max-width-1400 mx-auto">
    <h3 class="">ご注文内容</h3>
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

        <tr v-for="item in order" :key="item.id">
          <td style="width:5%" scope="row">{{ item.product_name }}</td>
          <td style="width:2%" scope="row"><img class="w-50" :src="item.path" alt=""></td>
          <td style="width:2%" scope="row">{{ item.price }}</td>
          <td style="width:2%" scope="row">{{ item.purchase_number }}</td>
          <td style="width:1%" scope="row">
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- <button @click="openHandler($event)" id="customButton" class="btn bg-mauve shadow-sm text-white">注文する</button>
<h3 class="">送付先住所</h3>
</form> -->
</template>

<script>
export default {
  props: ['order'],
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      // handler: StripeCheckout.configure({
      //   key: 'pk_test_51HRChdIH4aiHiVFwmYIEWpP48Gm3U9QSNw8m85SuELfpOdvvf9PqLBQFL29nMZGI1L65cw8ORsbZpFpit339aUlQ00k1tsIt9m',
      //   image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
      //   locale: 'auto',
      //   token: function(token) {
          // You can access the token ID with `token.id`.
          // Get the token ID to your server-side code for use.
      //   }
      // })
    }
  },
  created() {
    console.log(this.order)
  },
  mounted() {
    // window.addEventListener('popstate', function() {
    //   this.handler.close();
    // });
  },
  methods:{
    // openHandler (e) {
    //   console.log(e);
    //   this.handler.open({
    //   name: 'お支払いの情報',
    //   description: '2 widgets',
    //   amount: this.totalPrice,
    // });
    //   e.preventDefault();
    // }
  },
  computed: {
    // totalPrice() {
    //   const priceArray = this.order.map(item =>item.price);
    //   const sum = priceArray.reduce((a,x) => {
    //     return a + x;
    //   });
    //   console.log(sum);
    //   return sum;
    // },
  }
}
</script>
