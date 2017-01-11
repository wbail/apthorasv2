@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/clients') }}">Voltar</a>

		<div class="page-header">
			<h1>Editando o cliente {{ $clients->nome_fantasia }}</h1>
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

			{!! Form::open(['url'=>"clients/update/$clients->id", 'method'=>'put']) !!}
				{!! Form::label('nome_fantasia', 'Nome do Cliente *') !!}
				{!! Form::text('nome_fantasia', $clients->nome_fantasia, ['class'=>'form-control', 'title'=>'Nome fantiasia do cliente']) !!}
				<br>
				{!! Form::label('documento', 'CPF ou CNPJ *') !!}
				@if(strlen($clients->documento) == 11)
				{!! Form::text('documento', $clients->documento, ['class'=>'form-control cpf', 'title'=>'CPF ou CNPJ do cliente sem pontos']) !!}
				@else
				{!! Form::text('documento', $clients->documento, ['class'=>'form-control cnpj', 'title'=>'CPF ou CNPJ do cliente sem pontos']) !!}
				@endif
				<br>
				{!! Form::label('telefone', 'Telefone *') !!}
				{!! Form::text('telefone', $clients->telefone, ['class'=>'form-control phone_with_ddd', 'title'=>'Telefone com DDD']) !!}
				<br>
				{!! Form::label('email', 'E-mail *') !!}
				{!! Form::text('email', $clients->email, ['class'=>'form-control', 'title'=>'E-mail']) !!}
				<br>
				{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}

		</div> {{-- ./col-md-4 --}}
		<div class="col-md-4"></div> {{-- ./col-md-4 --}}

	</div> {{-- ./container --}}

<script type="text/javascript">

$('.btn-primary').click(function() {
    $('.cpf').unmask();
    $('.cnpj').unmask();
});

</script>


@endsection