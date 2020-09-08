<template>
  <Chartdata :sales="chardDataArr"></Chartdata>
</template>

<script>
import Chartdata from './Chartdata';
// import { Line } from 'vue-chartjs';

export default {
  props: ['target_sales'],
  components: {
    Chartdata,
  },
  data() { 
    return{
      chardDataArr: [],
    }
  },
  created () {
    this.sales.forEach(data => {
      this.chardDataArr.push(data);
    });
  },
  mounted() {
    // console.log(this.chardDataArr);
  },
}
</script>

<style>
</style>