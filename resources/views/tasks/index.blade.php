@extends('layouts.app')

@section('content')
{{-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.0/css/bootstrap-slider.min.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">



    <style type="text/css">
        #ex1Slider .slider-selection {
            background: #BABABA;
        }
    </style>

 --}}
    <div class="container">

        <a class="btn btn-link pull-right" href="{{ url('/home') }}">Voltar</a>

        <div class="page-header">
            <h1>Tarefas</h1>
        </div>

        <br>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAddTask"><i class="fa fa-plus"></i>
            Nova Tarefa
        </button>
        <br>
        <br>

        @if(count($errors) > 0)
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-4"></div> {{-- ./col-md-4 --}}
            <div class="col-md-4">
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Timer</h3>
                    </div>
                    <div class="panel-body">
                        <h2 class="text-center">
                            <p><span id="my_timer">00:00:00</span></p>
                        </h2>
{{--                         <div class="text-center">
                            <button id="control" class="btn btn-primary" onclick="changeState();">Start</button>
                            <button id="reset" class="btn btn-default" onclick="reset();">Reset</button>
                        </div> --}}
                    </div>
                </div>
            </div> {{-- ./col-md-4 --}}
            <div class="col-md-4"></div> {{-- ./col-md-4 --}}
        </div> {{-- ./row --}}


        <div class="row">
            <div class="col-md-12">        
                <table data-order='[[0, "desc"]]' class="table table-striped table-hover table-bordered" id="defaulttable">
                    <thead>
                        <tr>
                            <th class="col-sm-1 text-left">Cód</th>
                            <th class="col-sm-1 text-left">Projeto</th>
                            <th class="col-sm-1 text-left">Task</th>
                            <th class="col-sm-1 text-center">Status</th>
                            <th class="col-sm-1 text-center">Responsável</th>
                            <th class="col-sm-1 text-center">Data Entrega</th>
                            <th class="col-sm-3 text-center">Timer</th>
                            <th class="col-sm-2 text-center">Ação</th>
                        </tr>
                        {{-- <th class="text-left">#</th> --}}
                    </thead>
                    <tbody>
                    @foreach($tasks as $tasks)
                        <tr>
                            <td class="text-center"> {{ $tasks->id }} </td>
                            <td class="text-center"> {{ $tasks->project->titulo }} </td>
                            <td>
                                <button id="{{ $tasks->id }}" value="{{ $tasks->id }}" class="btn btn-link" data-toggle="modal" data-target="#myModalDashboardTask" title="Resumo da tarefa"> {{ $tasks->descricao }} </button>
                            </td>
                            <td>
                                <div class="progress">
                                    @if($tasks->status >= 0 && $tasks->status <= 30)
                                        <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">
                                            {{ $tasks->status }}%
                                        </div>
                                    @elseif($tasks->status > 30 && $tasks->status <= 50)
                                        <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">
                                            {{ $tasks->status }}%
                                        </div>
                                    @elseif($tasks->status > 50 && $tasks->status <= 70)
                                        <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">
                                            {{ $tasks->status }}%
                                        </div>
                                    @elseif($tasks->status > 70 && $tasks->status < 100)
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">
                                            {{ $tasks->status }}%
                                        </div>
                                    @elseif($tasks->status == 100)
                                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{ $tasks->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $tasks->status }}%" title="{{ $tasks->status }}%">
                                            {{ $tasks->status }}%
                                        </div>
                                    @endif
                                   
                                </div>
                            </td>
                            <td>{{ $tasks->user->name }}</td>
                            <td class="text-center"><b>{{ Carbon\Carbon::parse($tasks->prazo_finalizacao)->format('d/m/Y') }}</b></td>
                            <td class="text-center">
                                <h6><p><span id="my_timer_{{ $tasks->id }}" value="" title="Hora Início">00:00:00</span></p></h6>
                                @if($tasks->status == 100)
                                <button id="control_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" onclick="changeState({{ $tasks->id }});" title="Iniciar Timer" disabled="disabled"><i class="fa fa-clock-o"></i></button>
                                <button id="control_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" data-toggle="modal" data-target="#myModalPauseTask" onclick="stop_timer({{ $tasks->id }});" title="Parar Timer" disabled="disabled"><i class="fa fa-stop"></i></button>
                                <button id="reset_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" onclick="reset({{ $tasks->id }});" title="Resetar Timer" disabled="disabled"><i class="fa fa-refresh"></i></button>
                                @else
                                <button id="control_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" onclick="changeState({{ $tasks->id }});" title="Iniciar Timer"><i class="fa fa-clock-o"></i></button>
                                <button id="control_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" data-toggle="modal" data-target="#myModalPauseTask" onclick="stop_timer({{ $tasks->id }});" title="Parar Timer"><i class="fa fa-stop"></i></button>
                                <button id="reset_{{ $tasks->id }}" class="btn btn-link " value="{{ $tasks->id }}" onclick="reset({{ $tasks->id }});" title="Resetar Timer"><i class="fa fa-refresh"></i></button>
                                @endif
                            </td>
                            <td class="text-center" valign="center">
                                <a id="{{ $tasks->id }}" class="btn btn-link" href="{{ route('tasks.edit', ['id'=>$tasks->id]) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                <button id="{{ $tasks->id }}" class="btn btn-link" data-toggle="modal" data-target="#myModalDelTask" title="Excluir"><i class="fa fa-trash"></i> </button>
                            </td>  
                        </tr>
                    @endforeach
                    </tbody>
                </table> {{-- ./table --}}
            </div> {{-- ./col-md-12 --}}
        </div> {{-- ./row --}}

    </div> {{-- ./container --}}

    <!-- Modal add task-->
    <div class="modal fade bs-example-modal-sm" id="myModalAddTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova tarefa</h4>
                </div>
                {!! Form::open(['route' => 'tasks.store']) !!}
                <div class="modal-body">                  
                    {!! Form::label('project', 'Projeto *') !!}
                    {!! Form::select('project', $projects, null, ['class'=>'form-control', 'id'=>'projectid', 'placeholder'=>'', 'title'=>'Atribuir tarefa a um projeto']) !!}
                    <br>
                    {!! Form::label('descricao', 'Descrição *') !!}
                    {!! Form::text('descricao', null, ['class'=>'form-control', 'title'=>'Breve descrição da tarefa']) !!}
                    <br>
                    {!! Form::label('prazo_finalizacao', 'Prazo para Finalização *') !!}
                    {!! Form::text('prazo_finalizacao', null, ['class'=>'form-control', 'id'=>'datetimepicker1', 'title'=>'Data para entrega da tarefa']) !!}
                    <br>
                    {!! Form::label('user', 'Atribuir a') !!}
                    {!! Form::select('user', $users, null, ['class'=>'form-control', 'placeholder'=>'', 'title'=>'Usuário que irá realizar a tarefa']) !!}
                    <br>
                    {!! Form::label('* Campos Obrigatórios') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Modal del task-->
    <div id="myModalDelTask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-footer del-task">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dashboard task-->
    <div class="modal fade" id="myModalDashboardTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelDashboard"></h4>
                </div>
                <div class="modal-body dashboard-body">
                </div>
                <div class="modal-footer dashboard-task">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pause timer task-->
    <div class="modal fade" id="myModalPauseTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelPause">Deseja realmente parar?</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'apontamentos.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('status', 'Progresso *') !!}
                            <br>
                            {!! Form::text('status', null, ['class'=>'form-inline', 'id'=>'ex1', 'data-slider-id'=>'ex1Slider', 'type'=>'text', 'data-slider-min'=>'0', 'data-slider-max'=>'100', 'data-slider-step'=>'1', 'value'=>'0']) !!}
                        </div> {{-- ./col-md-6 --}}
                        <div class="col-md-5"></div> {{-- ./col-md-5 --}}
                    </div> {{-- ./row --}}
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('comentario', 'Comentário') !!}
                            <br>
                            {!! Form::textarea('comentario', null, ['class'=>'form-control', 'id'=>'comentario', 'rows'=>'6']) !!}

                        </div> {{-- ./col-md-12 --}}

                    </div> {{-- ./row --}}
                </div>
                <div class="modal-footer pause-task">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal atalho teclado -->
    <div class="modal fade" id="myModalAtalhoTeclado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelAtalhoTeclado"></h4>
                </div>
                <div class="modal-body atalho-teclado-body">
                    <p>'F1' = Atalhos</p>
                    <br>
                    <p>'nt' = Nova Tarefa</p>
                </div>
                <div class="modal-footer atalho-teclado-task">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

{{-- 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.0/bootstrap-slider.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/lang/summernote-pt-BR.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.13/api/sum().js"></script>
 --}}
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
        },
        // fim language
    })
});

// atalho teclado

// Atalhos Teclado
var ene = false;
document.onkeyup = function(e) {
    if(e.which == 78) {
        ene = false;
    }
}
document.onkeydown = function(e) {
    
    if(e.which == 78) {
        ene = true;
    };

    if(e.which == 84 && ene == true) {
         $('#myModalAddTask').modal("show", function() {
            $('#myModalAddTask').on('show.bs.modal', function() {
                $('#projectid').focus();
            }); 
        });   
    }
}
// fim atalho teclado

// Slider JQuery
$('#ex1').slider({
    formatter: function(value) {
        tooltip: 'always',
        return value;
    }
});


// Timer
var active = false;

var hora_inicio;

function start_timer () {

    
    //console.log(taskid);

    if (active) {
        var timer = document.getElementById("my_timer").innerHTML;
        var arr = timer.split(":");
        var hour = arr[0];
        var min = arr[1];
        var sec = arr[2];

        if (sec == 59) {
            if(min == 59) {
                hour++;
                min = 0;
                if (hour < 10) {
                    hour = "0" + hour;
                };
            } else {
                min++;
            }
            if (min < 10) {
                min = "0" + min;
            }
            sec = 0;
        } else {
            sec++;
            if (sec < 10) {
                sec = "0" + sec;
            };
        }
    
        document.getElementById("my_timer").innerHTML = hour + ":" + min + ":" + sec;
        setTimeout(start_timer, 1000);
    };
}

function stop_timer(taskid) {
        
//     if (confirm('Deseja realmente parar?')) {
//         active = false;
//         document.getElementById("control_" + taskid).innerHTML = "Start";
//     }

    // Pausar task
    $('#myModalPauseTask').on('show.bs.modal', function(e) {
        
        var $modal = $(this);
        var taskid = e.relatedTarget.id;

        
        taskid = taskid.replace(/\D/g,''); // remover todos os caracteres não numéricos
        

        $modal.find('.modal-title').html('Deseja parar a task ' + taskid + '?');
        
        $modal.find('.col-md-5').html("<input name='task' type='hidden' class='form-control' value='" + taskid + "'/><input name='hora_inicio' type='hidden' class='form-control' value='" + hora_inicio + "'/>");

        //$modal.find('.pause-task').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="apontamentos/store' + '" class="btn btn-primary">Pause</a>');           
    });

}

function changeState(taskid) {


    if (active == false) {
        active = true;
        start_timer();
        hora_inicio = moment().format('YYYY-MM-DD HH:mm:ss');
        $('#my_timer_' + taskid).html(moment().format('HH:mm:ss'));
        //document.getElementById("control_" + taskid).innerHTML = "Stop";
    
    } 
    // else {
    //     active = true;
        
    //     if (confirm('Deseja realmente parar?')) {
    //         active = false;
    //         document.getElementById("control_" + taskid).innerHTML = "Start";
    //     }
    // }

}

function reset(taskid) {
    document.getElementById("my_timer").innerHTML = "00" + ":" + "00" + ":" + "00";
    $('#my_timer_' + taskid).html('Hora Início: 00:00:00');
}
// Fim timer


// Deletar task
$('#myModalDelTask').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var taskid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir o item ' + taskid  + '?');
    $modal.find('.del-task').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="tasks/destroy/' + taskid + '" class="btn btn-danger"> Excluir </a>');           
});


// Dashboard task
$('.btn-link').on('click', function(e) {    
        
    var taskid = $(this).val();
    
    $.get('tasks/show/' + taskid, function(task) {
        

        if (task.status == null) {
            task.status = 0;
        };

        $('#myModalLabelDashboard').html('Task ' + task.descricao);

        $('#ex1').value = task.status;

    
        $.get('apontamentos/show/' + taskid, function(apontamento) {
            

            if(apontamento == undefined) {
                apontamento = '';
            }

            var html = '<table class="table table-striped table-hover table-bordered"><thead><th>Usuário</th><th>Comentário</th></thead><tbody><tr>';
           
            for(var i = 0; i < apontamento.length; i++) {
                
                if (apontamento[i].comentario == null) {
                    apontamento[i].comentario = '';
                };
                
                html += '<tr><td>' + apontamento[i].name + '<br>' + $.format.date(apontamento[i].created_at, "dd/MM/yyyy HH:mm:ss") + '</td><td>' + apontamento[i].comentario + '</td></tr>';
            };
            
            html += '</tbody></table>';
            $('.dashboard-body').html(html);
        
        });
        
    });
        
});


// Summernote (paleta de edição comentário)
$(document).ready(function() {
    $('#comentario').summernote({
        lang: 'pt-BR',
        height: 150,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,                // set focus to editable area after initializing summernote
        placeholder: 'O que você fez durante esse tempo?',
        shortcuts: false,
        files: false,
    });
});


// Bootstrap DateTimePicker
$(function () {
    $('#datetimepicker1').datetimepicker({
        locale: 'pt-br',
        format: 'DD/MM/YYYY'
    });
});


</script>

 --}}
@endsection

