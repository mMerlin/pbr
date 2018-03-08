<!-- Start of MyBio/common_light_charts.blade.php -->
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

    // Need to find a way to prevent the php expansion from converting the utf-8
    // character to encoded form.  I *want& µ here, not &micro;
    // alert("<?php echo e(Lang::get('bioreactor.intensity_small')); ?>");
    // alert("<?php echo e(Lang::get('bioreactor.intensity_small')); ?>");
    // alert("<?php echo e('µ'); ?>");
    // alert("µ");
    // Only the final hard-coded string actually works
    // Options for all light sensor charts, regardless of the graph size
    base.chartOptions["<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    base.chartOptions["small<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                scaleLabel: {
                    // labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_small')); ?>",
                    labelString: "µmol γ/(m^2 S)"
                }
            }]
        }
    };
    base.chartOptions["big<?php echo e($sensor_name); ?>"] = {
        scales: {
            yAxes: [{
                scaleLabel: {
                    // labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_big')); ?>"
                    labelString: "µmol photons/(m^2 S)"
                }
            }]
        }
    };
    // Handled by chartOptions[ 'full' ]
    base.chartOptions["full<?php echo e($sensor_name); ?>"] = {};
}());// anonymous function()
</script>
<!-- End of MyBio/common_light_charts.blade.php -->
