@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
@stop

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-house-user"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			@include('partials.new_button',['buttonRoute'=>'departments.create','buttonTitle'=>'Departamento'])
			<table class="table table-bordered table-striped" id="blocks">
				<thead>
					<th>Nro.</th>
					<th>Nombre</th>
					<th>Bloque</th>
					<th>Activo</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Eliminado</th>
					<th>-</th>
				</thead>
				<tbody>
					@foreach($data as $department)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ $department->name }}</td>
							<td>{{ $department->block->name }}</td>
							<td>
								@if($department->is_active == 1)
									<a href="{{ url('/updateColumn/departments/is_active/0/'.$department->id.'/departments.index') }}"><span class="badge badge-success">Si</span></a>
								@else
									<a href="{{ url('/updateColumn/departments/is_active/1/'.$department->id.'/departments.index') }}"><span class="badge badge-danger">No</span></a>
								@endif
							</td>
							<td>{{ date('d-m-Y',strtotime($department->created_at)) }}</td>
							<td>{{ date('d-m-Y',strtotime($department->updated_at)) }}</td>
							<td>
								@if($department->is_deleted == 1)
									<a class="btn btn-success is_deleted" href="{{ url('/updateColumn/departments/is_deleted/0/'.$department->id.'/departments.index') }}"><i class="fas fa-check"></i> Si</a>
								@else
									<a class="btn btn-danger is_deleted" href="{{ url('/updateColumn/departments/is_deleted/1/'.$department->id.'/departments.index') }}"><i class="fas fa-times"></i> No</a>
								@endif
							</td>
							<td>
								<a class="btn btn-info" href="{{ route('departments.edit',$department->id) }}"><i class="fas fa-edit"></i></a>
								@include('partials.delete_button',['deleteRoute'=>'departments.destroy','id'=>$department->id])
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
		$("#blocks").DataTable();
	</script>
@stop