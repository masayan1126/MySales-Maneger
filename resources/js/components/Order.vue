<template>
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
