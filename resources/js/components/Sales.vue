<template>
<div class="row mx-auto">
  <form action="/allocate" name="salesform" id="sale-operation-form" method="POST" class="form-horizontal w-100">
  <div class="form-group">
    <div class="table-responsive">
      <table class="table table-sm table-responsive-sm table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-nowrap">✔︎</th>
            <th scope="col" class="text-nowrap">商品名
              <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
            </th>
            <th scope="col" class="text-nowrap">販路
              <span class="pt-0 pb-0" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i></span>
            </th>
            <th scope="col" class="text-nowrap">売上日
            </th>
            <th scope="col" class="text-nowrap">利益
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(sale) in sales" :key="sale.id">
            <td scope="row"><input class="sale-check" name="check" type="checkbox" value=""></td>
            <td scope="row">{{ sale.product_number }}</td>
            <td scope="row">{{ sale.sales_channel }}</td>
            <td scope="row">{{ sale.sales_date }}</td>
            <td scope="row">{{ sale.sales_amount }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-12">
        <select name="operation" class="form-control col-md-2 col-lg-2 col-sm-2 col-4 custom-select"  id="select">
          <option value="add">追加</option>
          <option value="update">更新</option>
          <option value="delete">削除</option>
        </select>
        <input class="btn bg-mauve shadow-sm text-white" type="submit" name="confirm" id="sales-operate-button" value="確認"/>
      </div>
    </div>
  </div>
  </form>
</div>
</template>

<script>
export default {
    props: ['sales'],
    data(){
      return {
        
      }
    },
}
</script>
