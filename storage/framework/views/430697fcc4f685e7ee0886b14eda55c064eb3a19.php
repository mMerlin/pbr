<!-- End of MyBio/common_ph_charts.blade.php -->
<script>
/*jslint browser */

(function () {
    "use strict";
    var base = document.com.solarbiocells.biomonitor;
    var bin = base.bin;

    base.chartDataSet["<?php echo e($sensor_name); ?>"] = {};
    base.chartDataSet["small<?php echo e($sensor_name); ?>"] = {};
    base.chartDataSet["big<?php echo e($sensor_name); ?>"] = {
        label: "<?php echo e(Lang::get('bioreactor.end_time_prefix')); ?>" + bin.fmtEndingDate("<?php echo e($sensor['end_datetime']); ?>") + "<?php echo e(Lang::get('bioreactor.end_time_suffix')); ?>"
    };
    // Handled by chartDataSet[ 'full' ]
    base.chartDataSet["full<?php echo e($sensor_name); ?>"] = {};

    base.chartOptions["<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 8.0,
                    suggestedMax: 10.0
                }
            }]
        }
    };
    base.chartOptions["small<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1
                },
                scaleLabel: {
                    labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_small')); ?>"
                }
            }]
        }
    };
    base.chartOptions["big<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize: 0.5
                },
                scaleLabel: {
                    labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_big')); ?>"
                }
            }]
        }
    };
    // Handled by chartOptions[ 'full' ]
    base.chartOptions["full<?php echo e($sensor_name); ?>"] = {};
}());// anonymous function()
</script>
<!-- End of MyBio/common_ph_charts.blade.php -->
