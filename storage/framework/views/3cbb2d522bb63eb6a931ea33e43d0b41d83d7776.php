  <div class="panel-heading">
    <div class="row">
      <div class="col-sm-4">
         <?php echo app('translator')->get('export.bioreactor_name_label'); ?><b><?php echo e($bioreactor->name); ?></b><br>
         <?php echo app('translator')->get('export.bioreactor_city_label'); ?><b><?php echo e($bioreactor->city); ?></b><br>
         <?php echo app('translator')->get('export.bioreactor_cntry_label'); ?><b><?php echo e($bioreactor->country); ?></b><br>
      </div>
      <div class="col-sm-3">
        <?php echo app('translator')->get('export.bioreactor_id_label'); ?><b><?php echo e($bioreactor->deviceid); ?></b><br>
        <?php echo app('translator')->get('export.bioreactor_email_label'); ?><b><?php echo e($bioreactor->email); ?></b><br>
      </div>
      <div class="col-sm-5">
        <div class="row">
          <div class="col-sm-6">
<?php if( isset($show_map) && $show_map ): ?>
            <div id="map_canvas" style="width:100%;height:120px"></div>
<?php endif; ?>
          </div>
          <div class="col-sm-6">
<?php if( isset($show_excel) && $show_excel ): ?>
            <a class="btn btn-success btn-sm" href='#' data-toggle="modal" data-target="#raw_data_export_modal">
              <?php echo app('translator')->get('export.raw_to_spreadsheet_btn'); ?> <span class="glyphicon glyphicon-download-alt"></span>
            </a>
<?php endif; ?>
<?php if( isset($show_graph) && $show_graph ): ?>
            <a class="btn btn-info btn-sm" href='#' data-toggle="modal" data-target="#full_graph">
              <?php echo app('translator')->get('bioreactor.fullgraph_btn'); ?> <span class="fa fa-bar-chart-o"></span>
            </a>
<?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
