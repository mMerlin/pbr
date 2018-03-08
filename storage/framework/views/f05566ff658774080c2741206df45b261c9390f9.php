<div class="modal fade" id="<?php echo e($sensor['name']); ?>_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo e($sensor['title']); ?> Ending at: <?php echo e($sensor['end_datetime']); ?></h4>
      </div>
      <div class="modal-body">
        <div style='width:500px;height:300px'><canvas id="big_<?php echo e($sensor['name']); ?>_canvas"></canvas></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
