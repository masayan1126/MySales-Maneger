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
            borderColor: '#EED8C9',
            backgroundColor: '#EED8C9',
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
              stepSize: null,
              max: null,
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
      this.options.scales.xAxes[0].scaleLabel.labelString = '月';
      this.options.scales.yAxes[0].ticks.stepSize = 1000;
      this.options.scales.yAxes[0].ticks.max = 25000;
    } else {
      this.monthlySales.forEach(data => {
        this.data.labels.push(data.sales_date.substring(8, 10));
        this.data.datasets[0].data.push(data.sales_amount);
      });
      this.options.scales.xAxes[0].scaleLabel.labelString = '日';
      this.options.scales.yAxes[0].ticks.stepSize = 500;
      this.options.scales.yAxes[0].ticks.max = 10000;
    }
      this.renderChart(this.data, this.options)

  }
}
</script>