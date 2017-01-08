@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.0/css/bootstrap-slider.min.css" />


<style type="text/css">
    #ex1Slider .slider-selection {
        background: #BABABA;
    }
</style>


    <div class="container">

        <a class="btn btn-link pull-right" href="{{ url('/home') }}">Voltar</a>

        <div class="page-header">
            <h1>Timer</h1>
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
            {{-- <div class="col-md-12"> --}}
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tarefas</h3>
                    </div> {{-- ./panel-heading --}}
                    <div class="panel-body">
                        <table class="table table-striped table-hover table-bordered" id="defaulttable">
                            <thead>
                                {{-- <th class="text-left">#</th> --}}
                                <th class="col-sm-1 text-left">Projeto</th>
                                <th class="col-sm-1 text-left">Task</th>
                                <th class="col-sm-1 text-center">Status</th>
                                <th class="col-sm-1 text-center">Responsável</th>
                                <th class="col-sm-1 text-center">Data Entrega</th>
                                <th class="col-sm-2 text-center">Ação</th>
                                <th class="col-sm-2 text-center">Timer</th>
                            </thead>
                            @foreach($tasks as $tasks)
                            <tbody>
                                
                                <td class="text-center"> {{ $tasks->project->titulo }} </td>
                                <td>
                                    <button id="{{ $tasks->id }}" value="{{ $tasks->id }}" class="btn btn-link" data-toggle="modal" data-target="#myModalDashboardTask" title="Resumo da tarefa"> {{ $tasks->descricao }} </button>
                                </td>
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
                                <td>{{ $tasks->user->name }}</td>
                                <td class="text-center"><b>{{ Carbon\Carbon::parse($tasks->prazo_finalizacao)->format('d/m/Y') }}</b></td>
                                <td class="text-center" valign="center">
                                    <a id="{{ $tasks->id }}" class="btn btn-warning btn-sm" href="{{ route('tasks.edit', ['id'=>$tasks->id]) }}"><i class="fa fa-pencil"></i> Editar</a>
                                    <button id="{{ $tasks->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalDelTask"><i class="fa fa-trash"></i> Excluir</button>
                                </td>
                                <td class="text-center">
                                    <p><span id="my_timer_{{ $tasks->id }}" value=""> Hora Início: 00:00:00</span></p>
                                    <button id="control_{{ $tasks->id }}" class="btn btn-primary btn-sm" value="{{ $tasks->id }}" onclick="changeState({{ $tasks->id }});">Start</button>
                                    <button id="control_{{ $tasks->id }}" class="btn btn-danger btn-sm" value="{{ $tasks->id }}" data-toggle="modal" data-target="#myModalPauseTask" onclick="stop_timer({{ $tasks->id }});">Stop</button>
                                    <button id="reset_{{ $tasks->id }}" class="btn btn-default btn-sm" value="{{ $tasks->id }}" onclick="reset({{ $tasks->id }});">Reset</button>
                                </td>
                            </tbody>
                            @endforeach
                        </table> {{-- ./table --}}
                    </div> {{-- ./panel-body --}}
                </div> {{-- ./panel-default --}}
            {{-- </div> --}} {{-- ./col-md-12 --}}

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
        <div class="modal-dialog modal-sm">
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
                            
                            {!! Form::text('status', null, ['class'=>'form-inline', 'id'=>'ex1', 'data-slider-id'=>'ex1Slider', 'type'=>'text', 'data-slider-min'=>'0', 'data-slider-max'=>'100', 'data-slider-step'=>'1', 'data-slider-value'=>'0']) !!}
                            
                        </div> {{-- ./col-md-6 --}}
                        <div class="col-md-5">
                            
                            
                        </div> {{-- ./col-md-5 --}}
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


<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" data-require="bootstrap@*" data-semver="3.1.1"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.0/bootstrap-slider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
{{-- <script type="text/javascript" src="{{ url('../resources/assets/js/main.js') }}"></script>  --}}



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.js"></script> --}}
{{-- <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> --}}

<script type="text/javascript">

// t para nova tarefa

document.onkeydown = function(e) {
    
    if(e.which == 84) {
        $('#myModalAddTask').modal("show", function() {

            $('#myModalAddTask').on('show.bs.modal', function() {
                $('#projectid').focus();
            });
            
        });
        
    }

}





// Without JQuery
var slider = new Slider('#ex1', {
    formatter: function(value) {
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


$(function () {
    $('#defaulttable').DataTable();
});


// Deletar task
$('#myModalDelTask').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var taskid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir o item ' + taskid  + '?');
    $modal.find('.del-task').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="/tasks/destroy/' + taskid + '" class="btn btn-danger"> Excluir </a>');           
});


// Dashboard task
$('.btn-link').on('click', function(e) {    
        
    var taskid = $(this).val();
    
    $.get('tasks/show/' + taskid, function(task) {
        //console.log(task);

        if (task.status == null) {
            task.status = 0;
        };

        $('#myModalLabelDashboard').html('Task ' + task.descricao);
        
        $('.dashboard-body').html('{!! Form::label("created_at", "Criado em ") !!}' +  $.format.date(task.created_at, " dd/MM/yyyy") + '<br>' + '{!! Form::label("user", "Criado por") !!} ' + task.user_id + '<br>' + '{!! Form::label("status", "Conclusão ") !!} ' + task.status + '%' + '<br>');
    });
        
});


// Trazer status no slider
// $('.btn-danger').on('click', function(e) {    
        
//     var taskid = $(this).val();
    
//     $.get('tasks/show/' + taskid, function(task) {
//         //console.log(task);

//         if (task.status == null) {
//             task.status = 0;
//         };

//         // $('.col-md-6').html('{!! Form::label("status", "Progresso *") !!}<br>{!! Form::text("status", null, ["class"=>"form-inline", "id"=>"ex1", "data-slider-id"=>"ex1Slider", "type"=>"text", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"' + task.status + '"]) !!}');
//         $('.col-md-6').html('{!! Form::label("status", "Progresso *") !!}<br><input name="status" id="ex1" data-slider-id="ex1Slider" type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>');
//     });
        
// });





</script>

@endsection