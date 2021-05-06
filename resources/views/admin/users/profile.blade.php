@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
    <div class="card card-success">
    	<div class="card-header">
    		<h3><i class="fas fa-id-card"></i> {{ $title }}</h3>
    	</div>
    	<form class="form" action="{{ route('update_profile') }}" method="POST">
    		{{ csrf_field() }}
    		{{ method_field('PUT') }}
	    	<div class="card-body">	    		
    			<div class="form-group">
    				<label>Nombre: </label>
    				<input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" />
    			</div>
    			<div class="form-group">
    				<label>Telefono: </label>
    				<input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" />
    			</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar Perfil</button>
	    	</div>
    	</form>
    </div>

    <div class="card card-success">
    	<div class="card-header">
    		<h3><i class="fas fa-sync-alt"></i> Cambiar Clave</h3>
    	</div>
    	<form class="form" method="POST" action="{{ route('change_password') }}">
	    	<div class="card-body">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
					<label>Nueva Clave:</label>
					<input type="password" name="password" class="form-control" />
				</div>
				<div class="form-group">
					<label>Repita la Clave:</label>
					<input type="password" name="password_confirmation" class="form-control" />
				</div>
	    	</div>
	    	<div class="card-footer text-right">
	    		<button class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar Clave</button>
	    	</div>
    	</form>
    </div>
@stop