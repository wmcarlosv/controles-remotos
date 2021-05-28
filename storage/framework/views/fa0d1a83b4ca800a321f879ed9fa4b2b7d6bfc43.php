

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>

	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-file-alt"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">
			<form>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha Desde:</label>
							<input type="date" value="<?php echo e(@$date_from); ?>" class="form-control" name="date_from" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha Hasta:</label>
							<input type="date" value="<?php echo e(@$date_to); ?>" class="form-control" name="date_to" />
						</div>
					</div>
					<div class="col-md-3" style="padding-top: 31px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Buscar</button>

					</div>
					<div class="col-md-3">
					    <div class="fomr-group" style="padding-top: 35px;">
					    	<label>Activiades</label>
					    	<span class="badge badge-success"><?php echo e(getCount('activities')); ?></span>
					    </div>
					</div>
				</div>
			</form>
			<table class="table table-bordered table-striped" id="activitys">
				<thead>
					<th>Nro.</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Numero C</th>
					<th>Codigo Boton</th>
					<th>Boton</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Eliminado</th>
					<th>/</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e(($loop->index + 1)); ?></td>
							<td><?php echo e(date('d-m-Y',strtotime($activity->created_at))); ?></td>
							<td><?php echo e(date('H:m:s',strtotime($activity->created_at))); ?></td>
							<td><?php echo e($activity->button_code); ?></td>
							<td><?php echo e($activity->block->name); ?></td>
							<td><?php echo e($activity->department->name); ?></td>
							<td><?php echo e($activity->number_c); ?></td>
							<td><?php echo e($activity->button); ?></td>
							<td>
								<?php if($activity->is_deleted == 1): ?>
									<a class="btn btn-success is_deleted" href="<?php echo e(url('/updateColumn/activities/is_deleted/0/'.$activity->id.'/activities.index')); ?>"><i class="fas fa-check"></i> Si</a>
								<?php else: ?>
									<a class="btn btn-danger is_deleted" href="<?php echo e(url('/updateColumn/activities/is_deleted/1/'.$activity->id.'/activities.index')); ?>"><i class="fas fa-times"></i> No</a>
								<?php endif; ?>
							</td>
							<td>
								<?php echo $__env->make('partials.delete_button',['deleteRoute'=>'activities.destroy','id'=>$activity->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e(@$message); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script type="text/javascript">
		$("#activitys").DataTable();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/activities/browse.blade.php ENDPATH**/ ?>