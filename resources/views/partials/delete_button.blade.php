<form class="form delete-form" action="{{ route($deleteRoute,$id) }}" method="POST" style="display: inline;">
	@method('DELETE')
	@csrf
	<button class="btn btn-danger btn-submit" type="button"><i class="fas fa-times"></i></button>
</form>

@section('js')
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
</script>
@stop