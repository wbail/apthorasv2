@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="page-header">
			<h1>Admin</h1>
		</div>

		<div class="row">

			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Usuários</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>Usuário</th>
									<th>E-Mail</th>
									<th class="text-center">Ação</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td class="text-center">
										<a id="{{ $user->id }}" class="btn btn-link" href="{{ url('user/edit', ['id'=>$user->id]) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                		<button id="{{ $user->id }}" value="{{ $user->id }}" class="btn btn-link" data-toggle="modal" data-target="#myModalDelUser" title="Excluir"><i class="fa fa-trash"></i> </button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table> {{-- ./table --}}
					</div> {{-- ./panel-body --}}
				</div> {{-- ./panel --}}
			</div> {{-- ./col-md-7 --}}


			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Task x Usuário</h3>
					</div>
					<div class="panel-body">
						<table id="defaulttable" class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>Usuário</th>
									<th title="Qnt Tasks Complete">TC</th>
									<th title="Qnt Tasks Pending">TP</th>
								</tr>
							</thead>
							<tbody>
								@foreach($query as $query)
								<tr>
									<td>{{ $query->name }}</td>
									<td>{{ $query->tc }}</td>
									<td>{{ $query->tp }}</td>
								</tr>
								@endforeach
							</tbody>
						</table> {{-- ./table --}}
					</div> {{-- ./panel-body --}}
				</div> {{-- ./panel --}}
			</div> {{-- ./col-md-5 --}}
		</div> {{-- ./row --}}


		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Projeto x Task</h3>
					</div>
					<div class="panel-body">
						<table id="defaulttable" class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>Cliente</th>
									<th>Projeto</th>
									<th>Fase</th>
									<th>Status</th>
									<th title="Qnt Tasks Complete">TC</th>
									<th title="Qnt Tasks Pending">TP</th>
								</tr>
							</thead>
							<tbody>
								@foreach($queryproject as $queryproject)
								<tr>
									<td>{{ $queryproject->cliente }}</td>
									<td>{{ $queryproject->titulo }}</td>
									<td>{{ $queryproject->fase }}</td>
									<td>
		                                <div class="progress">
		                                    @if($queryproject->status >= 0 && $queryproject->status <= 30)
		                                        <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="{{ $queryproject->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $queryproject->status }}%" title="{{ $queryproject->status }}%">
		                                            {{ $queryproject->status }}%
		                                        </div>
		                                    @elseif($queryproject->status > 30 && $queryproject->status <= 50)
		                                        <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="{{ $queryproject->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $queryproject->status }}%" title="{{ $queryproject->status }}%">
		                                            {{ $queryproject->status }}%
		                                        </div>
		                                    @elseif($queryproject->status > 50 && $queryproject->status <= 70)
		                                        <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="{{ $queryproject->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $queryproject->status }}%" title="{{ $queryproject->status }}%">
		                                            {{ $queryproject->status }}%
		                                        </div>
		                                    @elseif($queryproject->status > 70 && $queryproject->status < 100)
		                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $queryproject->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $queryproject->status }}%" title="{{ $queryproject->status }}%">
		                                            {{ $queryproject->status }}%
		                                        </div>
		                                    @elseif($queryproject->status == 100)
		                                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{ $queryproject->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $queryproject->status }}%" title="{{ $queryproject->status }}%">
		                                            {{ $queryproject->status }}%
		                                        </div>
		                                    @endif                           
	        	                        </div>
									</td>
									<td>{{ $queryproject->tc }}</td>
									<td>{{ $queryproject->tp }}</td>
								</tr>
								@endforeach
							</tbody>
						</table> {{-- ./table --}}
					</div> {{-- ./panel-body --}}
				</div> {{-- ./panel --}}

			</div> {{-- ./col-md-7 --}}
			<div class="col-md-5">

			</div> {{-- ./col-md-5 --}}
		</div> {{-- ./row --}}



	</div> {{-- ./container --}}



    <!-- Modal del user-->
    <div id="myModalDelUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-footer del-user">
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>

<script type="text/javascript">

//Deletar user
$('#myModalDelUser').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var userid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir o usuário?');
    $modal.find('.del-user').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="user/destroy/' + userid + '" class="btn btn-danger"> Excluir </a>');           
});

</script>


@endsection