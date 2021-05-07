<form class="form delete-form" action="{{ route($deleteRoute,$id) }}" method="POST" style="display: inline;">
	@method('DELETE')
	@csrf
	<button class="btn btn-danger btn-submit" type="button"><i class="fas fa-times"></i></button>
</form>

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript">
	$("body").on('click','button.btn-submit', function(e){
		e.preventDefault();
		Swal.fire({
		  title: 'Estas seguro de realizar esta acción?',
		  type:'question',
		  showConfirmButton: true,
		  showCancelButton: true,
		  confirmButtonText: `Confirmar`,
		}).then((result) => {
		  if (result.value) {
		    $("form.delete-form").submit();
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
</script>
@include('partials.messages')
@stop