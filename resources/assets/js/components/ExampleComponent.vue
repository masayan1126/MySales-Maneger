<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
@{{test}}
<Bar>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs'   

    export default {
        extends: Bar,
        name: "example-component",
        date(){
          return{
              test: 'test',
          }
        },
        mounted() {
            this.renderChart(data, options)
            console.log('Component mounted.')
        }
    }
</script>