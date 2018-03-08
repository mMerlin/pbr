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
<!-- { { $measurement }} -->
<?php foreach($dbdata as $measurement): ?>
              <tr>
                <td class="col-xs-8"><?php echo e($measurement->recorded_on); ?></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<!--
route ¦<?php echo e($route); ?>¦
sensor_name ¦<?php echo e($sensor_name); ?>¦
value_field ¦<?php echo e($value_field); ?>¦
value_label ¦<?php echo e($value_label); ?>¦
id ¦<?php echo e($id); ?>¦
bioreactor name ¦<?php echo e($bioreactor['name']); ?>¦
end_datetime ¦<?php echo e($end_datetime); ?>¦
point_count ¦<?php echo e($point_count); ?>¦
interval_count ¦<?php echo e($interval_count); ?>¦
point count xy <?php echo e(count( $xy_data )); ?>

dbdata count <?php echo e(count( $dbdata )); ?> -->

<!-- TODO move back to 'common_line_chart' -->
<?php echo $__env->make('common_line_chart2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- get the pieces to use for the current sensor type -->
<!--
  sensor_view ¦<?php echo e($sensor_view); ?>¦
  sensor_type ¦<?php echo e($sensor_type); ?>¦
  @include('<?php echo e($sensor_view); ?>.common_<?php echo e($sensor_type); ?>_charts') -->
<?php echo $__env->make($sensor_view . '.common_' . $sensor_type . '_charts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>

var sensorDataSet = [ $.extend( true, {}, baseDataset, fullDataset, {
  data: graphPoints,
})];
// full_<?php echo e($sensor_name); ?>Options
var graphOptions = $.extend( true, {}, baseOptions, fullOptions, <?php echo e($sensor_name); ?>Options);

var ctx = document.getElementById("chart_canvas").getContext("2d");
var sensorGraph = new Chart( ctx, {
    type: 'scatter',
    data: {
        datasets: sensorDataSet
    },
    options: graphOptions
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>