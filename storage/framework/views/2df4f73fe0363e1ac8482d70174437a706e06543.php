

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('partials.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> <?php echo e($title); ?></h3>
		</div>
		<?php echo $__env->make('partials.form_actions',['type'=>$type,'baseRoute'=>'controls','id'=>@$data->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="card-body">
				<div class="form-group">
					<label>Bloque:</label>
					<select class="form-control" name="block_id" id="block_id">
						<option value="">Seleccione</option>
						<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($block->id); ?>" <?php if(@$data->block_id == $block->id): ?> selected='selected' <?php endif; ?>><?php echo e($block->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="form-group">
					<label>Departamento:</label>
					<select class="form-control" name="department_id" id="department_id">
						<option value="">Seleccione</option>
						<?php if(@$departments): ?>
							<?php $__currentLoopData = @$departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($department->id); ?>" <?php if(@$data->department_id == $department->id): ?> selected='selected' <?php endif; ?>><?php echo e($department->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Codigo A:</label>
					<input type="text" name="code_a" value="<?php echo e(@$data->code_a); ?>" class="form-control" />
				</div>

				<div class="form-group">
					<label>Estatus A:</label>
					<select class="form-control" name="status_a">
						<option value="1" <?php if(@$data->status_a && @$data->status_a == 1): ?> selected='selected' <?php endif; ?>>Activo</option>
						<option value="0" <?php if(@$data->status_a && @$data->status_a == 0): ?> selected='selected' <?php endif; ?>>Inactivo</option>
					</select>
				</div>
				
				 <div class="form-group">
					<label>Codigo B:</label>
					<input type="text" name="code_b" value="<?php echo e(@$data->code_b); ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus B:</label>
					<select class="form-control" name="status_b">
						<option value="1" <?php if(@$data->status_b && @$data->status_b == 1): ?> selected='selected' <?php endif; ?>>Activo</option>
						<option value="0" <?php if(@$data->status_b && @$data->status_b == 0): ?> selected='selected' <?php endif; ?>>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Codigo C:</label>
					<input type="text" name="code_c" value="<?php echo e(@$data->code_c); ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus C:</label>
					<select class="form-control" name="status_c">
						<option value="1" <?php if(@$data->status_c && @$data->status_c == 1): ?> selected='selected' <?php endif; ?>>Activo</option>
						<option value="0" <?php if(@$data->status_c && @$data->status_c == 0): ?> selected='selected' <?php endif; ?>>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Codigo D:</label>
					<input type="text" name="code_d" value="<?php echo e(@$data->code_d); ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus D:</label>
					<select class="form-control" name="status_d">
						<option value="1" <?php if(@$data->status_d && @$data->status_d == 1): ?> selected='selected' <?php endif; ?>>Activo</option>
						<option value="0" <?php if(@$data->status_d && @$data->status_d == 0): ?> selected='selected' <?php endif; ?>>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Numero C:</label>
					<input type="text" name="number_c" value="<?php echo e(@$data->number_c); ?>" class="form-control" />
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" <?php if(@$data->is_active == 1): ?> checked='checked' <?php endif; ?> value="1" name="is_active">
				    <label class="form-check-label">Activo</label>
				 </div>
				 <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" <?php if(@$data->is_deactive == 1): ?> checked='checked' <?php endif; ?> value="1" name="is_deactive">
				    <label class="form-check-label">Desactivado</label>
				 </div>
			</div>
			<div class="card-footer">
				<?php echo $__env->make('partials.form_buttons',['type'=>$type,'baseRoute'=>'controls'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#block_id").change(function(){
			let id = $(this).val();
			let html = "<option value=''>Seleccione</option>";
			if(id !=''){
				$.get('/get-childrens/departments/block_id/'+id, function(response){
					let data = JSON.parse(response);

					data.forEach((e)=>{
						html+="<option value='"+e.id+"'>"+e.name+"</option>";
					});

					$("#department_id").html(html);
					html = "";
				});
			}
			
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/controls/add_edit.blade.php ENDPATH**/ ?>