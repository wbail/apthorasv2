// Masks
$('.date').mask('00/00/0000');
$('.time').mask('00:00:00');
$('.date_time').mask('00/00/0000 00:00:00');
$('.cep').mask('00000-000');
$('.phone').mask('00000-0000');
$('.phone_with_ddd').mask('(00) 00000-0000');
$('.phone_us').mask('(000) 000-0000');
$('.mixed').mask('AAA 000-S0S');
$('.cpf').mask('000.000.000-00');
$('.cnpj').mask('00.000.000/0000-00');

$('.btn-primary').click(function(){
    $('.cpf').unmask();
    $('.cnpj').unmask();
    $('.phone').unmask();
    $('.phone_with_ddd').unmask();
    $('.money').unmask();
    $('.money2').unmask();
});

// DataTable
$(document).ready(function() {

    $('table.display').DataTable({
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
        }, // fim language

    });
});

// atalho teclado

// Nova tarefa
// var ene = false;
// document.onkeyup = function(e) {
//     if(e.which == 78) ene = false;
// };
// document.onkeydown = function(e){
//     if(e.which == 78) ene = true;
//     if(e.which == 84 && ene == true) {
//          $('#myModalAddTask').modal("show", function() {
//             $('#myModalAddTask').on('show.bs.modal', function() {
//                 $('#projectid').focus();
//             }); 
//         });   
//     }
// }
var alt = false;
document.onkeyup = function(e) {
    if(e.which == 18) alt = false;
};
document.onkeydown = function(e){
    if(e.which == 18) alt = true;
    if(e.which == 84 && alt == true) {
         $('#myModalAddTask').modal("show", function() {
            $('#myModalAddTask').on('show.bs.modal', function() {
                $('#projectid').focus();
            }); 
        });   
    }
}
// fim atalho teclado

//Slider JQuery
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

// Deletar project
$('#myModalDelProject').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var projectid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir?');
    $modal.find('.del-project').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="projects/destroy/' + projectid + '" class="btn btn-danger"> Excluir </a>');           
});

// Deletar Client
$('#myModalDelClient').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var clientid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir?');
    $modal.find('.del-client').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="clients/destroy/' + clientid + '" class="btn btn-danger"> Excluir </a>');           
});

// Deletar task
$('#myModalDelTask').on('show.bs.modal', function(e) {
    
    var $modal = $(this);
    var taskid = e.relatedTarget.id;
    $modal.find('.modal-title').html('Deseja realmente excluir o item ' + taskid  + '?');
    $modal.find('.del-task').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="tasks/destroy/' + taskid + '" class="btn btn-danger"> Excluir </a>');           
});

// Deletar user
// $('#myModalDelUser').on('show.bs.modal', function(e) {
    
//     var $modal = $(this);
//     var userid = e.relatedTarget.id;
//     $modal.find('.modal-title').html('Deseja realmente excluir o usuário?');
//     $modal.find('.del-user').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button><a href="user/destroy/' + userid + '" class="btn btn-danger"> Excluir </a>');           
// });



// Dashboard task
$('.btn-link').on('click', function(e) {    
        
    var taskid = $(this).val();
    
    $.get('tasks/show/' + taskid, function(task) {
        //console.log(task);
        
        if (task.status == null) {
            task.status = 0;
        };

        $('#myModalLabelDashboard').html('Task ' + task.descricao);
    
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
            }
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

