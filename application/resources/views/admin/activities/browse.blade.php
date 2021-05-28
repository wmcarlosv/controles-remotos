@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')

	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-file-alt"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			<form>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha Desde:</label>
							<input type="date" value="{{ @$date_from }}" class="form-control" name="date_from" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha Hasta:</label>
							<input type="date" value="{{ @$date_to }}" class="form-control" name="date_to" />
						</div>
					</div>
					<div class="col-md-3" style="padding-top: 31px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Buscar</button>

					</div>
					<div class="col-md-3">
					    <div class="fomr-group" style="padding-top: 35px;">
					    	<label>Activiades</label>
					    	<span class="badge badge-success">{{ getCount('activities') }}</span>
					    </div>
					</div>
				</div>
			</form>
			<table class="table table-bordered table-striped" id="activitys">
				<thead>
					<th>Nro.</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Numero C</th>
					<th>Codigo Boton</th>
					<th>Boton</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Eliminado</th>
					<th>/</th>
				</thead>
				<tbody>
					@foreach($data as $activity)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ date('d-m-Y',strtotime($activity->created_at)) }}</td>
							<td>{{ date('H:m:s',strtotime($activity->created_at)) }}</td>
							<td>{{ $activity->button_code }}</td>
							<td>{{ $activity->block->name }}</td>
							<td>{{ $activity->department->name }}</td>
							<td>{{ $activity->number_c}}</td>
							<td>{{ $activity->button }}</td>
							<td>
								@if($activity->is_deleted == 1)
									<a class="btn btn-success is_deleted" href="{{ url('/updateColumn/activities/is_deleted/0/'.$activity->id.'/activities.index') }}"><i class="fas fa-check"></i> Si</a>
								@else
									<a class="btn btn-danger is_deleted" href="{{ url('/updateColumn/activities/is_deleted/1/'.$activity->id.'/activities.index') }}"><i class="fas fa-times"></i> No</a>
								@endif
							</td>
							<td>
								@include('partials.delete_button',['deleteRoute'=>'activities.destroy','id'=>$activity->id])
							</td>
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