<?php $__env->startSection('content'); ?>
<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => true), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body collapse navbar-collapse">
    <ul class="nav navbar-nav" id="graph-list">
      <li><a href='#' data-toggle="modal" data-target="#gasflow_modal"><canvas id="gasflow_canvas"></canvas></a></li>
      <li><a href='#' data-toggle="modal" data-target="#light_modal"><canvas id="light_canvas"></canvas></a></li>
      <li><a href='#' data-toggle="modal" data-target="#temp_modal"><canvas id="temp_canvas"></canvas></a></li>
      <li><a href='#' data-toggle="modal" data-target="#ph_modal"><canvas id="ph_canvas"></canvas></a></li>
    </ul>
  </div>
</div>

<?php echo $__env->renderEach('Test.sensor_graph', $sensors, 'sensor'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <?php echo $__env->make('common_line_chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('GasFlows.common_gasflow_graphs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('LightReadings.common_lightreading_graphs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('Temperatures.common_temperature_graphs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('PhReadings.common_phreading_graphs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->renderEach('Global.sensor_graph_js', $sensors, 'sensor'); ?>

  <?php echo $__env->make('common_single_map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>