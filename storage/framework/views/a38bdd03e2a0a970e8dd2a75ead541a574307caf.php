

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('partials.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> <?php echo e($title); ?></h3>
		</div>
		<form method="POST" action="<?php echo e(route('licences.store')); ?>">
			<?php echo csrf_field(); ?>
			<?php echo method_field('post'); ?>
			<div class="card-body">
				<div class="from-group">
					<label>Codigo de Activacion:</label>
					<input type="text" name="code" class="form-control" />
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-success"><i class="fas fa-save"></i> Activar</button>
				<a class="btn btn-danger" href="<?php echo e(route('licences.index')); ?>"><i class="fas fa-arrow-left"></i> Cancelar</a>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/licences/activate.blade.php ENDPATH**/ ?>