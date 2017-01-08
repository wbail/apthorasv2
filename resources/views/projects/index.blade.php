@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="page-header">
			<h1>Projetos</h1>
		</div>

		<table class="table table-striped">
			<thead>
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
						<a href="{{ route('projects.edit', ['id'=>$projects->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar</a>
						<button id="{{ $projects->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalDelProject"><i class="fa fa-trash"></i> Excluir</button>
					</td>
				</tbody>
			@endforeach
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
$('#myModalDelProject').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var projectid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir?');
    $modal.find('.del-project').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="projects/destroy/' + projectid + '" class="btn btn-danger"> Excluir </a>');           
});


</script>

@endsection