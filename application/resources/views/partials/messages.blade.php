<script type="text/javascript">
	@if(Session::get('success'))
		Swal.fire({
		  position: 'top-end',
		  type: 'success',
		  title: "{{ Session::get('success') }}",
		  showConfirmButton: false,
		  timer: 1500
		})
	@endif

	@if(Session::get('error'))
		Swal.fire({
		  position: 'top-end',
		  type: 'error',
		  title: "{{ Session::get('success') }}",
		  showConfirmButton: false,
		  timer: 1500
		})
	@endif
</script>