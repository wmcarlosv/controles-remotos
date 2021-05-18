@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
@stop

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-id-badge"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			@if($actives->count() == 0)
				<a href="{{ route('licences.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Nueva Licencia</a>
			@else
				<span class="badge badge-info" style="text-transform: uppercase;">Solo puedes tener una licencia Activa!!</span>
			@endif
			<br />
			<br />
			<table class="table table-bordered table-striped">
				<thead>
					<th>#</th>
					<th>Codigo</th>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Estatus</th>
				</thead>
				<tbody>
					@foreach($data as $licence)
						<tr>
							<td>{{ $loop->index }}</td>
							<td>{{ $licence->code }}</td>
							<td>{{ date('d/m/Y',strtotime($licence->date_from)) }}</td>
							<td>{{ date('d/m/Y',strtotime($licence->date_to)) }}</td>
							<td>
								@if($licence->is_active)
									<span class="badge badge-success">Activo</span>
								@else
									<span class="badge badge-danger">Inactivo</span>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('js')
	@include('partials.messages')
	<script type="text/javascript">
		$("table.table").DataTable();
	</script>
@stop