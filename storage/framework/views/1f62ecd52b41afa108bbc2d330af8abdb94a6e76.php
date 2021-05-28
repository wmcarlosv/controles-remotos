

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('partials.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card card-success">
    	<div class="card-header">
    		<h3><i class="fas fa-id-card"></i> <?php echo e($title); ?></h3>
    	</div>
    	<form class="form" action="<?php echo e(route('update_profile')); ?>" method="POST">
    		<?php echo e(csrf_field()); ?>

    		<?php echo e(method_field('PUT')); ?>

	    	<div class="card-body">	    		
    			<div class="form-group">
    				<label>Nombre: </label>
    				<input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control" />
    			</div>
    			<div class="form-group">
    				<label>Telefono: </label>
    				<input type="text" name="phone" value="<?php echo e(Auth::user()->phone); ?>" class="form-control" />
    			</div>
                <div class="form-group">
                    <label>Correo: </label>
                    <input type="text" name="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" />
                </div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar Perfil</button>
	    	</div>
    	</form>
    </div>

    <div class="card card-success">
    	<div class="card-header">
    		<h3><i class="fas fa-sync-alt"></i> Cambiar Clave</h3>
    	</div>
    	<form class="form" method="POST" action="<?php echo e(route('change_password')); ?>">
	    	<div class="card-body">
				<?php echo e(method_field('PUT')); ?>

				<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<label>Nueva Clave:</label>
					<input type="password" name="password" class="form-control" />
				</div>
				<div class="form-group">
					<label>Repita la Clave:</label>
					<input type="password" name="password_confirmation" class="form-control" />
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar Clave</button>
	    	</div>
    	</form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>