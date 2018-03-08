

<?php $__env->startSection('content'); ?>

<div class="panel panel-default" style="border-color:blue">
	<div class="panel-body">
		<div class="tab-content" style="margin-left:0.5em;margin-bottom:0.5em">
			<a href="/user"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button></a>
			&nbsp;&nbsp;
			<a href="/users/excel"><button type="button" class="btn btn-success btn-sm">Excel&nbsp;<span class="glyphicon glyphicon-download-alt"></span></button></a>
		</div>
		<div class="tab-content">

			<div class="table table-condensed table-responsive">          
			<table class="table">
				<thead>
					<tr class="info">
						<th>Edit</th>
						<th>Del</th>
						<th>Name</th>
						<th>Email</th>
						<th>Device ID</th>
						<th>Admin</th>
						<th>Created On</th>
						<th>Last Updated</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($dbdata as $user): ?>
					<tr>
					    <td><a href="/user/<?php echo e($user->id); ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
						<td><a href="/user/delete/<?php echo e($user->id); ?>"><button type="button" class="btn btn-success btn-xs" onClick='return(deleteOkPrompt("<?php echo e($user->name); ?>","<?php echo e($user->email); ?>"))'><span class="glyphicon glyphicon-remove"></span></button></a></td>
						<td><?php echo e($user->name); ?></td>
						<td><?php echo e($user->email); ?></td>
						<td><?php echo e($user->deviceid); ?></td>

						<td><?php if( $user->isadmin ): ?> Yes <?php else: ?> &nbsp; <?php endif; ?> </td>
						<td><?php echo e($user->created_at); ?></td>
						<td><?php echo e($user->updated_at); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			</div>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
<script type="text/javascript">
function deleteOkPrompt(name, email)
{
	if (confirm('Are you sure you want to delete this user?\nName ['+name+']\nEmail ['+email+']')) {
		// do it!
		return true;
	} else {
	    // Do nothing!
		return false;
	}
	return false;
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>