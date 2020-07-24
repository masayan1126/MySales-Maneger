<script>
import { Bar } from 'vue-chartjs'   

export default {
  extends: Bar,
  name: "chart",
  data () {
    return {
      chartData: {
      labels: ['January', 'February', 'March', 'April', 'May'],
      datasets: [
     {
      label: 'Sample1',
      data: [28, 20, 30, 40, 50],
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 206, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 159, 64, 0.2)'
      ],
      borderWidth: 1
     }
     ]
   },
  }
},
  mounted() {
    this.renderChart(data, options)
    console.log('Component mounted.')
  }
}
</script>

<style scoped lang="scss">
</style>