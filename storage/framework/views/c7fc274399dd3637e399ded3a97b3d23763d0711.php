

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('partials.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-house-user"></i> <?php echo e($title); ?></h3>
		</div>
		<?php echo $__env->make('partials.form_actions',['type'=>$type,'baseRoute'=>'departments','id'=>@$data->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="card-body">
				<div class="form-group">
					<label>Nombre:</label>
					<input type="text" name="name" class="form-control" value="<?php echo e(@$data->name); ?>" />
				</div>
				<div class="form-group">
					<label>Bloque:</label>
					<select class="form-control" name="block_id">
						<option value="">Seleccione</option>
						<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option <?php if(@$data->block_id == $block->id): ?> selected='selected' <?php endif; ?> value="<?php echo e($block->id); ?>"><?php echo e($block->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" <?php if(@$data->is_active == 1): ?> checked='checked' <?php endif; ?> value="1" name="is_active">
				    <label class="form-check-label">Activo</label>
				 </div>
			</div>
			<div class="card-footer">
				<?php echo $__env->make('partials.form_buttons',['type'=>$type,'baseRoute'=>'departments'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/departments/add_edit.blade.php ENDPATH**/ ?>