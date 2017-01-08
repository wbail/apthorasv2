@extends('layouts.app')

@section('content')

	<div class="container">

		<a class="btn btn-link pull-right" href="{{ url('/home') }}">Voltar</a>

		<div class="page-header">
			<h1>Clientes</h1>
		</div>

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>CPF / CNPJ</th>
				<th>Nome do Cliente</th>
				<th class="text-center">Ação</th>
			</thead>
			@foreach($clients as $clients)
				<tbody>
					<td>{{ $clients->id }}</td>
					@if(strlen($clients->documento) == 11)
						<td class="cpf">{{ $clients->documento }}</td>
					@else
						<td class="cnpj">{{ $clients->documento }}</td>
					@endif
					<td>{{ $clients->nome_fantasia }}</td>
					<td class="text-center">
                    <a id="{{ $clients->id }}" class="btn btn-warning btn-sm" href="{{ route('clients.edit', ['id'=>$clients->id]) }}"><i class="fa fa-pencil"></i> Editar</a>
                    <button id="{{ $clients->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalDelClient"><i class="fa fa-trash"></i> Excluir</button>
					</td>
				</tbody>
			@endforeach
		</table> {{-- ./table --}}

	</div> {{-- ./container --}}

    <!-- Modal del client-->
    <div id="myModalDelClient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-footer del-client">
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

// Deletar Client
$('#myModalDelClient').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var clientid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir?');
    $modal.find('.del-client').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="clients/destroy/' + clientid + '" class="btn btn-danger"> Excluir </a>');           
});


</script>

@endsection