@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/tasks') }}">Voltar</a>

		<div class="page-header">
			<h1>Editando a Task '{{ $tasks->descricao }}'</h1>
		</div>

		<div class="row">
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
			<div class="col-md-4">
				{!! Form::open(['url'=>"tasks/update/$tasks->id", 'method'=>'put']) !!}
					
					{!! Form::label('project', 'Projeto *') !!}
					{!! Form::select('project', $projects, $tasks->project->id, ['class'=>'form-control']) !!}
					
					<br>					
					{!! Form::label('descricao', 'Descrição *') !!}
					{!! Form::text('descricao', $tasks->descricao, ['class'=>'form-control']) !!}
					<br>
					{!! Form::label('status', '% Conclusão') !!}
					{!! Form::number('status', $tasks->status, ['class'=>'form-control']) !!}
					<br>
					{!! Form::label('prazo_finalizacao', 'Prazo para Finalização *') !!}
					{!! Form::text('prazo_finalizacao', Carbon\Carbon::parse($tasks->prazo_finalizacao)->format('d/m/Y'), ['class'=>'form-control', 'id'=>'datetimepicker1']) !!}
					<br>
					{!! Form::label('user', 'Responsável *') !!}
					{!! Form::select('user', $users, $tasks->user->id, ['class'=>'form-control']) !!}
					<br>
					{!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}

			</div> {{-- ./col-md-4 --}}
			<div class="col-md-4"></div> {{-- ./col-md-4 --}}
		</div> {{-- ./row --}}

	</div> {{-- ./container --}}

<script type="text/javascript">
	
    // $(function () {
    //     $('#datetimepicker1').datetimepicker({
    //         locale: 'pt-br',
    //         format: 'DD/MM/YYYY'
    //     });
    // });
    
</script>

@endsection