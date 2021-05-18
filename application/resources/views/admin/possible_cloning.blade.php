@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-copy"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			<form>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Fecha:</label>
							<input type="date" value="{{ @$date_filtre }}" name="date_filtre" class="form-control" />
						</div>
					</div>
					<div class="col-md-6" style="padding-top: 31px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Buscar</button>
					</div>
				</div>
				
			</form>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Cantidad de Acciones</th>
					<th>Fecha</th>
				</thead>
				<tbody>
					@foreach($data as $d)
						<tr>
							<td>{{ $d->block }}</td>
							<td>{{ $d->department }}</td>
							<td>{{ $d->number_c }}</td>
							<td>
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#details_{{ $d->number_c }}"><i class="fas fa-list-ol"></i> {{ $d->qty }}</a>
								<div class="modal fade" id="details_{{ $d->number_c }}" tabindex="-1" role="dialog">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title">Acciones del Nro de Control: {{ $d->number_c }}</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        	<table class="table">
								        		<thead>
								        			<th>Boton</th>
								        			<th>Hora</th>
								        		</thead>
								        		<tbody>
								        			@foreach(\App\Models\Activity::getActivityByNumberControl($d->number_c) as $det)
								        			<tr>
								        				<td>{{ $det->button }}</td>
								        				<td>{{ date('H:m:s',strtotime($det->created_at)) }}</td>
								        			</tr>
								        			@endforeach
								        		</tbody>
								        	</table>
								      </div>
								    </div>
								  </div>
								</div>
							</td>
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