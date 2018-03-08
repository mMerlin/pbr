<?php $__env->startSection('content'); ?>

<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => true, 'show_excel' => $show_excel), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body navbar-collapse">
    <ul class="nav navbar-nav" id="sensor-list">
<?php foreach($sensors as $sensor_name => $sensor): ?>
      <li>
        <h4><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor_name); ?>_modal"><canvas id="<?php echo e($sensor_name); ?>_canvas"></canvas></a>
<?php if($show_button): ?>
        <div>
          <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>"><?php echo app('translator')->get('bioreactor.recent_3_hours'); ?></a>
          <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>/24"><?php echo app('translator')->get('bioreactor.recent_1_day'); ?></a>
          <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>/168"><?php echo app('translator')->get('bioreactor.recent_1_week'); ?></a>
        </div>
<?php endif; ?>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</div>

<?php if($show_excel): ?>
<div class="modal fade modal-dialog modal-content" id="raw_data_export_modal" role="dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><?php echo app('translator')->get('export.raw_to_spreadsheet_title'); ?></h4>
  </div>
  <div class="modal-body">

    <?php echo Form::open(array('url' => '/export')); ?>

      <div class="form-group">
        <div class="table table-condensed table-responsive">
          <table class="table">
            <tr class="info">
<?php foreach($sensors as $sensor_name => $sensor): ?>
              <td>
                <?php echo Form::label( $sensor_name . '_readings', Lang::get( 'export.' . $sensor_name . '_select' )); ?>

                <?php echo Form::radio( 'datatype_to_excel', $sensor_name, $sensor_name == 'oxygen', array( 'id' => $sensor_name . '_readings' )); ?>

              </td>
<?php endforeach; ?>
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
<?php endif; ?>

<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php echo $__env->make('Global.sensor_graph2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<?php /* without specifying $sensor_name :: will be last from previous foreach */ ?>
<?php echo $__env->make('common_line_chart2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php echo $__env->make('MyBio.common_' . $sensor_name . '_charts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; ?>

<script>
/*global $*/
/*jslint browser, devel */

(function () {
    "use strict";
    var base = document.com.solarbiocells.biomonitor;
    var bin = base.bin;

    // Populate each of the small graph canvases
<?php foreach($sensors as $sensor_name => $sensor): ?>
    base.<?php echo e($sensor_name); ?>Points = [<?php foreach($sensor['xy_data'] as $pt): ?>{x: <?php echo e($pt['x']); ?>000, y: <?php echo e($pt['y']); ?>}<?php if($pt !== end($sensor['xy_data'])): ?>, <?php endif; ?><?php /* */ ?><?php endforeach; ?>];
    bin.populateScatterChart("<?php echo e($sensor_name); ?>_canvas", "small", "<?php echo e($sensor_name); ?>", base.<?php echo e($sensor_name); ?>Points);
<?php endforeach; ?>

    // Populate each of the big graph canvases after the rest of the document loads
<?php foreach($sensors as $sensor_name => $sensor): ?>
    $(document).ready(function () {
        $("#<?php echo e($sensor_name); ?>_modal").on("shown.bs.modal", function () {
            bin.populateScatterChart("big_<?php echo e($sensor_name); ?>_canvas", "big", "<?php echo e($sensor_name); ?>", base.<?php echo e($sensor_name); ?>Points);
        });
    });
<?php endforeach; ?>
}());// anonymous function()
</script>

<?php echo $__env->make('common_single_map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>