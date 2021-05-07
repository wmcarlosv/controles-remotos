@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> {{ $title }}</h3>
		</div>
		@include('partials.form_actions',['type'=>$type,'baseRoute'=>'controls','id'=>@$data->id])
			<div class="card-body">
				<div class="form-group">
					<label>Bloque:</label>
					<select class="form-control" name="block_id" id="block_id">
						<option value="">Seleccione</option>
						@foreach($blocks as $block)
							<option value="{{ $block->id }}" @if(@$data->block_id == $block->id) selected='selected' @endif>{{ $block->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Departamento:</label>
					<select class="form-control" name="department_id" id="department_id">
						<option value="">Seleccione</option>
						@if(@$departments)
							@foreach(@$departments as $department)
								<option value="{{ $department->id }}" @if(@$data->department_id == $department->id) selected='selected' @endif>{{ $department->name }}</option>
							@endforeach
						@endif
					</select>
				</div>
				<div class="form-group">
					<label>Codigo A:</label>
					<input type="text" name="code_a" value="{{ @$data->code_a }}" class="form-control" />
				</div>

				<div class="form-group">
					<label>Estatus A:</label>
					<select class="form-control" name="status_a">
						<option value="1" @if(@$data->status_a && @$data->status_a == 1) selected='selected' @endif>Activo</option>
						<option value="0" @if(@$data->status_a && @$data->status_a == 0) selected='selected' @endif>Inactivo</option>
					</select>
				</div>
				
				 <div class="form-group">
					<label>Codigo B:</label>
					<input type="text" name="code_b" value="{{ @$data->code_b }}" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus B:</label>
					<select class="form-control" name="status_b">
						<option value="1" @if(@$data->status_b && @$data->status_b == 1) selected='selected' @endif>Activo</option>
						<option value="0" @if(@$data->status_b && @$data->status_b == 0) selected='selected' @endif>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Codigo C:</label>
					<input type="text" name="code_c" value="{{ @$data->code_c }}" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus C:</label>
					<select class="form-control" name="status_c">
						<option value="1" @if(@$data->status_c && @$data->status_c == 1) selected='selected' @endif>Activo</option>
						<option value="0" @if(@$data->status_c && @$data->status_c == 0) selected='selected' @endif>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Codigo D:</label>
					<input type="text" name="code_d" value="{{ @$data->code_d }}" class="form-control" />
				</div>
				<div class="form-group">
					<label>Estatus D:</label>
					<select class="form-control" name="status_d">
						<option value="1" @if(@$data->status_d && @$data->status_d == 1) selected='selected' @endif>Activo</option>
						<option value="0" @if(@$data->status_d && @$data->status_d == 0) selected='selected' @endif>Inactivo</option>
					</select>
				</div>
				 <div class="form-group">
					<label>Numero C:</label>
					<input type="text" name="number_c" value="{{ @$data->number_c }}" class="form-control" />
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" @if(@$data->is_active == 1) checked='checked' @endif value="1" name="is_active">
				    <label class="form-check-label">Activo</label>
				 </div>
				 <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" @if(@$data->is_deactive == 1) checked='checked' @endif value="1" name="is_deactive">
				    <label class="form-check-label">Desactivado</label>
				 </div>
			</div>
			<div class="card-footer">
				@include('partials.form_buttons',['type'=>$type,'baseRoute'=>'controls'])
			</div>
		</form>
	</div>
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$("#block_id").change(function(){
			let id = $(this).val();
			let html = "<option>Seleccione</option>";
			if(id !=''){
				$.get('/get-childrens/departments/block_id/'+id, function(response){
					let data = JSON.parse(response);

					data.forEach((e)=>{
						html+="<option value='"+e.id+"'>"+e.name+"</option>";
					});

					$("#department_id").html(html);
					html = "";
				});
			}
			
		});
	});
</script>
@stop