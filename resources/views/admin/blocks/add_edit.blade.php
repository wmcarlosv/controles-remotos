@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> {{ $title }}</h3>
		</div>
		@include('partials.form_actions',['type'=>$type,'baseRoute'=>'blocks','id'=>@$data->id])
			<div class="card-body">
				<div class="form-group">
					<label>Nombre:</label>
					<input type="text" name="name" class="form-control" value="{{ @$data->name }}" />
				</div>
				<div class="form-group">
					<label>Intentos Maximos:</label>
					<input type="text" name="max_num" class="form-control" value="{{ @$data->max_num }}" />
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" @if(@$data->is_active == 1) checked='checked' @endif value="1" name="is_active">
				    <label class="form-check-label">Activo</label>
				 </div>
			</div>
			<div class="card-footer">
				@include('partials.form_buttons',['type'=>$type,'baseRoute'=>'blocks'])
			</div>
		</form>
	</div>
@stop