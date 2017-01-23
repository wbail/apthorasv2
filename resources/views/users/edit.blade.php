@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="page-header">
			<h1>Editando o usuário {{ $user->name }}</h1>
		</div>

		<div class="row">
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
			<div class="col-md-4">

				{!! Form::open(['url' => "/user/update/$user->id", 'method' => 'put']) !!}

					{!! Form::label('admin', "Admin *") !!}
					{!! Form::checkbox('admin', null, $user->admin, ['title'=>'Perfil de Usuário']) !!}
					<br><br>
					{!! Form::label('name', "Nome *") !!}
					{!! Form::text('name', $user->name, ['class'=>'form-control', 'title'=>'Nome de Usuário']) !!}
					<br>
					{!! Form::label('email', "E-mail *") !!}
					{!! Form::email('email', $user->email, ['class'=>'form-control', 'title'=>'Email do Usuário']) !!}
					<br>
					{!! Form::label('password', "Nova Senha *") !!}
					{!! Form::password('password',  ['class'=>'form-control', 'title'=>'Senha do Usuário']) !!}
					<br>
					{!! Form::label('password', "Confirmar Senha *") !!}
					{!! Form::password('password',  ['class'=>'form-control', 'title'=>'Repetir senha do Usuário']) !!}
					<br>
					{!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}

			</div> {{-- ./col-md-4 --}}
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}

		</div> {{-- ./row --}}

	</div> {{-- ./container --}}


@endsection