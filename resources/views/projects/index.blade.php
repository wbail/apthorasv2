@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/home') }}">Voltar</a>

		<div class="page-header">
			<h1>Projetos</h1>
		</div>

		<table class="table table-striped table-hover table-bordered" id="defaulttable">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Data de Entrega</th>
					<th>Cliente</th>
					<th>Inserido Por</th>
					<th>Fase</th>
					<th>Status</th>
					<th class="text-center">Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($projects as $projects)
				<tr>
					<td>{{ $projects->id }}</td>
					<td>{{ $projects->titulo }}</td>
					<td>{{ Carbon\Carbon::parse($projects->data_entrega)->format('d/m/Y') }}</td>
					<td>{{ $projects->client->nome_fantasia }}</td>
					<td>{{ $projects->user->name }}</td>
					@if($projects->fase == 0)
						<td>Iniciação</td>
					@elseif($projects->fase == 1)
						<td>Planejamento</td>
					@elseif($projects->fase == 2)
						<td>Execução</td>
					@elseif($projects->fase == 3)
						<td>Monitoramento e Controle</td>
					@elseif($projects->fase == 4)
						<td>Finalização</td>
					@endif
					<td>
			            <div class="progress">
	                        @if($projects->status >= 0 && $projects->status <= 30)
	                            <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="{{ $projects->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projects->status }}%" title="{{ $projects->status }}%">
	                                {{ $projects->status }}%
	                            </div>
	                        @elseif($projects->status > 30 && $projects->status <= 50)
	                            <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="{{ $projects->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projects->status }}%" title="{{ $projects->status }}%">
	                                {{ $projects->status }}%
	                            </div>
	                        @elseif($projects->status > 50 && $projects->status <= 70)
	                            <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="{{ $projects->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projects->status }}%" title="{{ $projects->status }}%">
	                                {{ $projects->status }}%
	                            </div>
	                        @elseif($projects->status > 70 && $projects->status < 100)
	                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $projects->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projects->status }}%" title="{{ $projects->status }}%">
	                                {{ $projects->status }}%
	                            </div>
	                        @elseif($projects->status == 100)
	                            <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{ $projects->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projects->status }}%" title="{{ $projects->status }}%">
	                                {{ $projects->status }}%
	                            </div>
	                        @endif
	                    </div> {{-- ./progress --}}
					</td>
					<td class="text-center">
						<a href="{{ route('projects.edit', ['id'=>$projects->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar</a>
						<button id="{{ $projects->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalDelProject"><i class="fa fa-trash"></i> Excluir</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table> {{-- ./table --}}

	</div> {{-- ./container --}}

    <!-- Modal del project-->
    <div id="myModalDelProject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-footer del-project">
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
// Deletar project
// $('#myModalDelProject').on('show.bs.modal', function(e) {
    
//     var $modal = $(this);
//     var projectid = e.relatedTarget.id;
//     $modal.find('.modal-title').html('Deseja realmente excluir?');
//     $modal.find('.del-project').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="projects/destroy/' + projectid + '" class="btn btn-danger"> Excluir </a>');           
// });

</script>

@endsection