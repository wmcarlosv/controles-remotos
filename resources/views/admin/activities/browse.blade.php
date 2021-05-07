@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-file-alt"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped" id="activitys">
				<thead>
					<th>Nro.</th>
					<th>Codigo Boton</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Boton</th>
				</thead>
				<tbody>
					@foreach($data as $activity)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ $activity->button_code }}</td>
							<td>{{ $activity->block->name }}</td>
							<td>{{ $activity->department->name }}</td>
							<td>{{ $activity->number_c}}</td>
							<td>{{ $activity->button }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ @$message }}
		</div>
	</div>
@stop

@section('js')
	@include('partials.messages')
	<script type="text/javascript">
		$("#activitys").DataTable();
	</script>
@stop