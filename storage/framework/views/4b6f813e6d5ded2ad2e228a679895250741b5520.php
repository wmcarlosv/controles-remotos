

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
    	<div class="col-md-2">
            <a href="<?php echo e(route('users.index')); ?>">
    		<div class="info-box">
    			<span class="info-box-icon bg-red"><i class="fas fa-users"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Usuarios</span>
				    <span class="info-box-number"><?php echo e(getCount('users')); ?></span>
				</div>
    		</div>	
            </a>
    	</div>
    	<div class="col-md-2">
            <a href="<?php echo e(route('blocks.index')); ?>">
    		<div class="info-box">
    			<span class="info-box-icon bg-blue"><i class="fas fa-building"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Bloques</span>
				    <span class="info-box-number"><?php echo e(getCount('blocks')); ?></span>
				</div>
    		</div>
            </a>	
    	</div>
    	<div class="col-md-2">
            <a href="<?php echo e(route('departments.index')); ?>">
    		<div class="info-box">
    			<span class="info-box-icon bg-green"><i class="fas fa-house-user"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Departamentos</span>
				    <span class="info-box-number"><?php echo e(getCount('departments')); ?></span>
				</div>
    		</div>
            </a>
    	</div>
    	<div class="col-md-2">
            <a href="<?php echo e(route('controls.index')); ?>">
    		<div class="info-box">
    			<span class="info-box-icon bg-yellow"><i class="fas fa-gamepad"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Controles</span>
				    <span class="info-box-number"><?php echo e(getCount('Controls')); ?></span>
				</div>
    		</div>
            </a>	
    	</div>

        <div class="col-md-4">
            <a href="<?php echo e(route('activities.index')); ?>">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fas fa-file-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Registro de Activiades</span>
                    <span class="info-box-number"><?php echo e(getCount('activities')); ?></span>
                </div>
            </div>
            </a>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="controls" width="500" height="200"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="activities" width="500" height="200"></canvas>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $("table").DataTable();
        var controls = document.getElementById('controls').getContext('2d');
        var controlsChart = new Chart(controls, {
            type: 'bar',
            data: {
                labels: [
                    <?php $__currentLoopData = $controls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        '<?php echo e($control->month); ?>',
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    label: '# Nro de controles por Mes',
                    data: [
                        <?php $__currentLoopData = $controls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($control->qty); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var activities = document.getElementById('activities').getContext('2d');
        var activitiesChart = new Chart(activities, {
            type: 'bar',
            data: {
                labels: [
                    <?php $__currentLoopData = $listActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        '<?php echo e($activity->month); ?>',
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    label: '# Nro de actividad por Mes',
                    data: [
                        <?php $__currentLoopData = $listActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($activity->qty); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


    </script>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>