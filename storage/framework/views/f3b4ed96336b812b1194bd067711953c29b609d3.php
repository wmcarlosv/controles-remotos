

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">
			<?php echo $__env->make('partials.new_button',['buttonRoute'=>'blocks.create','buttonTitle'=>'Bloque'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<table class="table table-bordered table-striped" id="blocks">
				<thead>
					<th>Nro.</th>
					<th>Nombre</th>
					<th>Activo</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Eliminar</th>
					<th>Intentos Maximos</th>
					<th>-</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e(($loop->index + 1)); ?></td>
							<td><?php echo e($block->name); ?></td>
							<td>
								<?php if($block->is_active == 1): ?>
									<a href="<?php echo e(url('/updateColumn/blocks/is_active/0/'.$block->id.'/blocks.index')); ?>"><span class="badge badge-success">Si</span></a>
								<?php else: ?>
									<a href="<?php echo e(url('/updateColumn/blocks/is_active/1/'.$block->id.'/blocks.index')); ?>"><span class="badge badge-danger">No</span></a>
								<?php endif; ?>
								
							</td>
							<td><?php echo e(date('d-m-Y', strtotime($block->created_at))); ?></td>
							<td><?php echo e(date('d-m-Y', strtotime($block->updated_at))); ?></td>
							<td>
								<?php if($block->is_deleted == 1): ?>
									<a class="btn btn-success is_deleted" href="<?php echo e(url('/updateColumn/blocks/is_deleted/0/'.$block->id.'/blocks.index')); ?>"><i class="fas fa-check"></i> Si</a>
								<?php else: ?>
									<a class="btn btn-danger is_deleted" href="<?php echo e(url('/updateColumn/blocks/is_deleted/1/'.$block->id.'/blocks.index')); ?>"><i class="fas fa-times"></i> No</a>
								<?php endif; ?>
							</td>
							<td><?php echo e($block->max_num); ?></td>
							<td>
								<a class="btn btn-info" href="<?php echo e(route('blocks.edit',$block->id)); ?>"><i class="fas fa-edit"></i></a>
								<?php echo $__env->make('partials.delete_button',['deleteRoute'=>'blocks.destroy','id'=>$block->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/blocks/browse.blade.php ENDPATH**/ ?>