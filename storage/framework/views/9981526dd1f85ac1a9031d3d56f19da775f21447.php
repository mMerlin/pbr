

<?php $__env->startSection('content'); ?>

<div class="panel panel-primary" style="width:600px">
	<div class="panel-heading">
	 <?php echo e($header_title); ?>

	</div>

	<div class="panel-body">


<?php echo Form::model($bioreactor, array('class' => 'form')); ?>


<?php echo Form::hidden('id', null); ?> 

<?php if($bioreactor->id < '1'): ?>
<div class="form-group">
    <?php echo Form::label('Device ID'); ?>

    <?php echo Form::text('deviceid', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Device ID')); ?>

</div>
<?php endif; ?>

<div class="form-group">
    <?php echo Form::label('Name'); ?>

    <?php echo Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Name')); ?>

    <?php echo Form::label('City'); ?>

    <?php echo Form::text('city', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'City')); ?>

    <?php echo Form::label('Country'); ?>

    <?php echo Form::text('country', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Country')); ?>

</div>

<div class="form-group">
    <?php echo Form::label('Latitude'); ?>

    <?php echo Form::text('latitude', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Latitude')); ?>


    <?php echo Form::label('Longitude'); ?>

    <?php echo Form::text('longitude', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Longitude')); ?>

</div>

<div class="form-group">
    <?php echo Form::label('System E-mail Address'); ?>

    <?php echo Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'E-mail address')); ?>

</div>


<div class="form-group">
    <?php echo Form::submit('Save', 
      array('class'=>'btn btn-primary')); ?>

	  &nbsp;
<a href="/bioreactors">
    <?php echo Form::button('Cancel', 
      array('class'=>'btn')); ?>

</a>
</div>
<?php echo Form::close(); ?>


	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>