<?php /*
css based on (wrapper) ul id sensor-list used to control layout
*/ ?>
      <li>
        <h4><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor['name']); ?>_modal"><canvas id="<?php echo e($sensor['name']); ?>_canvas"></canvas></a>
        <div>
          <a href="/my<?php echo e($sensor['name']); ?>s"><button type="button" class="btn-success btn-xs">3 Hours</button></a>
          <a href="/my<?php echo e($sensor['name']); ?>s/24"><button type="button" class="btn-success btn-xs">24 Hours</button></a>
        </div>
      </li>
