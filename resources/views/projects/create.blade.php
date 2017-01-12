@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/projects') }}">Voltar</a>

		<div class="page-header">
			<h1>Novo Projeto</h1>
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

			{!! Form::open(['route'=>'projects.store']) !!}
				{!! Form::label('Título *') !!}
				{!! Form::text('titulo', null, ['class'=>'form-control', 'title'=>'Título do Projeto']) !!}
				<br>
				{!! Form::label('Cliente *') !!}
				{!! Form::select('cliente', $clients, null, ['class'=>'form-control', 'placeholder'=>'', 'title'=>'Cliente dono do projeto']) !!}
				<br>
				{!! Form::label('Data de Entrega *') !!}
				{!! Form::text('data_entrega', null, ['class'=>'form-control', 'title'=>'Data de entrega do projeto', 'id'=>'datetimepicker1']) !!}
				<br>
				{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}

		</div> {{-- ./col-md-4 --}}
		<div class="col-md-4"></div> {{-- ./col-md-4 --}}
	</div> {{-- ./container --}}


{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.css">
 --}}
<script type="text/javascript">

    $(function () {
        $('#datetimepicker1').datetimepicker({
            locale: 'pt-br',
            format: 'DD/MM/YYYY'
        });
    });



</script>



@endsection