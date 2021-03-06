<form class="form delete-form" id="del_form_<?php echo e($id); ?>" action="<?php echo e(route($deleteRoute,$id)); ?>" method="POST" style="display: inline;">
	<?php echo method_field('DELETE'); ?>
	<?php echo csrf_field(); ?>
	<button class="btn btn-danger btn-submit" data-id="<?php echo e($id); ?>" type="button"><i class="fas fa-times"></i></button>
</form>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript">
	$("body").on('click','button.btn-submit', function(e){
		e.preventDefault();
		let id = $(this).attr("data-id");
		Swal.fire({
		  title: 'Estas seguro de realizar esta acción?',
		  type:'question',
		  showConfirmButton: true,
		  showCancelButton: true,
		  confirmButtonText: `Confirmar`,
		}).then((result) => {
		  if (result.value) {
		    $("#del_form_"+id).submit();
		  }
		});
	});

	$("table.table").DataTable({
		responsive: true,
		dom: 'Bfrtip',
		buttons: [
			'excel', 'pdf'
	    ]
	});

	$("body").on("click","a > span", function(e){
		e.preventDefault();
		Swal.fire({
		  title: 'Estas seguro de realizar esta acción?',
		  type:'question',
		  showConfirmButton: true,
		  showCancelButton: true,
		  confirmButtonText: `Confirmar`,
		}).then((result) => {
		  if (result.value) {
		    location.href = $(this).parent().attr("href");
		  }
		});
	});	

	$("body").on("click","a.is_deleted", function(e){
		e.preventDefault();
		Swal.fire({
		  title: 'Estas seguro de realizar esta acción?',
		  type:'question',
		  showConfirmButton: true,
		  showCancelButton: true,
		  confirmButtonText: `Confirmar`,
		}).then((result) => {
		  if (result.value) {
		    location.href = $(this).attr("href");
		  }
		});
	});	

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
</script>
<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\controles-remotos\resources\views/partials/delete_button.blade.php ENDPATH**/ ?>