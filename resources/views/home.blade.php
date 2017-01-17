@extends('layouts.app')

@section('content')

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" data-require="bootstrap@*" data-semver="3.1.1"></script>
 --}}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <!-- Split button -->
                    <div class="btn-group">
                        <a class="btn btn-danger" href="{{ url('/projects') }}" type="button"><i class="fa fa-line-chart"></i> Projetos</a>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/projects/novo') }}"><i class="fa fa-plus"></i> Novo Projeto</a></li>
                        </ul>
                    </div>
                    <!-- Split button -->
                    <div class="btn-group">
                        <a class="btn btn-primary" href="{{ url('/tasks') }}" type="button"><i class="fa fa-list"></i> Tarefas</a>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/tasks') }}"><i class="fa fa-plus"></i> Nova Tarefa</a></li>
                        </ul>
                    </div>
                    <!-- Split button -->
                    <div class="btn-group">
                        <a class="btn btn-info" href="{{ url('/clients') }}" type="button"><i class="fa fa-user-circle-o"></i> Clientes</a>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/clients/novo') }}"><i class="fa fa-plus"></i> Novo Cliente</a></li>
                        </ul>
                    </div>
                    <!-- Split button -->
                    <div class="btn-group">
                        <a class="btn btn-default" href="{{ url('/my-tasks') }}" type="button"><i class="fa fa-dashboard"></i> Minhas Tarefas</a>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Link</a></li>
                        </ul>
                    </div>                    
                </div> {{-- ./panel-body --}}
            </div> {{-- ./panel --}}
        </div> {{-- ./col-md-8 --}}
    </div> {{-- ./row --}}
</div> {{-- ./container --}}


@endsection
