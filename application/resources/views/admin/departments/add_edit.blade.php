@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-house-user"></i> {{ $title }}</h3>
		</div>
		@include('partials.form_actions',['type'=>$type,'baseRoute'=>'departments','id'=>@$data->id])
			<div class="card-body">
				<div class="form-group">
					<label>Nombre:</label>
					<input type="text" name="name" class="form-control" value="{{ @$data->name }}" />
				</div>
				<div class="form-group">
					<label>Bloque:</label>
					<select class="form-control" name="block_id">
						<option value="">Seleccione</option>
						@foreach($blocks as $block)
							<option @if(@$data->block_id == $block->id) selected='selected' @endif value="{{ $block->id }}">{{ $block->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" @if(@$data->is_active == 1) checked='checked' @endif value="1" name="is_active">
				    <label class="form-check-label">Activo</label>
				 </div>
			</div>
			<div class="card-footer">
				@include('partials.form_buttons',['type'=>$type,'baseRoute'=>'departments'])
			</div>
		</form>
	</div>
@stop