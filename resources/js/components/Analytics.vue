<template>
  <div class="max-chart-size mx-auto">
    <Chartdata :annualSales="annualSalesArr" :monthlySales="monthlySalesArr"></Chartdata>
  </div>
</template>

<script>
import Chartdata from './Chartdata';
// import { Line } from 'vue-chartjs';

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
    // console.log(Object.entries(this.chardDataArr));
    // if (Array.isArray(this.sales)) {
      //   console.log('配列です');
    //   this.sales.forEach(data => {
      //     this.chardDataArr.push(data);
    //   });
    // } else {
      //   const keyArr = Object.keys(this.sales);
    //   const valueArr = Object.values(this.sales);
    //   for(let i = 0; i == keyArr.length; i += 1) {
      //     const obj = { 
        //       targetDate:keyArr[i],
    //       targetSale:valueArr[i],
    //     }
    //     this.chardDataArr.push(obj);
    //   }
    // } 
    if (Array.isArray(this.sales)) {
      this.sales.forEach(data => {
        this.monthlySalesArr.push(data);
      });
    } else {
      const newArr = Object.entries(this.sales).map(([key, value]) => ({key, value}))
      newArr.forEach(data => {
        this.annualSalesArr.push(data);
      });
    }
  },
  mounted() {
  },
}
</script>

<style>
</style>