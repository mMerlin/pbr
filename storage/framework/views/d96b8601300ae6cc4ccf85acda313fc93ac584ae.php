<?php $__env->startSection('content'); ?>

<div class="panel panel-primary">

  <?php echo $__env->make('common_detail_header', array('show_map' => true), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="panel-body">
    <div class="row" id="sensor-list">
<?php 
function clearForBlock($seq)
{
    $classes = "clearfix";
    if($seq % 4 === 0) {
      $classes .= " visible-sm-block";
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
<?php if(($i > 0 )&&(( $i % 4 === 0 )||( $i % 6 === 0))): ?>
      <div class="<?php echo e(clearForBlock($i)); ?>"><!-- <?php echo e($i); ?> --></div>
<?php endif; ?>
      <div class="col-sm-3 col-lg-2">
        <h4 class="text-center"><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor_name); ?>_modal"><canvas id="<?php echo e($sensor_name); ?>_canvas"></canvas></a>
<?php if($show_button): ?>
        <div class="row small-gutter">
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

<?php if( isset($show_inline) && $show_inline ): ?>
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

                <?php echo Form::number('hours', null, array('placeholder' => '3', 'style' => 'width: 5em;')); ?>

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

                <?php echo Form::submit(Lang::get( 'bioreactor.graph_submit' ), array('class'=>'btn btn-success btn-sm','name'=>'submit_inline')); ?>

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
    <h4><?php echo e(Lang::get( 'bioreactor.bad_graph_select' )); ?></h4>
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
<div class="modal fade" id="raw_data_export_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo Form::open(array('url' => '/export', 'name' => 'data_export')); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo app('translator')->get('export.raw_to_spreadsheet_title'); ?></h4>
        </div><!-- .modal-header -->
        <div class="modal-body container col-sm-12">
          <div class="row small-gutter">
            <div class="form-group">
<?php foreach($sensors as $sensor_name => $sensor): ?>
              <div class="col-sm-3">
                <?php echo Form::label( $sensor_name . '_readings', Lang::get( 'export.' . $sensor_name . '_select' )); ?>

                <?php echo Form::radio( 'datatype_to_excel', $sensor_name, $sensor_name == 'oxygen', array( 'id' => $sensor_name . '_readings' )); ?>

              </div><!-- .col- -->
<?php endforeach; ?>
            </div><!-- .form-group -->
          </div><!-- .row -->
          <div class="row">
            <div class="col-sm-6">
              <?php echo Form::label('start_date', Lang::get( 'export.enter_start_date' )); ?>

              <?php echo Form::date('start_date', \Carbon\Carbon::now()); ?>

            </div><!-- .col- -->
            <div class="col-sm-6">
              <?php echo Form::label('end_date', Lang::get( 'export.enter_end_date' )); ?>

              <?php echo Form::date('end_date', \Carbon\Carbon::now()); ?>

            </div><!-- .col- -->
          </div><!-- .row -->
        </div><!-- .modal-body -->

        <div class="modal-footer">
          <?php echo e(Form::hidden('timezone_offset', 'tz0')); ?>

          <?php echo Form::submit(Lang::get( 'export.start_export' ), array('class'=>'btn btn-success btn-sm', 'name' => 'submit_export')); ?>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div><!-- .modal-foooter -->
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
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->
<?php endif; ?>

<?php if( isset($show_graph) && $show_graph ): ?>
<div class="modal fade" id="full_graph" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo Form::open(array('action' => array('GlobalController@formgraph', $id), 'name' => 'graph_options2')); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo app('translator')->get('bioreactor.fullgraph_title'); ?></h4>
        </div><!-- .modal-header -->

        <div class="modal-body container col-sm-12">
          <div class="row">
            <div class="col-sm-3">
              <fieldset>
                <legend class="text-center"><?php echo e(Lang::get( 'bioreactor.graph_type_legend' )); ?></legend>
<?php ($i = 0); ?>
<?php foreach($sensors as $sensor_name => $sensor): ?>
<?php ($i++); ?>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::radio( 'sensor_to_graph', $sensor_name, $sensor_name == 'oxygen', array( 'id' => $sensor_name . '_graph2' )); ?>

                    <?php echo Form::label( $sensor_name . '_graph2', Lang::get( 'export.' . $sensor_name . '_select' )); ?>

                  </div>
                </div>
<?php endforeach; ?>
              </fieldset>
            </div>
            <div class="col-sm-3">
              <fieldset>
                <legend class="text-center"><?php echo e(Lang::get( 'bioreactor.interval_legend' )); ?></legend>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::radio( 'graph_interval', '3', true, array( 'id' => 'int_3_hrs2' )); ?>

                    <?php echo Form::label( 'int_3_hrs2', Lang::get( 'bioreactor.interval_3_hours' )); ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::radio( 'graph_interval', '24', false, array( 'id' => 'int_24_hrs2' )); ?>

                    <?php echo Form::label( 'int_24_hrs2', Lang::get( 'bioreactor.interval_1_day' )); ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::radio( 'graph_interval', '168', false, array( 'id' => 'int_168_hrs2' )); ?>

                    <?php echo Form::label( 'int_168_hrs2', Lang::get( 'bioreactor.interval_1_week' )); ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::radio( 'graph_interval', 'custom', false, array( 'id' => 'int_input_hrs2' )); ?>

                    <?php echo Form::label( 'int_input_hrs2', Lang::get( 'bioreactor.interval_custom' )); ?>

                  </div>
                </div>
              </fieldset>
            </div>
            <div class="col-sm-6">
              <fieldset>
                <legend>&nbsp;</legend>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::label('hours2', Lang::get( 'bioreactor.custom_interval' )); ?>

                    <?php echo Form::number('hours2', null, array('placeholder' => '3', 'style' => 'width: 5em;')); ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo Form::label('graph_end_date2', Lang::get( 'export.enter_end_date' )); ?>

                    <?php /* Carbon is way more flexible than any of the html date and time input types.  Just use plain text, and let laravel handle it */ ?>
                    <?php echo Form::text('graph_end_date2', \Carbon\Carbon::now(), array('style' => 'width: 100%;')); ?>

                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div><!-- .modal-body -->

        <div class="modal-footer">
          <?php echo e(Form::hidden('utc_time_now2', \Carbon\Carbon::now()->format('Y-m-d\TH:iO'))); ?>

          <?php echo e(Form::hidden('timezone_offset', 'tz0')); ?>

          <?php echo Form::submit(Lang::get( 'bioreactor.graph_submit' ), array('class'=>'btn btn-info btn-sm','name'=>'submit_graph')); ?>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div><!-- .modal-foooter -->
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
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->
<?php endif; ?>

<?php foreach($sensors as $sensor_name => $sensor): ?>
<div class="modal fade" id="<?php echo e($sensor_name); ?>_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom:3px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center modal_chart_title"> &nbsp; <?php echo app('translator')->get('bioreactor.' . $sensor_name . '_chart_title_big'); ?></h4>
      </div>
      <div class="modal-body" style="padding-top:3px;padding-bottom:5px;">
        <div style='width:100%;height:280px'><canvas id="big_<?php echo e($sensor_name); ?>_canvas"></canvas></div>
      </div>
      <div class="modal-footer" style="padding-top:5px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>

<?php /* without specifying $sensor_name :: will be last from previous foreach */ ?>
<?php echo $__env->make('common_line_chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<? $idx = 0; ?><?php /*  add ', ' before each new entry, except for the first */ ?>
    base.<?php echo e($sensor_name); ?>Points = [<?php foreach($sensor['xy_data'] as $pt): ?><?php if($idx++ !== 0): ?>, <?php endif; ?>{x: <?php echo e($pt['x']); ?>000, y: <?php echo e($pt['y']); ?>}<?php endforeach; ?>];
    bin.populateScatterChart("<?php echo e($sensor_name); ?>_canvas", "small", "<?php echo e($sensor_name); ?>", base.<?php echo e($sensor_name); ?>Points);
<?php endforeach; ?>

    // Populate each of the big graph canvases after the rest of the document loads
    $(document).ready(function () {
<?php foreach($sensors as $sensor_name => $sensor): ?>
        $("#<?php echo e($sensor_name); ?>_modal").on("shown.bs.modal", function () {
            bin.populateScatterChart("big_<?php echo e($sensor_name); ?>_canvas", "big", "<?php echo e($sensor_name); ?>", base.<?php echo e($sensor_name); ?>Points);
        });
<?php endforeach; ?>
    });

    // Fill in user (actually browser) timezone information, to help out with
    // generic date values.
    // TODO to do this **properly** need the offset for the actual entered date
    //  values (pre submit), since they could be on different sides of a
    //  daylight savings change
    // TODO or even convert to UTC here, so server does not need to consider time zones
    $("[name='timezone_offset']").each(function(idx){
      $(this)["value"] = (new Date()).getTimezoneOffset();
    })

    var end_fields = $("[name='graph_end_date']");
    if (end_fields.length > 0 ) {
      $(end_fields)[0]["value"] = bin.fmtLocalDateTime(new Date($("[name='utc_time_now']")[0]['value']));
    }
    // TODO: either remove one of these, or use foreach
    var end_fields = $("[name='graph_end_date2']");
    if (end_fields.length > 0 ) {
      $(end_fields)[0]["value"] = bin.fmtLocalDateTime(new Date($("[name='utc_time_now2']")[0]['value']));
    }
}());// anonymous function()
</script>

<?php echo $__env->make('common_single_map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>