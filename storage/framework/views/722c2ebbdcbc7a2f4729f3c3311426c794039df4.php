<script>
// for "<?php echo e($sensor["name"]); ?>" sensor data
<?php /*
// backgroundColor: "rgba(220,180,0,1)",
// borderColor: "rgba(220,180,0,1)",
// borderCapStyle: "butt",
// borderDash: [],
// borderDashOffset: 0.0,
// borderJoinStyle: "miter",
// pointBackgroundColor: "rgba(220,180,0,1)",
// pointHoverRadius: 8,
// pointHoverBackgroundColor: "rgba(75,192,192,1)",
// pointHoverBorderColor: "rgba(220,220,220,1)",
// pointBorderColor: "rgba(220,220,220,1)",
// pointBorderWidth: 1,
// pointHitRadius: 10,
// pointStyle: "circle",
*/ ?>

var sensorValues = [<?php foreach($sensor["y_data"] as $pt): ?>"<?php echo e($pt); ?>",<?php endforeach; ?>];

// Mini chart when multiple sensor graphs are show together on the same page.

var sensorSet = [ $.extend({}, lineChartTemplate, {
    data: sensorValues,
    pointRadius: 2,
    pointHoverRadius: 4,
    pointHoverBorderWidth: 1
})];
var sensorChartData = {
    labels: [<?php foreach($sensor["x_data"] as $pt): ?>".",<?php endforeach; ?>],
    datasets: sensorSet
};
var ctx = document.getElementById("<?php echo e($sensor["name"]); ?>_canvas").getContext("2d");
var sensorGraph = new Chart( ctx, {
    type: "line",
    data: sensorChartData,
    options: small_<?php echo e($sensor["name"]); ?>Options
});

// Larger modal chart linked to the mini chart

var sensorSet = [ $.extend({}, lineChartTemplate, {
  data: sensorValues,
  pointRadius: 5,
  pointHoverRadius: 9,
  pointHoverBorderWidth: 1
})];
// Need a unique variable (or figure out how to do a proper closure) to have the
// correct data set avaliable when the modal chart is openned.
var big_<?php echo e($sensor["name"]); ?>ChartData = {
  labels: [<?php foreach($sensor["x_data"] as $pt): ?>"<?php echo e($pt); ?>",<?php endforeach; ?>],
  datasets: sensorSet
};

$(document).ready(function(){
  $("#<?php echo e($sensor["name"]); ?>_modal").on("shown.bs.modal", function () {
    var ctx = document.getElementById("big_<?php echo e($sensor["name"]); ?>_canvas").getContext("2d");
    // alert("big data: "+JSON.stringify(big_<?php echo e($sensor["name"]); ?>ChartData));

    var sensorGraph = new Chart(ctx, {
      type: "line",
      data: big_<?php echo e($sensor["name"]); ?>ChartData,
      options: big_<?php echo e($sensor["name"]); ?>Options
    });
  });
});

</script>
