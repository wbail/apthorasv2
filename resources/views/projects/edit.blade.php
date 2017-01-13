@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/projects') }}">Voltar</a>

		<div class="page-header">
			<h1>Editando o Projeto '{{ $projects->titulo }}'</h1>
		</div>


		<div class="row">
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
			<div class="col-md-4">

				{!! Form::open(['url'=>"projects/update/$projects->id", 'method'=>'put']) !!}
					{!! Form::label('titulo', 'Título *') !!}
					{!! Form::text('titulo', $projects->titulo, ['class'=>'form-control']) !!}
					<br>
					{!! Form::label('client', 'Cliente *') !!}
					{!! Form::text('client', $projects->client->nome_fantasia, ['class'=>'form-control']) !!}
					<br>
					{!! Form::label('data_entrega', 'Data de Entrega *') !!}
					{!! Form::text('data_entrega', Carbon\Carbon::parse($projects->data_entrega)->format('d/m/Y'), ['class'=>'form-control', 'id'=>'datetimepicker1']) !!}
					<br>
					{!! Form::label('status', 'Status *') !!}
					{!! Form::text('status', $projects->status, ['class'=>'form-control']) !!}
					<br>
					{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
			</div> {{-- ./col-md-4 --}}
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
		</div> {{-- ./row --}}


		<table class="table table-striped">
{{-- 			<thead>
				<th>#</th>
				<th>Título</th>
				<th>Data de Entrega</th>
				<th>Cliente</th>
				<th>Inserido Por</th>
				<th>Status</th>
				<th>Ação</th>
			</thead>
			@foreach($projects as $projects)
				<tbody>
					<td>{{ $projects->id }}</td>
					<td>{{ $projects->titulo }}</td>
					<td>{{ Carbon\Carbon::parse($projects->data_entrega)->format('d/m/Y') }}</td>
					<td>{{ $projects->client->nome_fantasia }}</td>
					<td>{{ $projects->user->name }}</td>
					@if($projects->status == 0)
						<td>Iniciação</td>
					@else
						<td>Finalizado</td>
					@endif
					<td>
						<a href="{{ route('projects.edit', ['id'=>$projects->id]) }}" class="btn btn-warning">Editar</a>
						<button class="btn btn-danger">Excluir</button>
					</td>
				</tbody>
			@endforeach --}}
		</table> {{-- ./table --}}

	</div> {{-- ./container --}}


@endsection