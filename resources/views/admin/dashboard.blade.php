@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
    	<div class="col-md-3">
    		<div class="info-box">
    			<span class="info-box-icon bg-red"><i class="fas fa-users"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Usuarios</span>
				    <span class="info-box-number">0</span>
				</div>
    		</div>	
    	</div>
    	<div class="col-md-3">
    		<div class="info-box">
    			<span class="info-box-icon bg-blue"><i class="fas fa-building"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Bloques</span>
				    <span class="info-box-number">0</span>
				</div>
    		</div>	
    	</div>
    	<div class="col-md-3">
    		<div class="info-box">
    			<span class="info-box-icon bg-green"><i class="fas fa-house-user"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Departamentos</span>
				    <span class="info-box-number">0</span>
				</div>
    		</div>	
    	</div>
    	<div class="col-md-3">
    		<div class="info-box">
    			<span class="info-box-icon bg-yellow"><i class="fas fa-gamepad"></i></span>
    			<div class="info-box-content">
				    <span class="info-box-text">Controles</span>
				    <span class="info-box-number">0</span>
				</div>
    		</div>	
    	</div>
    </div>
@stop

@section('js')
	@include('partials.messages')
@stop