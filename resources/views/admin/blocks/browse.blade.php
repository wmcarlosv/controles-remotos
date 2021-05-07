@extends('adminlte::page')

@section('title', 'Admin - '.$title)

@section('content')
	<div class="card card-success">
		<div class="card-header">
			<h3><i class="fas fa-building"></i> {{ $title }}</h3>
		</div>
		<div class="card-body">
			@include('partials.new_button',['buttonRoute'=>'blocks.create','buttonTitle'=>'Bloque'])
			<table class="table table-bordered table-striped" id="blocks">
				<thead>
					<th>Nro.</th>
					<th>Nombre</th>
					<th>Activo</th>
					<th>-</th>
				</thead>
				<tbody>
					@foreach($data as $block)
						<tr>
							<td>{{ ($loop->index + 1) }}</td>
							<td>{{ $block->name }}</td>
							<td>
								@if($block->is_active == 1)
									<a href="{{ url('/updateColumn/blocks/is_active/0/'.$block->id.'/blocks.index') }}"><span class="badge badge-success">Si</span></a>
								@else
									<a href="{{ url('/updateColumn/blocks/is_active/1/'.$block->id.'/blocks.index') }}"><span class="badge badge-danger">No</span></a>
								@endif
							</td>
							<td>
								<a class="btn btn-info" href="{{ route('blocks.edit',$block->id) }}"><i class="fas fa-edit"></i></a>
								@include('partials.delete_button',['deleteRoute'=>'blocks.destroy','id'=>$block->id])
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
@stop