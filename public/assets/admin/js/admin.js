$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    

    $("#telefone").mask("(99) 9999.9999?9");
    $("#cep").mask("99.999-999");

    $('textarea').wysihtml5();
    $('#datatables').DataTable({
          "paging": true,
          "pageLength": 15,
          "language": {
            "sSearch": "Buscar",
            "oPaginate":{
              "sNext":"Próximo",
              "sPrevious":"Anterior",
            },
            "sInfo":"Mostrando _START_ de _END_ do total de _TOTAL_ registros",
            "sEmptyTable":"Nenhum registro",
            "sInfoEmpty":"Mostrando 0 to 0 de 0 registros",
          },
          
          "fixedColumns": false,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    //Date range picker
    $('#reservation').daterangepicker({
        timePicker: false, 
        format: 'DD/MM/YYYY',

        locale: {
            "format": "DD/MM/YYYY",
            "separator": "-",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Até",
            "customRangeLabel": "Custom",
            "weekLabel": "S",
            "daysOfWeek": ['D','S','T','Q','Q','S','S'],
            "monthNames": ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            "firstDay": 1
        },
    });
    
    
    $('#confirm-delete').on('show.bs.modal', function(e) {
        console.log($(e.relatedTarget).attr('href'))
        var target = $(e.relatedTarget).attr('href');
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).attr('href'));
       
    });
    $(".select2").select2();
    $(".select2").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });
    $(".colorpicker").colorpicker();
    
    

    
    
    
    $( document ).ready(function() {
    
        
    });
        
});




