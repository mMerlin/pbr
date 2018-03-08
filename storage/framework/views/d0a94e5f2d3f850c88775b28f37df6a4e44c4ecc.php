<script>
// common line chart options for ph graphs
/*global $ */
/*jslint browser */

var baseGraphOptions = $.extend(true, {}, lineOptionsTemplate, {
    scales: {
        yAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_axis_full')); ?>",
            }
        }],
        xAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.time_before_end')); ?><?php echo e($sensor['end_datetime']); ?><?php echo e(Lang::get('bioreactor.after_end_time')); ?>",
            }
        }]
    }
});

var small_phOptions = $.extend(true, {}, baseGraphOptions, {
    scales: {
        yAxes: [{
            scaleLabel: {
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
        display: false,
    }
});
var big_phOptions = $.extend(true, {}, baseGraphOptions, {
    title: {
        text: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_chart_title_big')); ?>"
    }
});
var full_phOptions = $.extend(true, {}, baseGraphOptions, {
    title: {
        text: "<?php echo e(Lang::get('bioreactor.' . $sensor_name . '_chart_title_full')); ?>"
    }
});

// Options for all pH sensor charts, regardless of the graph size
// TODO get rid of isset test after $sensor_name in every view
<?php if( isset( $sensor_name )): ?>
<?php echo e($sensor_name); ?>Dataset = {
};
<?php echo e($sensor_name); ?>Options = {
};
<?php endif; ?>

</script>
