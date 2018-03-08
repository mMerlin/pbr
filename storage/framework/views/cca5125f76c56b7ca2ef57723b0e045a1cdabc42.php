<script>
  var ctx = document.getElementById("temp_canvas").getContext("2d");

  var mOpt = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  };
  var lLbls = ["January", "February", "March", "April", "May", "June", "July"];
  var lPts = [65, 59, 80, 81, 56, 55, 40];
  var lData = {
      labels: lLbls,
      datasets: [
          {
              label: "My First dataset",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(75,192,192,0.4)",
              borderColor: "rgba(75,192,192,1)",
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "rgba(75,192,192,1)",
              pointBackgroundColor: "#fff",
              pointBorderWidth: 1,
              pointHoverRadius: 5,
              pointHoverBackgroundColor: "rgba(75,192,192,1)",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointHoverBorderWidth: 2,
              pointRadius: 1,
              pointHitRadius: 10,
              data: lPts,
              spanGaps: false,
          }
      ]
  };
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: lData,
    options: mOpt
  });

</script>
