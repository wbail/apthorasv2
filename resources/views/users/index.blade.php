@extends('layouts.app')

@section('content')

	{{-- Tradução da pág. com Carbon para pt_BR --}}
	 
	{{ \Carbon\Carbon::setLocale('pt_BR') }}
	
	<div class="container">

		<div class="page-header">
			<h1>Minhas Tarefas</h1>
		</div>

		<table class="table table-striped table-bordered table-hover" id="defaulttable">
			<thead>
				<th>#</th>
				<th>Projeto</th>
				<th>Criado Por</th>
				<th>Tarefa</th>
				<th>Criada há</th>
				<th>Status</th>
				<th>Tempo Gasto (até o momento)</th>
			</thead>
			@foreach($tasks as $tasks)
			<tbody>
				<td>{{ $tasks->id }}</td>
				<td>{{ $tasks->titulo }}</td>
				<td>{{ $tasks->name }}</td>
				<td>{{ $tasks->descricao }}</td>
				<td>{{ Carbon\Carbon::parse($tasks->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>
				{{-- <td>{{ Carbon\Carbon::parse($tasks->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td> --}}
                <td>
	                <div class="progress">
	                    @if($tasks->status >= 0 && $tasks->status <= 30)
	                        <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%"></div>
	                    @elseif($tasks->status > 30 && $tasks->status <= 50)
	                        <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%"></div>
	                    @elseif($tasks->status > 50 && $tasks->status <= 70)
	                        <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%"></div>
	                    @elseif($tasks->status > 70 && $tasks->status < 100)
	                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%"></div>
	                    @elseif($tasks->status == 100)
	                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%"></div>
	                    @endif
	                </div>
                </td>
                <td>{{ $tasks->diff }}</td>
			</tbody>
			@endforeach
		</table> {{-- ./table --}}
	</div> {{-- ./container --}}

<script type="text/javascript">

	$('#defaulttable').Datatables();

</script>

@endsection