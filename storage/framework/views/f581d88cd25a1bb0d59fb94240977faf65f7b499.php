

<?php $__env->startSection('content'); ?>

<div class="panel panel-primary" style="width:600px">
	<div class="panel-heading">
	 <?php echo e($header_title); ?>

	</div>

	<div class="panel-body">


<?php echo Form::model($user, array('class' => 'form')); ?>


<?php echo Form::hidden('id', null); ?> 

<div class="form-group">
    <?php echo Form::label('Name'); ?>

    <?php echo Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Name')); ?>

</div>

<div class="form-group">
    <?php echo Form::label('E-mail Address'); ?>

    <?php echo Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'E-mail address')); ?>

</div>

<?php if($user->id < '1'): ?>
<div class="form-group">
    <?php echo Form::label('Password'); ?>

    <?php echo Form::text('password', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Password')); ?>

</div>
<?php endif; ?>

<div class="form-group">
    <?php echo Form::label('Administrator'); ?>

	<?php echo Form::checkbox('isadmin'); ?>

</div>

<div class="form-group">
    <?php echo Form::label('BioReactor'); ?>

	<?php echo Form::select('deviceid', $bioreactors ); ?>

</div>

<div class="form-group">
    <?php echo Form::submit('Save', 
      array('class'=>'btn btn-primary')); ?>

	  &nbsp;
<a href="/users">
    <?php echo Form::button('Cancel', 
      array('class'=>'btn')); ?>

</a>
</div>
<?php echo Form::close(); ?>


	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>