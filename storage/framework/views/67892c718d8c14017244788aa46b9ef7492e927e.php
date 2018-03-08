<?php $__env->startSection('content'); ?>

<div class="panel panel-success">
  <div class="panel panel-primary">
    <div class="panel-heading"><?php echo app('translator')->get('menus.about_header'); ?></div>
    <div class="panel-body">
      <div class="row">
	      <div class="col-sm-6">
	        <b>Solar BioCells</b><br><b>2500 University Drive NW, EEEL 509</b><br>
	        <b>Calgary, AB</b><br>
	        <b>T2N 1N4</b><br>
	      </div>
	      <div class="col-sm-6">
	        <?php echo app('translator')->get('messages.email'); ?><b>info@solarbiocells.com</b><br>
	        <?php echo app('translator')->get('messages.phone'); ?><b>+1 (403) 220-6604 </b><br>
	      </div>
      </div>
    </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>