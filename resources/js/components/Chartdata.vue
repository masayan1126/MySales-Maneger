<script>
import { Line } from 'vue-chartjs';

export default {
  extends: Line,
  props: [
    'monthlySales',
    'annualSales'
  ],
  name: 'chartdata',
  data () {
    return {
      data: {
        labels: [],
        datasets: [
          {
            label: 'Line Dataset',
            data: [],
            borderColor: '#CFD8DC',
            fill: true,
            type: 'line',
            lineTension: 0.3,
          }
        ]
      },
      options: {
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 1000,
              max: 20000,
              min: 0,
            }
          }]
        }
      }
    }
  },
  created() {

  },
  mounted () {
    console.log(this.monthlySales.length === 0 );
        // console.log(this.annualSales.length);
    // console.log(this.monthlySales.length);
    if (this.monthlySales.length === 0) {
      console.log(this.annualSales);
      this.annualSales.forEach(data => {
        console.log(data);
        this.data.labels.push(data.key);
        this.data.datasets[0].data.push(data.value);
      });
    } else {
     console.log(this.monthlySales);
      this.monthlySales.forEach(data => {
        this.data.labels.push(data.sales_date);
        this.data.datasets[0].data.push(data.sales_amount);
      });
    }
    // console.log(this.sales);
    // setTimeout(() => {
      this.renderChart(this.data, this.options)
    // }, 1000);

  }
}
</script>