@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-users"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			@include('partials.new_button',['buttonRoute'=>'users.create','buttonTitle'=>'Usuario'])
			<table class="table table-bordered table-striped" id="users">
				<thead>
					<th>Nro.</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Rol</th>
					<th>Bloque</th>
					<th>Departamento</th>
					<th>-</th>
				</thead>
				<tbody>
					@foreach($data as $user)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
							<td>
								@if($user->role == 'admin')
									<span class="badge badge-success">Administrador</span>
								@else
									<span class="badge badge-info">Cliente</span>
								@endif
							</td>
							<td>{{ @$user->block->name }}</td>
							<td>{{ @$user->dapartment->name }}</td>
							<td>
								<a class="btn btn-info" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit"></i></a>
								@include('partials.delete_button',['deleteRoute'=>'users.destroy','id'=>$user->id])
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
		$("#users").DataTable();
	</script>
@stop