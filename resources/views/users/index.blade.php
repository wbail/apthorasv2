@extends('layouts.app')

@section('content')
	

{{-- 
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.0/bootstrap-slider.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/lang/summernote-pt-BR.js"></script>
 --}}

	{{-- Tradução da pág. com Carbon para pt_BR --}}
	 
	{{ \Carbon\Carbon::setLocale('pt_BR') }}
	
	<div class="container">

		<div class="page-header">
			<h1>Minhas Tarefas</h1>
		</div>

		<table class="table table-striped table-bordered table-hover display" id="defaulttable">
			<thead>
				<tr>
					<th>#</th>
					<th>Projeto</th>
					<th>Criado Por</th>
					<th>Tarefa</th>
					<th>Criada há</th>
					<th>Status</th>
					<th>Tempo Gasto (até o momento)</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tasks as $tasks)
				<tr>
					<td>{{ $tasks->id }}</td>
					<td>{{ $tasks->titulo }}</td>
					<td>{{ $tasks->name }}</td>
					<td>{{ $tasks->descricao }}</td>
					<td>{{ Carbon\Carbon::parse($tasks->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>
	                <td>
		                <div class="progress">
		                    @if($tasks->status >= 0 && $tasks->status <= 30)
		                        <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">{{ $tasks->status }}%</div>
		                    @elseif($tasks->status > 30 && $tasks->status <= 50)
		                        <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">{{ $tasks->status }}%</div>
		                    @elseif($tasks->status > 50 && $tasks->status <= 70)
		                        <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">{{ $tasks->status }}%</div>
		                    @elseif($tasks->status > 70 && $tasks->status < 100)
		                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">{{ $tasks->status }}%</div>
		                    @elseif($tasks->status == 100)
		                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">{{ $tasks->status }}%</div>
		                    @endif
		                </div>
	                </td>
	                <td>{{ $tasks->diff }}</td>
				</tr>
			@endforeach
			</tbody>
			<tfoot></tfoot>
		</table> {{-- ./table --}}
	</div> {{-- ./container --}}
{{-- 
<script type="text/javascript">

// DataTable
$(document).ready(function() {
    $('#defaulttable').DataTable({
        "language": {
            
            "decimal":        "",
            "emptyTable":     "Nenhum registro",
            "info":           "Mostrando _START_ de _END_ de um total de _TOTAL_ registros",
            "infoEmpty":      "Mostrando 0 to 0 de 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ registros",
            "loadingRecords": "Carregando...",
            "processing":     "Procesando...",
            "search":         "Procurar:",
            "zeroRecords":    "Nenhum registro encontrado",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
            
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
        },

        
    });
});


</script>
 --}}
@endsection


