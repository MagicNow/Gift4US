$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( document ).ready(function() {
        
        
    });



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
            "sInfo":"Mostrando _START_ to _END_ de _TOTAL_ registros",
            "sEmptyTable":"Nenhum registro",
            "sInfoEmpty":"Mostrando 0 to 0 de 0 registros",
          },
          
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
    });
    
    $("#showHide").click(function () {
        if ($(".password").attr("type")=="password") {
            $(".password").attr("type", "text");
        }
        else{
            $(".password").attr("type", "password");
        }
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
    
    function slug(str){
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    $('select#eventos').change(function () {
        var evento = $(this).val();
        carrega_salas(evento);
    });
    function carrega_salas(evento){
        console.log('evento',evento)
        $.get('/moderador/get-salas/' + evento, function (salas) {
            $('select[name=salas]').empty();
            $.each(salas, function (key, value) {
                $('select[name=salas]').append('<option value=' + value.id + '>' + value.sala + '</option>');                    
            });
        });
    }
    $('select#salas').change(function () {
        var sala = $(this).val();
        carrega_palestras(sala);
    });

    function carrega_palestras(sala){
        console.log('sala',sala)
        $.get('/moderador/get-palestra/' + sala, function (palestras) {
            $('select[name=palestras]').empty();
            $.each(palestras, function (key, value) {
                $('select[name=palestras]').append('<option value=' + value.id + '>' + value.painel + '</option>');                    
            });
        });
    }

    $('.header-moderador a').on('click',function(e){
        var c = $(this).data('align');
        console.log('class',c);

        $('.header-moderador a').removeClass('active');
        $(this).addClass('active');
        $('.perguntas').fadeOut('slow')
        $('.perguntas').fadeOut( "slow", function() {
            $('.perguntas').removeClass('list').removeClass('grid').addClass(c).fadeIn('slow');
        });
    });
    
    $('.trash').on('click',function(e){
        var $this = $(this);
        $.ajax({
            url: baseUrl+'/moderador/trash/'+$(this).data('id'),
            type: 'POST',
            data: 'token='+token,
            dataType: 'json',
            success: function(data) {
                $('.list-mediador').fadeOut( "slow", function() {
                    $('.list-mediador').html('');
                    $.each(data.mediador, function (key, value) {
                        var d = new Date(value.created_at),
                            h = d.getHours(),
                            m = d.getMinutes(),
                            html = "<li>"+
                                        "<div class='text'>"+
                                            "<p><span class='time'>"+h+":"+m+"</span> -  Lorem ipsum dolor</p>"+
                                            "<p>"+ value.pergunta +"</p>"+
                                        "</div>"+
                                        "<a href='#' data-id='"+ value.id +"' class='trash'></a>"+
                                    "</li>";

                        $('.list-mediador').append(html);                    
                    });
                });    
                $('.content-moderador div.perguntas').fadeOut( "slow", function() {
                    $('.content-moderador div.perguntas').html('');
                    $.each(data.todas, function (key, value) {
                        var d = new Date(value.created_at),
                            h = d.getHours(),
                            m = d.getMinutes(),
                            html = "<div class='col-lg-6'>"+
                                    "<div class='box'>"+
                                        "<div class='box-header'><span class='time'>"+h+":"+m+"</span> -  Lorem ipsum dolor</div>"+
                                        "<div class='box-body'>"+ value.pergunta +"</div>"+
                                        "<div class='box-footer'>"+
                                            "<a href='#' data-id='"+ value.id +"' class='favorito'></a>"+
                                            "<a href='#' data-id='"+ value.id +"' class='encaminhar'></a>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>";

                        $('.content-moderador div.perguntas').append(html);                    
                    });
                });
                $('.content-moderador div.perguntas').fadeIn( "slow");
                $('.list-mediador').fadeIn( "slow");
                
                $this.parents('.col-lg-6').remove();
            }

        });

    });

    $('#Modal-pergunta').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        var html = button.data('pergunta');
        var id = button.data('id');
        var modal = $(this);
            modal.find('.modal-body .pergunta').text(html);
            modal.find('.modal-footer .salvar').text('Enviar para o ar');
            console.log('modal',id);
        $('.salvar').unbind();
        $('.salvar').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: baseUrl+'/mediador/encaminhar/'+id,
                type: 'POST',
                data: 'token='+token,
                dataType: 'json',
                success: function(data) {
                    window.location.reload(true);
                }

            });
        });    
    }); 
    $('#Modal-nova-pergunta').on('show.bs.modal', function (event) {
        $('.salvar-pergunta').unbind();
        $('.salvar-pergunta').on('click',function(e){   
            var action = $(this).parent().parent().find('form').attr('action');
            var dados  =  $(this).parent().parent().find('form').serialize();
            $.ajax({
                url: action,
                type: 'POST',
                data: dados,
                dataType: 'json',
                success: function(data) {
                    console.log('aqiooo')
                    window.location.reload(true);
                }

            });
        });
    });


    $('#search').on( "keyup", function() {
        // get the value from text field
        var input = $(this).val();
        // by default every list element will be shown
        $(".perguntas .col-lg-6").show();
        // Non related element will be hidden after input
        $(".perguntas .col-lg-6").not("[data-pergunta*="+ input +"]").hide();
    });

    $('.encaminhar').on('click',function(e){
        var $this = $(this);
        $.ajax({
            url: baseUrl+'/moderador/encaminhar/'+$(this).data('id'),
            type: 'POST',
            data: 'token='+token,
            dataType: 'json',
            success: function(data) {
                window.location.reload(true);
                // console.log('data',data)
                // $('.list-mediador').fadeOut( "slow", function() {
                //     $('.list-mediador').html('');
                //     $.each(data, function (key, value) {
                //         var d = new Date("2016-11-07 18:20:21"),
                //             h = d.getHours(),
                //             m = d.getMinutes(),
                //             html = "<li>"+
                //                         "<div class='text'>"+
                //                             "<p><span class='time'>"+h+":"+m+"</span> -  Lorem ipsum dolor</p>"+
                //                             "<p>"+ value.pergunta +"</p>"+
                //                         "</div>"+
                //                         "<a href='#' data-id='"+ value.id +"' class='trash'></a>"+
                //                     "</li>";

                //         $('.list-mediador').append(html);                    
                //     });
                // });    
                // $('.list-mediador').fadeIn( "slow");
                
                // $this.parents('.col-lg-6').remove();
            }

        });

    });

    $('.favorito').on('click',function(e){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).parents('.col-lg-6').removeClass('favorito');
            var favorito = 0;
        }else{
            $(this).addClass('active');
            $(this).parents('.col-lg-6').addClass('favorito');
            var favorito = 1;
        }

        // $.ajax({
        //     url: baseUrl+'/moderador/favoritar/'+$(this).data('id')+'/'+favorito,
        //     type: 'POST',
        //     data: 'token='+token,
        //     dataType: 'json',
        //     success: function(data) {
                
        //     }

        // });

    });
    
    $('.box-search .listar').on('click',function(e){
        var perguntas = $('.perguntas .col-lg-6');

        $('.perguntas .col-lg-6').fadeOut( "slow", function() {
            
            $('.perguntas .col-lg-6.favorito').fadeIn('slow');
        });
        if($('.perguntas .col-lg-6.favorito').length ==0){
            $('.perguntas .col-lg-6').fadeIn('slow');
        }
        // $.each(perguntas, function(key, value) {
            
        // });

    });
});


