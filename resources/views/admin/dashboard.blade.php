@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
    	<div class="col-md-3">
            <a href="{{ route('users.index') }}">
    		<div class="info-box">
    			<span class="info-box-icon bg-red"><i class="fas fa-users"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Usuarios</span>
				    <span class="info-box-number">{{ getCount('users') }}</span>
				</div>
    		</div>	
            </a>
    	</div>
    	<div class="col-md-3">
            <a href="{{ route('blocks.index') }}">
    		<div class="info-box">
    			<span class="info-box-icon bg-blue"><i class="fas fa-building"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Bloques</span>
				    <span class="info-box-number">{{ getCount('blocks') }}</span>
				</div>
    		</div>
            </a>	
    	</div>
    	<div class="col-md-3">
            <a href="{{ route('departments.index') }}">
    		<div class="info-box">
    			<span class="info-box-icon bg-green"><i class="fas fa-house-user"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Departamentos</span>
				    <span class="info-box-number">{{ getCount('departments') }}</span>
				</div>
    		</div>
            </a>
    	</div>
    	<div class="col-md-3">
            <a href="{{ route('controls.index') }}">
    		<div class="info-box">
    			<span class="info-box-icon bg-yellow"><i class="fas fa-gamepad"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Controles</span>
				    <span class="info-box-number">{{ getCount('Controls') }}</span>
				</div>
    		</div>
            </a>	
    	</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3><i class="fas fa-file-alt"></i> Actividades</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="activitys">
                        <thead>
                            <th>Nro.</th>
                            <th>Codigo Boton</th>
                            <th>Bloque</th>
                            <th>Departamento</th>
                            <th>Numero C</th>
                            <th>Boton</th>
                        </thead>
                        <tbody>
                            @foreach($data as $activity)
                                <tr>
                                    <td>{{ ($loop->index + 1) }}</td>
                                    <td>{{ $activity->button_code }}</td>
                                    <td>{{ $activity->block->name }}</td>
                                    <td>{{ $activity->department->name }}</td>
                                    <td>{{ $activity->number_c}}</td>
                                    <td>{{ $activity->button }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $("table").DataTable();
    </script>
    @include('partials.messages')
@stop