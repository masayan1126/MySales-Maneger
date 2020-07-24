<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salse</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
</head>
<body>
  @include('parts.menu')
  <div class="container-fluid pt-4">
  <canvas id="chart"></canvas>
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script>
    var type = 'line';
    var data = {
        labels: ['2018-01', '2018-02', '2018-03', '2018-04', '2018-04'],
        datasets: [{
            label: 'type A',
            data: [111, 222, 333, 444, 555]
        }],
    };
    
    let arr = <?php echo $all_sales; ?>
    console.log(arr);

    arr.forEach(element => {
      data.datasets.data.push(element);
    });
    console.log(data.datasets.data);

    var options;
    var ctx = $('#chart')[0].getContext('2d');
    var myChart = new Chart(ctx, {
        type: type,
        data: data,
        options: options  
  });
</script>
</body>
</html>