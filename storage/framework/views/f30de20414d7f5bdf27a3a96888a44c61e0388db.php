

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-gamepad"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">

			<form>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Bloque:</label>
							<select class="form-control" id="block_id" name="block_id">
								<option value="">Seleccione</option>
								<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($block->id); ?>" <?php if($block_id == $block->id): ?> selected='selected' <?php endif; ?>><?php echo e($block->name); ?> (<?php echo e($block->controls->count()); ?> =>  Controles)</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Departamento:</label>
							<select class="form-control" id="department_id" name="department_id">
								<option value="">Seleccione</option>
								<?php if($selectedBlock): ?>
									<?php $__currentLoopData = $selectedBlock->departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($department->id); ?>" <?php if($department_id == $department->id): ?> selected='selected'; <?php endif; ?>><?php echo e($department->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4" style="padding-top: 32px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Filtrar</button>
					</div>
				</div>
			</form>
			<br />
			<?php echo $__env->make('partials.new_button',['buttonRoute'=>'controls.create','buttonTitle'=>'Control'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<table class="table table-bordered table-striped" id="controls">
				<thead>
					<th>Nro.</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Codigo A</th>
					<th>Estatus A</th>
					<th>Codigo B</th>
					<th>Estatus B</th>
					<th>Codigo C</th>
					<th>Estatus C</th>
					<th>Codigo D</th>
					<th>Estatus D</th>
					<th>Estatus Total</th>
					<th>Desactivado</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Eliminado</th>
					<th>-</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e(($loop->index + 1)); ?></td>
							<td><?php echo e($control->block->name); ?></td>
							<td><?php echo e($control->department->name); ?></td>
							<td><?php echo e($control->number_c); ?></td>
							<td><?php echo e($control->code_a); ?></td>
							<td>
								<?php if($control->status_a == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_a/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Activo</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_a/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">Inactivo</span></a>
								<?php endif; ?>
							</td>
							<td><?php echo e($control->code_b); ?></td>
							<td>
								<?php if($control->status_b == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_b/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Activo</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_b/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">Inactivo</span></a>
								<?php endif; ?>
							</td>
							<td><?php echo e($control->code_c); ?></td>
							<td>
								<?php if($control->status_c == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_c/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Activo</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_c/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">Inactivo</span></a>
								<?php endif; ?>
							</td>
							<td><?php echo e($control->code_d); ?></td>
							<td>
								<?php if($control->status_d == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_d/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Activo</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/status_d/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">Inactivo</span></a>
								<?php endif; ?>
							</td>
							<td>
								<?php if($control->is_active == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/is_active/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Activado</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/is_active/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">Desactivado</span></a>
								<?php endif; ?>
							</td>
							<td>
								<?php if($control->is_deactive == 1): ?>
									<a href="<?php echo e(url('/updateColumn/controls/is_deactive/0/'.$control->id.'/controls.index')); ?>"><span class="badge badge-success">Si</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/controls/is_deactive/1/'.$control->id.'/controls.index')); ?>"><span class="badge badge-danger">No</span></a>
								<?php endif; ?>
							</td>
							<td>
								<?php echo e(date('d-m-Y', strtotime($control->created_at))); ?>

							</td>
							<td>
								<?php echo e(date('d-m-Y', strtotime($control->updated_at))); ?>

							</td>
							<td>
								<?php if($control->is_deleted == 1): ?>
									<a class="btn btn-success is_deleted" href="<?php echo e(url('/updateColumn/controls/is_deleted/0/'.$control->id.'/controls.index')); ?>"><i class="fas fa-check"></i> Si</a>
								<?php else: ?>
									<a class="btn btn-danger is_deleted" href="<?php echo e(url('/updateColumn/controls/is_deleted/1/'.$control->id.'/controls.index')); ?>"><i class="fas fa-times"></i> No</a>
								<?php endif; ?>
							</td>
							<td>
								<a class="btn btn-info" href="<?php echo e(route('controls.edit',$control->id)); ?>"><i class="fas fa-edit"></i></a>
								<?php echo $__env->make('partials.delete_button',['deleteRoute'=>'controls.destroy','id'=>$control->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e(@$message); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/controls/browse.blade.php ENDPATH**/ ?>