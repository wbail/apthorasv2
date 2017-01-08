@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="page-header">
			<h1>Novo Cliente</h1>
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
		<div class="col-md-4"></div> {{-- ./col-md-4 --}}
		<div class="col-md-4">

			{!! Form::open(['route'=>'clients.store']) !!}
				{!! Form::label('nome_fantasia', 'Nome do Cliente *') !!}
				{!! Form::text('nome_fantasia', null, ['class'=>'form-control', 'title'=>'Nome fantiasia do cliente']) !!}
				<br>
				{!! Form::label('documento', 'CPF ou CNPJ *') !!}
				{!! Form::number('documento', null, ['class'=>'form-control', 'title'=>'CPF ou CNPJ do cliente sem pontos']) !!}
				<br>
				{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}

		</div> {{-- ./col-md-4 --}}
		<div class="col-md-4"></div> {{-- ./col-md-4 --}}




	</div> {{-- ./container --}}

@endsection