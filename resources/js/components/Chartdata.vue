<script>
import { Line } from 'vue-chartjs';

export default {
  extends: Line,
  props: ['sales'],
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
            fill: false,
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
    console.log(this.sales);
    this.sales.forEach(data => {
      this.data.labels.push(data.key);
      // console.log(this.data.labels);
      this.data.datasets[0].data.push(data.value);
      // console.log(this.data.datasets[0].data);
      // console.log(this.sales);
    });
  },
  mounted () {
    this.renderChart(this.data, this.options)

  }
}
</script>