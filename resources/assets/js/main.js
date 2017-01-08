// Masks
$('.date').mask('00/00/0000');
$('.time').mask('00:00:00');
$('.date_time').mask('00/00/0000 00:00:00');
$('.cep').mask('00000-000');
$('.phone').mask('0000-0000');
$('.phone_with_ddd').mask('(00) 0000-0000');
$('.phone_us').mask('(000) 000-0000');
$('.mixed').mask('AAA 000-S0S');
$('.cpf').mask('000.000.000-00', {reverse: true});
$('.cnpj').mask('00.000.000/0000-00');

$('.btn-primary').click(function(){
    $('.cpf').unmask();
    $('.cnpj').unmask();
    $('.phone').unmask();
    $('.phone_with_ddd').unmask();
    $('.money').unmask();
    $('.money2').unmask();
});

// Bootstrap DateTimePicker
$(function () {
    $('#datetimepicker1').datetimepicker({
        locale: 'pt-br',
        format: 'DD/MM/YYYY'
    });
});



// Timer
var active = false;

function start_timer () {

    //var taskid = relatedTarget.id;
    alert(taskid);

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

function changeState() {
    if (active == false) {
        active = true;
        start_timer();
        document.getElementById("control").innerHTML = "Stop";
    } else {
        active = true;
        if (confirm('Deseja realmente parar?')) {
            active = false;
            document.getElementById("control").innerHTML = "Start";
        }
    }
}

function reset() {
    document.getElementById("my_timer").innerHTML = "00" + ":" + "00" + ":" + "00";
}
// Fim timer

// DataTable
// $('#defaulttable').DataTable({
    
//     "language": {
        
//         "decimal":        "",
//         "emptyTable":     "Nenhum registro",
//         "info":           "Mostrando _START_ de _END_ de um total de _TOTAL_ registros",
//         "infoEmpty":      "Mostrando 0 to 0 de 0 registros",
//         "infoFiltered":   "(filtrado de _MAX_ registros)",
//         "infoPostFix":    "",
//         "thousands":      ",",
//         "lengthMenu":     "Mostrar _MENU_ registros",
//         "loadingRecords": "Carregando...",
//         "processing":     "Procesando...",
//         "search":         "Procurar:",
//         "zeroRecords":    "Nenhum registro encontrado",
//         "paginate": {
//             "first":      "Primeiro",
//             "last":       "Último",
//             "next":       "Próximo",
//             "previous":   "Anterior"
//         },
        
//         "aria": {
//             "sortAscending":  ": activate to sort column ascending",
//             "sortDescending": ": activate to sort column descending"
//         },
//     }
// });
// Fim DataTable

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
        console.log(task);
        $('#myModalLabelDashboard').html('Task ' + task.descricao);
        
        $('.modal-body').html('{!! Form::label("created_at", "Criado em ") !!}' +  $.format.date(task.created_at, " dd/MM/yyyy") + '<br>' + '{!! Form::label("user", "Criado por") !!} ' + task.user_id + '<br>' + '{!! Form::label("status", "Conclusão ") !!} ' + task.status + '%' + '<br>');
    });
        
});

