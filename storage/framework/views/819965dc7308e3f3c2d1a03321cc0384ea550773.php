<script>
// common line chart options for gas production graphs
/*global $ */
/*jslint browser */

var baseGraphOptions = $.extend( true, {}, lineOptionsTemplate, {
    scales: {
        yAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.oxygen_axis_full')); ?>"
            }
        }],
        xAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.time_before_end')); ?><?php echo e($end_datetime); ?><?php echo e(Lang::get('bioreactor.after_end_time')); ?>",
            }
        }]
    }
});

var small_gasflowOptions = $.extend(true, {}, baseGraphOptions, {
    scales: {
        yAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.oxygen_axis_small')); ?>",
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
var big_gasflowOptions = $.extend(true, {}, baseGraphOptions, {
    scales: {
        xAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.time_axis_big')); ?>"
            }
        }]
    },
    title: {
        text: "<?php echo e(Lang::get('bioreactor.oxygen_chart_title_big')); ?>"
    }
});
var full_gasflowOptions = $.extend(true, {}, baseGraphOptions, {
    title: {
        text: "<?php echo e(Lang::get('bioreactor.oxygen_chart_title_full')); ?>"
    }
});


// Options for all gas flow sensor charts, regardless of the graph size
// TODO get rid of isset test after $sensor_name in every view
<?php if( isset( $sensor_name )): ?>
<?php echo e($sensor_name); ?>Dataset = {
    steppedLine: true
};
<?php echo e($sensor_name); ?>Options = {
};
<?php endif; ?>

</script>
