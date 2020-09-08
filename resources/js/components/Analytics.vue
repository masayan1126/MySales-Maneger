<template>
  <Chartdata :sales="chardDataArr"></Chartdata>
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
      chardDataArr: [],
    }
  },
  created () {
    console.log(this.sales);
    this.sales.forEach(data => {
      this.chardDataArr.push(data);
    });
  },
  mounted() {
  },
}
</script>

<style>
</style>