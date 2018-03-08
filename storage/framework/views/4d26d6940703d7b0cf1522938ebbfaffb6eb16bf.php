<!-- Start of MyBio/common_oxygen_charts.blade.php -->
<script>
/*jslint browser */

(function () {
    "use strict";
    var base = document.com.solarbiocells.biomonitor;
    var bin = base.bin;

    base.chartDataSet["<?php echo e($sensor_name); ?>"] = {
        steppedLine: true
    };
    base.chartDataSet["small<?php echo e($sensor_name); ?>"] = {
        pointRadius: <?php echo e($sensor['point_count'] > 20 ? 1 :( $sensor['point_count'] > 10 ? 2 : 3 )); ?>

    };
    base.chartDataSet["big<?php echo e($sensor_name); ?>"] = {
        label: "<?php echo e(Lang::get('bioreactor.end_time_prefix')); ?>" + bin.fmtEndingDate("<?php echo e($sensor['end_datetime']); ?>") + "<?php echo e(Lang::get('bioreactor.end_time_suffix')); ?>"
    };
    // Handled by chartDataSet[ 'full' ]
    base.chartDataSet["full<?php echo e($sensor_name); ?>"] = {};

    // Options for all oxygen sensor charts, regardless of the graph size
    base.chartOptions["<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                    labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_small')); ?>"
                }
            }]
        }
    };
    base.chartOptions["small<?php echo e($sensor_name); ?>"] = {};
    base.chartOptions["big<?php echo e($sensor_name); ?>"] = {};
    // Handled by chartOptions[ 'full' ]
    base.chartOptions["full<?php echo e($sensor_name); ?>"] = {};
}());// anonymous function()
</script>
<!-- End of MyBio/common_oxygen_charts.blade.php -->
