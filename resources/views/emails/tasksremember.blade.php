<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

{{-- Tradução da pág. com Carbon para pt_BR --}}
 
{{ \Carbon\Carbon::setLocale('pt_BR') }}


<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="page-header">
				Olá <h4>{{ $task->user->name }},</h4>
			</div>
			<div class="jumbotron">
				<p>
					<br>
					<br>
					Apenas um lembrete! A tarefa <strong><a href="http://45.55.249.65" target="_blank">Cód {{ $id }} - {{ $descricao }}</strong></a> tem data de entrega para daqui <strong>{{ Carbon\Carbon::parse($prazo_finalizacao)->diffForHumans(Carbon\Carbon::now()) }}</strong>! Dia <strong>{{ \Carbon\Carbon::parse($prazo_finalizacao)->format('d/m/Y') }}</strong>.
					<br>
					<br>
				</p>
				<p><a class="btn btn-primary btn-lg pull-center" href="http://45.55.249.65" role="button">Bora Fazer!</a></p>
			</div> {{-- ./jumbotron --}}
		</div> {{-- ./col-md-9 --}}
	</div> {{-- ./row --}}
	<p>
		<br>
		<br>
		Att,
		<br>
		<br>
		AptHoras², feito por <a href="http://45.55.249.65" target="_blank"><strong>GB Engenharia & Consultoria</strong></a>
	</p>
</div> {{-- ./container --}}


			