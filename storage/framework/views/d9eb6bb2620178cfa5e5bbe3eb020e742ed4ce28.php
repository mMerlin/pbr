

<?php $__env->startSection('content'); ?>

<div class="panel panel-default" style="border-color:blue">
	<div class="panel-body">
		<div class="tab-content" style="margin-left:0.5em;margin-bottom:0.5em">
			<a href="/bioreactor"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button></a>
			&nbsp;&nbsp;
			<a href="/bioreactors/excel"><button type="button" class="btn btn-success btn-sm">Excel&nbsp;<span class="glyphicon glyphicon-download-alt"></span></button></a>
		</div>
		<div class="tab-content">

			<div class="table table-condensed table-responsive">          
			<table class="table">
				<thead>
					<tr class="info">
						<th>Edit</th>
						<th>Del</th>
						<th>Name</th>
						<th>Device ID</th>
						<th>City</th>
						<th>Country</th>
						<th>Last Data Sync</th>
						<th>Created On</th>
						<th>Last Updated</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($dbdata as $bioreactor): ?>
					<tr>
					    <td><a href="/bioreactor/<?php echo e($bioreactor->id); ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
						<td><a href="/bioreactor/delete/<?php echo e($bioreactor->id); ?>"><button type="button" class="btn btn-success btn-xs" onClick='return(deleteOkPrompt("<?php echo e($bioreactor->name); ?>","<?php echo e($bioreactor->deviceid); ?>"))'><span class="glyphicon glyphicon-remove"></span></button></a></td>
						<td><?php echo e($bioreactor->deviceid); ?></td>
						<td><?php echo e($bioreactor->name); ?></td>
						<td><?php echo e($bioreactor->city); ?></td>
						<td><?php echo e($bioreactor->country); ?></td>
						<td><?php echo e($bioreactor->last_datasync_at); ?></td>

						<td><?php echo e($bioreactor->created_at); ?></td>
						<td><?php echo e($bioreactor->updated_at); ?></td>
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
function deleteOkPrompt(name, deviceid)
{
	if (confirm('Are you sure you want to delete this Bioreactor?\nName ['+name+']\nDevice ID ['+deviceid+']')) {
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