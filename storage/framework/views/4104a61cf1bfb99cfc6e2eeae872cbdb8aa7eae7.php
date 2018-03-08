<?php /*
Notes that do not get exported to the generated html

css based on (wrapper) ul id sensor-list used to control formatting
*/ ?>
      <li>
        <h4><?php echo e($sensor['title']); ?></h4>
        <a href='#' data-toggle="modal" data-target="#<?php echo e($sensor['name']); ?>_modal"><canvas id="<?php echo e($sensor['name']); ?>_canvas"></canvas></a>
      </li>
