@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/home') }}">Voltar</a>

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
		<div class="col-md-6">

			{!! Form::open(['route'=>'clients.store']) !!}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Informações Básicas</h3>
				</div>
				<div class="panel-body">
					{!! Form::label('nome_fantasia', 'Nome do Cliente *') !!}
					{!! Form::text('nome_fantasia', null, ['class'=>'form-control', 'title'=>'Nome fantiasia do cliente']) !!}
					<br>
					{!! Form::label('documento', 'CPF ou CNPJ *') !!}
					{!! Form::text('documento', null, ['class'=>'form-control cpf', 'min'=>'0', 'title'=>'CPF ou CNPJ do cliente sem pontos']) !!}
				</div>
			</div>


		</div> {{-- ./col-md-6 --}}
		<div class="col-md-6">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Contato</h3>
				</div>
				<div class="panel-body">
					{!! Form::label('telefone', 'Telefone *') !!}
					{!! Form::text('telefone', null, ['class'=>'form-control phone_with_ddd', 'title'=>'Telefone com DDD']) !!}
					<br>
					{!! Form::label('email', 'E-mail *') !!}
					{!! Form::text('email', null, ['class'=>'form-control', 'title'=>'E-mail']) !!}
				</div>
			</div>
				<br>


		</div> {{-- ./col-md-6 --}}
				{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}

	</div> {{-- ./container --}}

@endsection