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
            label: '売上チャート',
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
              labelString: ''
            }
          }],
          yAxes: [{
            scaleLabel: {
              labelString: '売上'
            },
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
    if (this.monthlySales.length === 0) {
      this.annualSales.forEach(data => {
        this.data.labels.push(data.key);
        this.data.datasets[0].data.push(data.value);
      });
      this.options.scales.xAxes[0].scaleLabel.labelString = '月'
    } else {
      this.monthlySales.forEach(data => {
        this.data.labels.push(data.sales_date);
        this.data.datasets[0].data.push(data.sales_amount);
      });
      this.options.scales.xAxes[0].scaleLabel.labelString = '日'
    }
      this.renderChart(this.data, this.options)

  }
}
</script>