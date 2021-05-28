<form class="form" autocomplete="off" method="POST" action="<?php if($type=='new'): ?><?php echo e(route($baseRoute.'.store')); ?><?php else: ?><?php echo e(route($baseRoute.'.update',$id)); ?><?php endif; ?>">
	<?php if($type=='new'): ?>
		<?php echo method_field('POST'); ?>
	<?php else: ?>
		<?php echo method_field('PUT'); ?>
	<?php endif; ?>
	<?php echo csrf_field(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/partials/form_actions.blade.php ENDPATH**/ ?>