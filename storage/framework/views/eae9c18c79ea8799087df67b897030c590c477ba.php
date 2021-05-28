

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('partials.validations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-user"></i> <?php echo e($title); ?></h3>
		</div>
		<?php echo $__env->make('partials.form_actions',['type'=>$type,'baseRoute'=>'users','id'=>@$data->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="card-body">
				<div class="form-group">
					<label>Nombre:</label>
					<input type="text" name="name" class="form-control" value="<?php echo e(@$data->name); ?>" />
				</div>
				<div class="form-group">
					<label>Correo:</label>
					<input type="text" <?php if($type=='edit'): ?> readonly="readonly" <?php endif; ?> name="email" class="form-control" value="<?php echo e(@$data->email); ?>" />
				</div>
				<div class="form-group">
					<label>Teléfono:</label>
					<input type="text" name="phone" class="form-control" value="<?php echo e(@$data->phone); ?>" />
				</div>
				<div class="form-group">
					<label>Rol:</label>
					<div class="checkbox">
					 	<input type="radio" <?php if(@$data->role == 'admin'): ?> checked='checked' <?php endif; ?> name="role" value='admin' /> Administrador
					</div>
					<div class="checkbox">
						<input type="radio" <?php if(@$data->role == 'customer'): ?> checked='checked' <?php endif; ?> name="role" value='customer' /> Ayundante
					</div>
				</div>
				<div class="form-group">
					<label>Bloque: </label>
					<select class="form-control" name="block_id" id="block_id">
						<option value="0">Seleccione</option>
						<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($block->id); ?>" <?php if(@$data->block_id == $block->id): ?> selected='selected' <?php endif; ?>><?php echo e($block->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="form-group">
					<label>Departamento: </label>
					<select class="form-control" name="department_id" id="department_id">
						<option value="0">Seleccione</option>
						<?php if(@$data->block_id): ?>
								<?php $__currentLoopData = @$data->block->departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($department->id); ?>" <?php if(@$data->department_id == $department->id): ?> selected='selected' <?php endif; ?>><?php echo e($department->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</select>
				</div>
				<?php if($type == 'new'): ?>
					<div class="input-group">
						<input type="text" name="password" id="password" readonly="readonly" placeholder="Genera la Clave" class="form-control" />
						<div class="input-group-append">
							<button class="btn btn-success" id="generate-password" type="button"><i class="fas fa-key"></i></button>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="card-footer">
				<?php echo $__env->make('partials.form_buttons',['type'=>$type,'baseRoute'=>'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#block_id").change(function(){
			let id = $(this).val();
			let html = "<option value='0'>Seleccione</option>";
			if(id!='0'){
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

		$("#generate-password").click(function(){
			let password = generateP();
			$("#password").val(password);
		})
	});

	function generateP() {
        var pass = '';
        var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 
                'abcdefghijklmnopqrstuvwxyz0123456789@#$';
          
        for (i = 1; i <= 8; i++) {
            var char = Math.floor(Math.random()
                        * str.length + 1);
              
            pass += str.charAt(char)
        }
          
        return pass;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/users/add_edit.blade.php ENDPATH**/ ?>