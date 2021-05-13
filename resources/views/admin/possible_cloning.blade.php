@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-copy"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Boton</th>
					<th>Cantidad de Acciones</th>
					<th>Fecha</th>
				</thead>
				<tbody>
					@foreach($data as $d)
						<tr>
							<td>{{ $d->block }}</td>
							<td>{{ $d->department }}</td>
							<td>{{ $d->number_c }}</td>
							<td>{{ $d->button }}</td>
							<td>{{ $d->qty }}</td>
							<td>{{ $d->date }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$("table").DataTable();
	</script>
@stop