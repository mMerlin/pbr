<?php $__env->startSection('content'); ?>

<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => false), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#data_graph"><?php echo app('translator')->get('bioreactor.graph_btn'); ?></a></li>
      <li><a data-toggle="pill" href="#data_list"><?php echo app('translator')->get('bioreactor.data_pt_list_btn'); ?></a></li>
    </ul>

    <div class="tab-content">
      <div id="data_graph" class="tab-pane fade in active">
         <canvas id="chart_canvas"></canvas>
      </div>
      <div id="data_list" class="tab-pane fade">
        <div class="table table-condensed table-responsive">
          <table class="table table-fixed">
            <thead>
              <tr class="info">
                <th class="col-xs-8"><?php echo app('translator')->get('bioreactor.date_time_head'); ?></th>
                <th class="col-xs-4"><?php echo e($value_label); ?></th>
              </tr>
            </thead>
            <tbody>
<?php foreach($dbdata as $measurement): ?>
              <tr>
                <td class="col-xs-8"><?php echo e($measurement->recorded_on); ?> UTC</td>
                <td class="col-xs-4"><?php echo e($measurement[$value_field]); ?></td>
              </tr>
<?php endforeach; ?>
            </tbody>
          </table>
         </div>
       </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<!--
value_field ¦<?php echo e($value_field); ?>¦
value_label ¦<?php echo e($value_label); ?>¦
id ¦<?php echo e($id); ?>¦
bioreactor name ¦<?php echo e($bioreactor['name']); ?>¦
interval_count ¦<?php echo e($interval_count); ?>¦
<?php foreach($sensors as $sensor_name => $sensor): ?>
sensor name ¦<?php echo e($sensor_name); ?>¦
end_datetime ¦<?php echo e($sensor['end_datetime']); ?>¦
point_count ¦<?php echo e($sensor['point_count']); ?>¦
point count xy ¦<?php echo e(count( $sensor['xy_data'] )); ?>¦
<?php endforeach; ?>
dbdata count <?php echo e(count( $dbdata )); ?> -->

<?php /* only a single entry, but easy way to get the sensor name key */ ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php echo $__env->make('common_line_chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- get the pieces to use for the current sensor type -->
<?php echo $__env->make('MyBio.common_' . $sensor_name . '_charts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; ?>

<script>
/*global $*/
/*jslint browser, devel */

(function () {
    "use strict";
    var bin = document.com.solarbiocells.biomonitor.bin;
    // The raw data points that will be used with whatever chart is being displayed
<?php foreach($sensors as $sensor_name => $sensor): ?>
<? $idx = 0; ?><?php /*  add ', ' before each new entry, except for the first */ ?>
    var graphPoints = [<?php foreach($sensor['xy_data'] as $pt): ?><?php if($idx++ !== 0): ?>, <?php endif; ?>{x: <?php echo e($pt['x']); ?>000, y: <?php echo e($pt['y']); ?>}<?php endforeach; ?>];
<?php endforeach; ?>
    bin.populateScatterChart("chart_canvas", "full", "<?php echo e($sensor_name); ?>", graphPoints);
}());// anonymous function()
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>