<?php $__env->startSection('content'); ?>

<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => true, 'show_excel' => $show_excel), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body">
    <div class="row" id="sensor-list3">
<?php 
function clearForBlock($seq)
{
    $classes = "clearfix";
    if($seq % 3 === 0) {
      $classes .= " visible-sm-block";
    }
    if($seq % 4 === 0) {
      $classes .= " visible-md-block";
    }
    if($seq % 6 === 0) {
      $classes .= " visible-lg-block";
    }
    return $classes;
}
$i = -1;
 ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php ($i++); ?>
<?php if(($i > 0 )&&(( $i % 3 === 0 )||( $i % 4 === 0))): ?>
      <div class="<?php echo e(clearForBlock($i)); ?>"><!-- <?php echo e($i); ?> --></div>
<?php endif; ?>
      <div class="col-sm-4 col-md-3 col-lg-2">
        <h4><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor_name); ?>_modal"><canvas id="<?php echo e($sensor_name); ?>_canvas"></canvas></a>
<?php if($show_button): ?>
        <div class="row">
          <div class="col-sm-4">
            <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>"><?php echo app('translator')->get('bioreactor.recent_3_hours'); ?></a>
          </div>
          <div class="col-sm-4">
            <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>/24"><?php echo app('translator')->get('bioreactor.recent_1_day'); ?></a>
          </div>
          <div class="col-sm-4">
            <a class="btn-success btn-xs" href="<?php echo e($sensor['route']); ?>/168"><?php echo app('translator')->get('bioreactor.recent_1_week'); ?></a>
          </div>
        </div>
<?php endif; ?>
      </div>
<?php endforeach; ?>
    </div>

<?php if( isset($show_graph) && $show_graph ): ?>
    <div class="row">
      <h4 class="text-center"><?php echo e(Lang::get( 'bioreactor.graph_form_title' )); ?></h4>
      <?php echo Form::open(array('action' => array('GlobalController@formgraph', $id), 'name' => 'graph_options')); ?>

        <div class="col-sm-4 col-md-3 col-lg-3">
          <fieldset>
            <legend class="text-center"><?php echo e(Lang::get( 'bioreactor.graph_type_legend' )); ?></legend>
<?php ($i = 0); ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php ($i++); ?>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::radio( 'sensor_to_graph', $sensor_name, $sensor_name == 'oxygen', array( 'id' => $sensor_name . '_graph' )); ?>

                <?php echo Form::label( $sensor_name . '_graph', Lang::get( 'export.' . $sensor_name . '_select' )); ?>

              </div>
            </div>
<?php endforeach; ?>
          </fieldset>
        </div>
        <div class="col-sm-2">
          <fieldset>
            <legend class="text-center"><?php echo e(Lang::get( 'bioreactor.interval_legend' )); ?></legend>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::radio( 'graph_interval', '3', true, array( 'id' => 'int_3_hrs' )); ?>

                <?php echo Form::label( 'int_3_hrs', Lang::get( 'bioreactor.interval_3_hours' )); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::radio( 'graph_interval', '24', false, array( 'id' => 'int_24_hrs' )); ?>

                <?php echo Form::label( 'int_24_hrs', Lang::get( 'bioreactor.interval_1_day' )); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::radio( 'graph_interval', '168', false, array( 'id' => 'int_168_hrs' )); ?>

                <?php echo Form::label( 'int_168_hrs', Lang::get( 'bioreactor.interval_1_week' )); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::radio( 'graph_interval', 'custom', false, array( 'id' => 'int_input_hrs' )); ?>

                <?php echo Form::label( 'int_input_hrs', Lang::get( 'bioreactor.interval_custom' )); ?>

              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-sm-6 col-md-4">
          <fieldset>
            <legend>&nbsp;</legend>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::label('hours', Lang::get( 'bioreactor.custom_interval' )); ?>

                <?php echo Form::number('hours', null, array('optional', 'placeholder' => '3', 'style' => 'width: 5em;')); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo Form::label('graph_end_date', Lang::get( 'export.enter_end_date' )); ?>

                <?php /* Carbon is way more flexible than any of the html date and time input types.  Just use plain text, and let laravel handle it */ ?>
                <?php echo Form::text('graph_end_date', \Carbon\Carbon::now(), array('style' => 'width: 100%;')); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <?php echo e(Form::hidden('utc_time_now', \Carbon\Carbon::now()->format('Y-m-d\TH:iO'))); ?>

                <?php echo e(Form::hidden('timezone_offset', 'tz0')); ?>

                <?php echo Form::submit(Lang::get( 'bioreactor.graph_submit' ), array('class'=>'btn btn-success btn-sm','name'=>'submit_graph')); ?>

              </div>
            </div>
          </fieldset>
        </div>
      <?php echo Form::close(); ?>

    </div>
<?php endif; ?>
  </div>
<?php if( isset($show_graph) && $show_graph ): ?>
  <div class="panel-footer">
<?php if(count($errors) > 0): ?>
    <h4>Invalid Data</h4>
    <ul class="alert alert-danger">
<?php foreach($errors->all() as $er): ?>
      <li><?php echo e($er); ?></li>
<?php endforeach; ?>
    </ul>
<?php endif; ?>
  </div>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal_insert'); ?>
<?php if($show_excel): ?>
<div class="modal fade modal-dialog modal-content" id="raw_data_export_modal" role="dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><?php echo app('translator')->get('export.raw_to_spreadsheet_title'); ?></h4>
  </div>
  <div class="modal-body">

    <?php echo Form::open(array('url' => '/export', 'name' => 'data_export')); ?>

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
                <?php echo Form::label('start_date', Lang::get( 'export.enter_start_date' )); ?>

                <?php echo Form::date('start_date', \Carbon\Carbon::now()); ?>

              </td>
              <td>
                <?php echo Form::label('end_date', Lang::get( 'export.enter_end_date' )); ?>

                <?php echo Form::date('end_date', \Carbon\Carbon::now()); ?>

              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="modal-footer">
        <?php echo e(Form::hidden('timezone_offset', 'tz0')); ?>

        <?php echo Form::submit(Lang::get( 'export.start_export' ), array('class'=>'btn btn-success btn-sm', 'name' => 'submit_export')); ?>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    <?php echo Form::close(); ?>

<?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <ul>
<?php foreach($errors->all() as $error): ?>
          <li><?php echo e($error); ?></li>
<?php endforeach; ?>
        </ul>
      </div>
<?php endif; ?>
  </div>
</div>
<?php endif; ?>

<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php echo $__env->make('Global.sensor_graph', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<?php /* without specifying $sensor_name :: will be last from previous foreach */ ?>
<?php echo $__env->make('common_line_chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php if(stream_resolve_include_path('MyBio.common_' . $sensor_name . '_charts')): ?>
<?php echo $__env->make('MyBio.common_' . $sensor_name . '_charts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
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

    // Fill in user (actually browser) timezone information, to help out with
    // generic date values.
    // TODO to do this **properly** need the offset for the actual entered date
    //  values (pre submit), since they could be on different sides of a
    //  daylight savings change
    // TODO or even convert to UTC here, so server does not need to consider time zones
    $("[name='timezone_offset']").each(function(idx){
      $(this)["value"] = (new Date()).getTimezoneOffset();
    })

    $("[name='graph_end_date']")[0]["value"] = bin.fmtLocalDateTime(new Date($("[name='utc_time_now']")[0]['value']));
}());// anonymous function()
</script>

<?php echo $__env->make('common_single_map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>