<template>
<div class="max-width-1400 mx-auto">
    <h3 class="">注文一覧</h3>
  <div class="mx-auto row justify-content-center justify-content-sm-start max-width-1400">
    <table class="table table-responsive table-striped table-dark">
			<thead>
        <tr>
          <th scope="col">商品名</th>
          <th scope="col">価格</th>
          <!-- <th scope="col">アドレス</th> -->
          <th scope="col">注文者</th>
          <th scope="col">送付先</th>
          <!-- <th scope="col">注文日</th> -->
          <th scope="col" class="text-nowrap">発送</th>
          <th scope="col" class="text-nowrap"></th>
        </tr>
      </thead>
      <tbody>

        <tr v-for="item in order" :key="item.id">
          <td style="width:4%" scope="row">{{ item.product_name }}</td>
          <td style="width:1%" scope="row">{{ item.price }}</td>
          <!-- <td style="width:1%" scope="row">{{ item.mail_address }}</td> -->
          <td style="width:1%" scope="row">{{ item.orderer }}</td>
          <td style="width:1%" scope="row">{{ item.address_line1 + item.address_line2 }}</td>
          <!-- <td style="width:1%" scope="row">{{ item.created_at }}</td> -->
          <td v-if="item.shipping === 0" style="width:1%" scope="row">未</td>
          <td v-else style="width:1%" scope="row">済</td>
          <td style="width:1%" scope="row" class="text-nowrap">
            <form action="/shipping" method="POST">
              <input type="hidden" name="_token" :value="csrf">
              <input type="hidden" name="check" :value="item.order_number">
              <button v-if="item.shipping === 0" type="submit" name="shipping" class="btn btn-primary shadow-sm">発送する</button>
              <button v-else type="submit" name="shipment_cancellation" class="btn btn-primary shadow-sm">取り消し</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</template>

<script>
export default {
  props: ['order'],
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  created() {
  },
  mounted() {
  },
  methods:{
  },
  computed: {
  }
}
</script>
