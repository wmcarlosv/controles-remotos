@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
    	<div class="col-md-2">
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
    	<div class="col-md-2">
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
    	<div class="col-md-2">
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
    	<div class="col-md-2">
            <a href="{{ route('controls.index') }}">
    		<div class="info-box">
    			<span class="info-box-icon bg-yellow"><i class="fas fa-gamepad"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Controles</span>
				    <span class="info-box-number">{{ getCount('controls') }}</span>
				</div>
    		</div>
            </a>	
    	</div>

        <div class="col-md-4">
            <a href="{{ route('activities.index') }}">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fas fa-file-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Registro de Activiades</span>
                    <span class="info-box-number">{{ getCount('activities') }}</span>
                </div>
            </div>
            </a>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="controls" width="500" height="200"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="activities" width="500" height="200"></canvas>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $("table").DataTable();
        var controls = document.getElementById('controls').getContext('2d');
        var controlsChart = new Chart(controls, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($controls as $control)
                        '{{ $control->month }}',
                    @endforeach
                ],
                datasets: [{
                    label: '# Nro de controles por Mes',
                    data: [
                        @foreach($controls as $control)
                            {{ $control->qty }},
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var activities = document.getElementById('activities').getContext('2d');
        var activitiesChart = new Chart(activities, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($listActivities as $activity)
                        '{{ $activity->month }}',
                    @endforeach
                ],
                datasets: [{
                    label: '# Nro de actividad por Mes',
                    data: [
                        @foreach($listActivities as $activity)
                            {{ $activity->qty }},
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


    </script>
    @include('partials.messages')
@stop