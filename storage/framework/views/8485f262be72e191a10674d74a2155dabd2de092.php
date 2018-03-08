<?php $__env->startSection('content'); ?>

<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => true, 'show_excel' => true), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body navbar-collapse">
    <ul class="nav navbar-nav" id="sensor-list">
<?php foreach($sensors as $sensor): ?>
      <li>
        <h4><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor['name']); ?>_modal"><canvas id="<?php echo e($sensor['name']); ?>_canvas"></canvas></a>
        <div>
          <a class="btn-success btn-xs" href="/my<?php echo e($sensor['graph']); ?>s">3 Hours</a>
          <a class="btn-success btn-xs" href="/my<?php echo e($sensor['graph']); ?>s/24">24 Hours</a>
        </div>
      </li>
<?php endforeach; ?>
<!-- each('MyBio.sensor_menu', $sensors, 'sensor') -->
    </ul>
  </div>
</div>

<div class="modal fade" id="raw_data_export_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Raw Data Export to Excel</h4>
      </div>
      <div class="modal-body">
        <?php echo Form::open(array('url' => '/export')); ?>


        <div class="form-group">
          <div class="table table-condensed table-responsive">
            <table class="table">
              <tr class="info">
                <td>
                  <?php echo Form::label('gasflow_readings', 'Gas Flow Readings '); ?>

                  <?php echo Form::radio('datatype_to_excel', 1, true, array('id'=>'gasflow_readings')); ?>

                </td>
                <td>
                  <?php echo Form::label('light_readings'); ?>

                  <?php echo Form::radio('datatype_to_excel', 2, false, array('id'=>'light_readings')); ?>

                </td>
                <td>
                  <?php echo Form::label('temp_readings', 'Temperature Readings '); ?>

                  <?php echo Form::radio('datatype_to_excel', 3, false, array('id'=>'temp_readings')); ?>

                </td>
                <td>
                  <?php echo Form::label('ph_readings', 'pH Readings'); ?>

                  <?php echo Form::radio('datatype_to_excel', 2, false, array('id'=>'ph_readings')); ?>

                </td>
              </tr>
            </table>
          </div>
          <div class="table table-condensed table-responsive">
            <table class="table">
              <tr class="info">
                <td>
                  <?php echo Form::label('start_date'); ?>

                  <?php echo Form::date('start_date', \Carbon\Carbon::now()); ?>

                </td>
                <td>
                  <?php echo Form::label('end_date'); ?>

                  <?php echo Form::date('end_date', \Carbon\Carbon::now()); ?>

                </td>
              </tr>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <?php echo Form::submit('Go', array('class'=>'btn btn-success btn-sm')); ?>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>

<?php echo $__env->renderEach('Global.sensor_graph', $sensors, 'sensor'); ?>

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