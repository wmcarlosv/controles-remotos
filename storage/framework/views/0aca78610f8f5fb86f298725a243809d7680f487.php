

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-users"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">
			<?php echo $__env->make('partials.new_button',['buttonRoute'=>'users.create','buttonTitle'=>'Usuario'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<table class="table table-bordered table-striped" id="users">
				<thead>
					<th>Nro.</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Rol</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Fecha Creacion</th>
					<th>Fecha Actualizacion</th>
					<th>-</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e(($loop->index + 1)); ?></td>
							<td><?php echo e($user->name); ?></td>
							<td><?php echo e($user->email); ?></td>
							<td><?php echo e($user->phone); ?></td>
							<td>
								<?php if($user->role == 'admin'): ?>
									<span class="badge badge-success">Administrador</span>
								<?php else: ?>
									<span class="badge badge-info">Ayudante</span>
								<?php endif; ?>
							</td>
							<td><?php echo e(@$user->block->name); ?></td>
							<td><?php echo e(@$user->department->name); ?></td>
							<td><?php echo e($user->created_at); ?></td>
							<td><?php echo e($user->updated_at); ?></td>
							<td>
								<a class="btn btn-info" href="<?php echo e(route('users.edit',$user->id)); ?>"><i class="fas fa-edit"></i></a>
								<?php echo $__env->make('partials.delete_button',['deleteRoute'=>'users.destroy','id'=>$user->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
		$("#users").DataTable();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/users/browse.blade.php ENDPATH**/ ?>