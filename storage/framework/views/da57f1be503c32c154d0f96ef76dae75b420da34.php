<script type="text/javascript">
	<?php if(Session::get('success')): ?>
		Swal.fire({
		  position: 'top-end',
		  type: 'success',
		  title: "<?php echo e(Session::get('success')); ?>",
		  showConfirmButton: false,
		  timer: 1500
		})
	<?php endif; ?>

	<?php if(Session::get('error')): ?>
		Swal.fire({
		  position: 'top-end',
		  type: 'error',
		  title: "<?php echo e(Session::get('success')); ?>",
		  showConfirmButton: false,
		  timer: 1500
		})
	<?php endif; ?>
</script><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/partials/messages.blade.php ENDPATH**/ ?>