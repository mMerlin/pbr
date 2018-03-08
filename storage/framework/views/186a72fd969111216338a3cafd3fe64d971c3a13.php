<script>
// common line chart options for light graphs
/*global $ */
/*jslint browser */

// Need to find a way to prevent the php expansion from converting the utf-8
// character to encoded form.  I *want& µ here, not &micro;
// alert("<?php echo e(Lang::get('bioreactor.intensity_small')); ?>");
// alert("<?php echo e(Lang::get('bioreactor.intensity_small')); ?>");
// alert("<?php echo e('µ'); ?>");
// alert("µ");
// Only the final hard-coded string actually works
// labelString: "<?php echo e(Lang::get('bioreactor.intensity_axis_full')); ?>",
var baseGraphOptions = $.extend(true, {}, lineOptionsTemplate, {
    scales: {
        yAxes: [{
            scaleLabel: {
                display: true,
                // labelString: "<?php echo e(Lang::get('bioreactor.light_axis_full')); ?>"
                labelString: "µmol photons/(m^2 S)",
                fontSize: 14
            }
        }],
        xAxes: [{
            scaleLabel: {
                display: true,
                labelString: "<?php echo e(Lang::get('bioreactor.time_before_end')); ?><?php echo e($end_datetime); ?><?php echo e(Lang::get('bioreactor.after_end_time')); ?>",
                fontSize: 14
            }
        }]
    }
});

// labelString: "<?php echo e(Lang::get('bioreactor.intensity_axis_small')); ?>",
var small_lightOptions = $.extend(true, {}, baseGraphOptions, {
    scales: {
        yAxes: [{
            scaleLabel: {
                // labelString: "<?php echo e(Lang::get('bioreactor.light_axis_small')); ?>",
                labelString: "µmol γ/(m^2 S)",
                fontSize: 10
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
// labelString: "<?php echo e(Lang::get('bioreactor.intensity_axis_big')); ?>",
var big_lightOptions = $.extend(true, {}, baseGraphOptions, {
    scales: {
        // xAxes: [{
        //     scaleLabel: {
        //         labelString: "<?php echo e(Lang::get('bioreactor.light_axis_big')); ?>",
        //     }
        // }],
        yAxes: [{
            scaleLabel: {
                labelString: "µmol photons/(m^2 S)",
            }
        }],
        xAxes: [{
            scaleLabel: {
                labelString: "<?php echo e(Lang::get('bioreactor.time_axis_big')); ?>"
            }
        }]
    },
    title: {
        text: "<?php echo e(Lang::get('bioreactor.light_chart_title_big')); ?>"
    }
});
var full_lightOptions = $.extend(true, {}, baseGraphOptions, {
    title: {
        text: "<?php echo e(Lang::get('bioreactor.light_chart_title_full')); ?>"
    }
});

// Options for all light intensity sensor charts, regardless of the graph size
// TODO get rid of isset test after $sensor_name in every view
<?php if( isset( $sensor_name )): ?>
<?php echo e($sensor_name); ?>Dataset = {
};
<?php echo e($sensor_name); ?>Options = {
};
<?php endif; ?>

</script>
