<script>
/*global $ */
/*jslint browser */
// common line chart options for gas production graphs
/* Start of common_oxygen_charts2.blade.php */
// DEBUG $sensor_name: <?php echo e($sensor_name); ?>


// Options for all oxygen sensor charts, regardless of the graph size
chartOption[ '<?php echo e($sensor_name); ?>' ] = {};
chartOption[ 'small<?php echo e($sensor_name); ?>' ] = {
    scales: {
        yAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_small')); ?>",
                fontSize: 12
            }
        }],
        xAxes: [{
            scaleLabel: {
                display: false
            }
        }]
    },
    title: {
        display: false
    }
};
chartOption[ 'big<?php echo e($sensor_name); ?>' ] = {
    title: {
        text: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_chart_title_big')); ?>"
    }
};
chartOption[ 'full<?php echo e($sensor_name); ?>' ] = {
    scales: {
        yAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_full')); ?>"
            }
        }],
        xAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.time_before_end')); ?>" + fmtEndingDate("<?php echo e($sensor['end_datetime']); ?>") + "<?php echo e(Lang::get('bioreactor.after_end_time')); ?>"
            }
        }]
    },
    title: {
        text: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_chart_title_full')); ?>"
    }
};

chartDataSet[ '<?php echo e($sensor_name); ?>' ] = {
    steppedLine: true
};

/* End of common_oxygen_charts.blade.php */
</script>
