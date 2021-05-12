@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
@stop

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-gamepad"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">

			<form>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Bloque:</label>
							<select class="form-control" id="block_id" name="block_id">
								<option value="">Seleccione</option>
								@foreach($blocks as $block)
									<option value="{{ $block->id }}" @if($block_id == $block->id) selected='selected' @endif>{{ $block->name }} ({{ $block->controls->count() }} =>  Controles)</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Departamento:</label>
							<select class="form-control" id="department_id" name="department_id">
								<option value="">Seleccione</option>
								@if($selectedBlock)
									@foreach($selectedBlock->departments as $department)
										<option value="{{ $department->id }}" @if($department_id == $department->id) selected='selected'; @endif>{{ $department->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4" style="padding-top: 32px;">
						<button class="btn btn-success"><i class="fas fa-search"></i> Filtrar</button>
					</div>
				</div>
			</form>
			<br />
			@include('partials.new_button',['buttonRoute'=>'controls.create','buttonTitle'=>'Control'])
			<table class="table table-bordered table-striped" id="controls">
				<thead>
					<th>Nro.</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>Numero C</th>
					<th>Codigo A</th>
					<th>Estatus A</th>
					<th>Codigo B</th>
					<th>Estatus B</th>
					<th>Codigo C</th>
					<th>Estatus C</th>
					<th>Codigo D</th>
					<th>Estatus D</th>
					<th>Estatus Total</th>
					<th>Desactivado</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Eliminado</th>
					<th>-</th>
				</thead>
				<tbody>
					@foreach($data as $control)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ $control->block->name }}</td>
							<td>{{ $control->department->name }}</td>
							<td>{{ $control->number_c }}</td>
							<td>{{ $control->code_a }}</td>
							<td>
								@if($control->status_a == 1)
									<a href="{{ url('/updateColumn/controls/status_a/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Activo</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/status_a/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">Inactivo</span></a>
								@endif
							</td>
							<td>{{ $control->code_b }}</td>
							<td>
								@if($control->status_b == 1)
									<a href="{{ url('/updateColumn/controls/status_b/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Activo</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/status_b/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">Inactivo</span></a>
								@endif
							</td>
							<td>{{ $control->code_c }}</td>
							<td>
								@if($control->status_c == 1)
									<a href="{{ url('/updateColumn/controls/status_c/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Activo</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/status_c/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">Inactivo</span></a>
								@endif
							</td>
							<td>{{ $control->code_d }}</td>
							<td>
								@if($control->status_d == 1)
									<a href="{{ url('/updateColumn/controls/status_d/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Activo</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/status_d/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">Inactivo</span></a>
								@endif
							</td>
							<td>
								@if($control->is_active == 1)
									<a href="{{ url('/updateColumn/controls/is_active/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Activado</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/is_active/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">Desactivado</span></a>
								@endif
							</td>
							<td>
								@if($control->is_deactive == 1)
									<a href="{{ url('/updateColumn/controls/is_deactive/0/'.$control->id.'/controls.index') }}"><span class="badge badge-success">Si</span></a>
								@else
									<a href="{{ url('/updateColumn/controls/is_deactive/1/'.$control->id.'/controls.index') }}"><span class="badge badge-danger">No</span></a>
								@endif
							</td>
							<td>
								{{ date('d-m-Y', strtotime($control->created_at)) }}
							</td>
							<td>
								{{ date('d-m-Y', strtotime($control->updated_at)) }}
							</td>
							<td>
								@if($control->is_deleted == 1)
									<a class="btn btn-success is_deleted" href="{{ url('/updateColumn/controls/is_deleted/0/'.$control->id.'/controls.index') }}"><i class="fas fa-check"></i> Si</a>
								@else
									<a class="btn btn-danger is_deleted" href="{{ url('/updateColumn/controls/is_deleted/1/'.$control->id.'/controls.index') }}"><i class="fas fa-times"></i> No</a>
								@endif
							</td>
							<td>
								<a class="btn btn-info" href="{{ route('controls.edit',$control->id) }}"><i class="fas fa-edit"></i></a>
								@include('partials.delete_button',['deleteRoute'=>'controls.destroy','id'=>$control->id])
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ @$message }}
		</div>
	</div>
@stop