<template>
  <div class="max-chart-size mx-auto">
    <Chartdata :annualSales="annualSalesArr" :monthlySales="monthlySalesArr"></Chartdata>
  </div>
</template>

<script>
import Chartdata from './Chartdata';

export default {
  props: ['sales'],
  components: {
    Chartdata,
  },
  data() { 
    return{
      annualSalesArr: [],
      monthlySalesArr: [],
    }
  },
  created () {
    if (Array.isArray(this.sales)) {
      this.sales.forEach(data => {
        this.monthlySalesArr.push(data);
      });
    } else {
      const newArr = Object.entries(this.sales).map(([key, value]) => ({key, value}))
      newArr.forEach(data => {
        this.annualSalesArr.push(data);
      });
      this.annualSalesArr.sort(function(a, b) {
        if (a.key > b.key) {
          return 1;
        } else {
          return -1;
        }
      })
    }
  },
  mounted() {
    console.log(this.monthlySalesArr);
  },
  methods :{
    compareFunc(a, b) {
      return a - b;
    }
  }
}
</script>

<style>
</style>