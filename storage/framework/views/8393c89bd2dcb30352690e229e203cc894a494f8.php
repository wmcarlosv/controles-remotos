

<?php $__env->startSection('title', 'Admin - '.$title); ?>

<?php $__env->startSection('content'); ?>
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-copy"></i> <?php echo e($title); ?></h3>
		</div>
		<div class="card-body">
			<form>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Fecha:</label>
							<input type="date" value="<?php echo e(@$date_filtre); ?>" name="date_filtre" class="form-control" />
						</div>
					</div>
					<div class="col-md-6" style="padding-top: 31px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Buscar</button>
					</div>
				</div>
				
			</form>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Cantidad de Acciones</th>
					<th>Fecha</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($d->block); ?></td>
							<td><?php echo e($d->department); ?></td>
							<td><?php echo e($d->number_c); ?></td>
							<td>
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#details_<?php echo e($d->number_c); ?>"><i class="fas fa-list-ol"></i> <?php echo e($d->qty); ?></a>
								<div class="modal fade" id="details_<?php echo e($d->number_c); ?>" tabindex="-1" role="dialog">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title">Acciones del Nro de Control: <?php echo e($d->number_c); ?></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        	<table class="table">
								        		<thead>
								        			<th>Boton</th>
								        			<th>Hora</th>
								        		</thead>
								        		<tbody>
								        			<?php $__currentLoopData = \App\Models\Activity::getActivityByNumberControl($d->number_c); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								        			<tr>
								        				<td><?php echo e($det->button); ?></td>
								        				<td><?php echo e(date('H:m:s',strtotime($det->created_at))); ?></td>
								        			</tr>
								        			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								        		</tbody>
								        	</table>
								      </div>
								    </div>
								  </div>
								</div>
							</td>
							<td><?php echo e($d->date); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript">
		$("table").DataTable();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/possible_cloning.blade.php ENDPATH**/ ?>