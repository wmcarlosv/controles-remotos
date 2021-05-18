@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> {{ $title }}</h3>
		</div>
		<form method="POST" action="{{ route('licences.store') }}">
			@csrf
			@method('post')
			<div class="card-body">
				<div class="from-group">
					<label>Codigo de Activacion:</label>
					<input type="text" name="code" class="form-control" />
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-success"><i class="fas fa-save"></i> Activar</button>
				<a class="btn btn-danger" href="{{ route('licences.index') }}"><i class="fas fa-arrow-left"></i> Cancelar</a>
			</div>
		</form>
	</div>
@stop