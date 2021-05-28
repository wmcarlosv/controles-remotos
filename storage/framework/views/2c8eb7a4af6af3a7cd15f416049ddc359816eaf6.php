

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-id-badge"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">
			<?php if($actives->count() == 0): ?>
				<a href="<?php echo e(route('licences.create')); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Nueva Licencia</a>
			<?php else: ?>
				<span class="badge badge-info" style="text-transform: uppercase;">Solo puedes tener una licencia Activa!!</span>
			<?php endif; ?>
			<br />
			<br />
			<table class="table table-bordered table-striped">
				<thead>
					<th>#</th>
					<th>Codigo</th>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Estatus</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->index); ?></td>
							<td><?php echo e($licence->code); ?></td>
							<td><?php echo e(date('d/m/Y',strtotime($licence->date_from))); ?></td>
							<td><?php echo e(date('d/m/Y',strtotime($licence->date_to))); ?></td>
							<td>
								<?php if($licence->is_active): ?>
									<span class="badge badge-success">Activo</span>
								<?php else: ?>
									<span class="badge badge-danger">Inactivo</span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script type="text/javascript">
		$("table.table").DataTable();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/licences/browse.blade.php ENDPATH**/ ?>