@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/projects') }}">Voltar</a>

		<div class="page-header">
			<h1>Editando o Projeto '{{ $projects->titulo }}'</h1>
		</div>
		<br>
        @if(count($errors) > 0)
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>

		<div class="row">
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
			<div class="col-md-4">

				{!! Form::open(['url'=>"projects/update/$projects->id", 'method'=>'put']) !!}
					{!! Form::label('titulo', 'Título *') !!}
					{!! Form::text('titulo', $projects->titulo, ['class'=>'form-control', 'title'=>'Título do Projeto']) !!}
					<br>
					{!! Form::label('client', 'Cliente *') !!}
					{!! Form::select('client', $clients, $projects->client->id, ['class'=>'form-control', 'title'=>'Cliente do Projeto']) !!}
					<br>
					{!! Form::label('data_entrega', 'Data de Entrega *') !!}
					{!! Form::text('data_entrega', Carbon\Carbon::parse($projects->data_entrega)->format('d/m/Y'), ['class'=>'form-control', 'id'=>'datetimepicker1', 'title'=>'Data de Entrega do Projeto']) !!}
					<br>
					{!! Form::label('fase', 'Fase *') !!}
					{!! Form::select('fase', $fase, $projects->fase, ['class'=>'form-control', 'placeholder'=>'', 'title'=>'Fase do Projeto']) !!}
					<br>
					{!! Form::label('status', 'Status *') !!}
					{!! Form::number('status', $projects->status, ['class'=>'form-control', 'min'=>'0', 'max'=>'100', 'title'=>'Status do Projeto']) !!}
					<br>
					{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
			</div> {{-- ./col-md-4 --}}
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
		</div> {{-- ./row --}}
	</div> {{-- ./container --}}


@endsection