<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible">
    	<a href="#" class="close" style="text-decoration: none; font-weight: bold; color: black;" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/partials/validations.blade.php ENDPATH**/ ?>