@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	@include('partials.validations')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-user"></i> {{ $title }}</h3>
		</div>
		@include('partials.form_actions',['type'=>$type,'baseRoute'=>'users','id'=>@$data->id])
			<div class="card-body">
				<div class="form-group">
					<label>Nombre:</label>
					<input type="text" name="name" class="form-control" value="{{ @$data->name }}" />
				</div>
				<div class="form-group">
					<label>Correo:</label>
					<input type="text" @if($type=='edit') readonly="readonly" @endif name="email" class="form-control" value="{{ @$data->email }}" />
				</div>
				<div class="form-group">
					<label>Teléfono:</label>
					<input type="text" name="phone" class="form-control" value="{{ @$data->phone }}" />
				</div>
				<div class="form-group">
					<label>Rol:</label>
					<div class="checkbox">
					 	<input type="radio" @if(@$data->role == 'admin') checked='checked' @endif name="role" value='admin' /> Administrador
					</div>
					<div class="checkbox">
						<input type="radio" @if(@$data->role == 'customer') checked='checked' @endif name="role" value='customer' /> Ayundante
					</div>
				</div>
				<div class="form-group">
					<label>Bloque: </label>
					<select class="form-control" name="block_id" id="block_id">
						<option value="0">Seleccione</option>
						@foreach($blocks as $block)
							<option value="{{ $block->id }}" @if(@$data->block_id == $block->id) selected='selected' @endif>{{ $block->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Departamento: </label>
					<select class="form-control" name="department_id" id="department_id">
						<option value="0">Seleccione</option>
						@if(@$data->block_id)
								@foreach(@$data->block->departments as $department)
									<option value="{{ $department->id }}" @if(@$data->department_id == $department->id) selected='selected' @endif>{{ $department->name }}</option>
								@endforeach
						@endif
					</select>
				</div>
				@if($type == 'new')
					<div class="input-group">
						<input type="text" name="password" id="password" readonly="readonly" placeholder="Genera la Clave" class="form-control" />
						<div class="input-group-append">
							<button class="btn btn-success" id="generate-password" type="button"><i class="fas fa-key"></i></button>
						</div>
					</div>
				@endif
			</div>
			<div class="card-footer">
				@include('partials.form_buttons',['type'=>$type,'baseRoute'=>'users'])
			</div>
		</form>
	</div>
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$("#block_id").change(function(){
			let id = $(this).val();
			let html = "<option value='0'>Seleccione</option>";
			if(id!='0'){
				$.get('{{ env("APP_URL") }}get-childrens/departments/block_id/'+id, function(response){
					let data = JSON.parse(response);
					data.forEach((e)=>{
						html+="<option value='"+e.id+"'>"+e.name+"</option>";
					});
					$("#department_id").html(html);
					html = "";
				});
			}
			
		});

		$("#generate-password").click(function(){
			let password = generateP();
			$("#password").val(password);
		})
	});

	function generateP() {
        var pass = '';
        var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 
                'abcdefghijklmnopqrstuvwxyz0123456789@#$';
          
        for (i = 1; i <= 8; i++) {
            var char = Math.floor(Math.random()
                        * str.length + 1);
              
            pass += str.charAt(char)
        }
          
        return pass;
    }
</script>
@stop