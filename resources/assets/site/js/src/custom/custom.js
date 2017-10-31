$(function() {
	var $activeGift;

	// add validate to cpf
	$.validator.addMethod("cpf", function(value, element) {
		value = jQuery.trim(value);

		value = value.replace('.','');
		value = value.replace('.','');
		cpf = value.replace('-','');
		while(cpf.length < 11) cpf = "0"+ cpf;
		var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/,
			a = [],
			b = new Number,
			c = 11;
		for (i=0; i<11; i++){
			a[i] = cpf.charAt(i);
			if (i < 9) b += (a[i] * --c);
		}
		if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
		b = 0;
		c = 11;
		for (y=0; y<10; y++) b += (a[y] * c--);
		if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

		var retorno = true;
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

		return this.optional(element) || retorno;
	}, "Informe um CPF válido");

	var $usuarioMenu = $('.usuario-menu'),
		maskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		};

	$usuarioMenu.on('click', function (e) {
		e.preventDefault();

		var $self = $(this);

		$.get($self.attr('href'), function (html) {
			$('.usuario-ajax').html(html);
			$usuarioMenu.removeClass('active');
			$self.addClass('active');

			history.pushState('data', '', $self.attr('href'));

			var $presentinho = $('.presentinho'),
				image = $('.usuario-ajax').find('[data-presente]');

			$presentinho.html('<img src="' + image.data('presente') + '">');
		});
	});

	var $checkbox = $('.my-birthday-checkbox');
	$checkbox.radiobutton({
		className: 'jquery-switch',
		checkedClass: 'jquery-switch-on'
	});

	$checkbox.on('click', function (e) {
		var $self = $(this);
		var checked = $self.is(':checked') ? $self.val() : null;

		$.post(baseUrl + '/api/festas/ativar', { ativar: checked, festa: $self.data('festaId')});
	});

	$('.password-form').validate({
		rules: {
			provisoria: {
				required: true
			},
			senha: {
				required: true,
				minlength: 6
			},
			confirma_senha: {
				required: true,
				minlength: 6,
				equalTo: "input[name='senha']"
			}
		}
	});

	$(".register-form").validate({
		rules: {
			nome: {
				required: true,
				minlength: 2
			},
			senha: {
				required: true,
				minlength: 6
			},
			confirma_senha: {
				required: true,
				minlength: 6,
				equalTo: "input[name='senha']"
			},
			email: {
				required: true,
				email: true
			},
			tel: {
				required: true
			}
		}
	});

	$('input[name="cpf"]').mask('000.000.000-00', {reverse: true});
	$('input[name="tel"]').mask(maskBehavior, {
		onKeyPress: function(val, e, field, options) {
			field.mask(maskBehavior.apply({}, arguments), options);
		}
	});

	$(window).load(function(e) {
		var $presentinho = $('.presentinho'),
			image = $('.usuario-ajax').find('[data-presente]');
		 $presentinho.append('<img src="' + image.data('presente') + '">');
	});
    
    var $modal = $('.form-birthday-modal');
    var $modalButton = $(".form-birthday-file");

    $modalButton.fileinput({
    	showUpload: false,
    	showCaption: false,
    	showCancel: false,
    	showRemove: false,
    	allowedFileExtensions: ['jpg', 'gif', 'png'],
    	uploadUrl: baseUrl + '/usuario/meus-aniversarios/upload',
    	uploadAsync: true,
    	required: true,
    	uploadExtraData: { id: 100 },
		msgAjaxError: 'Algo deu errado com a operação {operação}. Por favor, tente novamente mais tarde!',
		msgAjaxProgressError: '{operation} falhou.',
		msgUploadEnd: 'Sucesso',
		ajaxOperations: {
			deleteThumb: 'arquivo excluído',
			uploadThumb: 'arquivo carregado',
			uploadBatch: 'carregamento de arquivos em lote',
			uploadExtra: 'dados do upload'
		},
		layoutTemplates: {
			btnBrowse: '<div tabindex="500" class="form-birthday-upload-btn btn-file"{status}>' +
							'<p class="form-birthday-upload-text">procurar nas suas pastas uma foto bem legal!!!</p>' +
						'</div>',
		}
    }).on("filebatchselected", function(event, files) {
		// trigger upload method immediately after files are selected
		$modalButton.fileinput("upload");
	}).on('fileuploaded', function(event, data, previewId, index) {
		$modal.addClass('hidden');

		var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;

		$('.aniver-photo').val(response.path);
		$('.form-birthday-photo').html('<img src="' + baseUrl + '/storage/birthdays/' + response.path + '">');
	});

    $('.form-birthday-modal-close, .form-birthday-modal-text').on('click', function (e) {
    	e.preventDefault();
		$modal.addClass('hidden');
    });

    $('.form-birthday-photo').on('click', function (e) {
    	e.preventDefault();
		$modal.removeClass('hidden');
    });

    $('.gifts-item-button-select').on('click', function (e) {
    	e.preventDefault();

		var $self = $(this);
		var $list = $self.parents('.gifts-list');
		var $item = $self.parents('.gifts-item');
    	var $total = $('.gifts-box-number-header-total');
    	var total = parseInt($total.text()) + 1;

    	$item.addClass('selected');
    	$total.text(total);

		if (total > 0) {
			$('.gifts-box-number-submit').show();
		}

    	$.post(baseUrl + '/api/presentes/adicionar', { produto: $item.data('id'), festa: $list.data('festaId')});
    });

    $('.gifts-filter-select').select2({
    	placeholder: 'ordenar por'
    }).on('change', function (evt) {
		$(this).parents('form').submit();
	});

    $('.gifts-list-message-remove').on('click', function (e) {
    	e.preventDefault();
    	$('.gifts-list-message').remove();

    	createCookie($(this).data('cookie'), true, 1);
    });

    $('.gifts-item-button-remove').on('click', function (e) {
    	e.preventDefault();

		$activeGift = $(this).parents('.gifts-item');

		var $modal = $('.gifts-modal');
		var $content = $activeGift.find('.row');

    	$modal.removeClass('hidden');
    	$modal.find('.gifts-modal-frame').html($content.html());
    });

	$('.gifts-modal-button-remove').on('click', function (e) {
    	e.preventDefault();

		var $list = $('.gifts-list');
		var $total = $('.gifts-box-number-header-total');
		var total = parseInt($total.text()) - 1;

		$activeGift.removeClass('selected');
		$total.text(total);
		closeGiftModal();

		if (total <= 0) {
			$('.gifts-box-number-submit').hide();
		}

		$.post(baseUrl + '/api/presentes/remover', { produto: $activeGift.data('id'), festa: $list.data('festaId')})
    });

    $('.gifts-modal-button-cancel').on('click', closeGiftModal);

    $('.form-birthday-sex-label').on('click', function () {
    	$('.form-birthday-avatar').attr('src', $(this).data('image'));
    });

    $('input[type="number"]')
    	.on('focusout', function (e) {
			var $self = $(this);
			var inputVal = parseInt($self.val(), 10);
			var inputMin = parseInt($self.attr('min'), 10);
			var inputMax = parseInt($self.attr('max'), 10);

			if(typeof $self.attr('max') !== undefined && inputVal > inputMax && e.keyCode != 8) $self.val('');
			if(typeof $self.attr('min') !== undefined && inputVal < inputMin && e.keyCode != 8) $self.val(0);
		});

	$('.form-birthday-layouts-swap').on('click', function (e) {
		e.preventDefault();
		$('.form-birthday-choise-container').addClass('hidden');
		$('.form-birthday-layouts-container').removeClass('hidden');
	});

	$('.form-birthday-choise-modal-cancel').on('click', function (e) {
		e.preventDefault();
		$('.form-birthday-layouts-choise-modal').addClass('hidden');
	});

	$('.form-birthday-layouts-choise').on('click', function (e) {
		var $self = $(this);
		var $modal = $('.form-birthday-layouts-choise-modal');
		var $els = $modal.find('.form-birthday-layouts-icon, .form-birthday-choise-modal-confirm, .form-birthday-choise-modal-cancel');

		$els
			.removeClass('red')
			.removeClass('blue')
			.removeClass('orange');

		$els.addClass($self.data('color'));
		$modal.find('.form-birthday-choise-modal-confirm').data('color', $self.data('color'));

		$modal.removeClass('hidden');
	});

	$('.form-birthday-choise-modal-confirm').on('click', function (e) {
		e.preventDefault();

		var id;
		var $self = $(this);
		var $container = $('.form-birthday-choise-container');
		var $icon = $container.find('.form-birthday-layouts-icon');

		$('.form-birthday-layouts-container').addClass('hidden');
		$container.removeClass('hidden');

		$container.find('.red').removeClass('red');
		$container.find('.blue').removeClass('blue');
		$container.find('.orange').removeClass('orange');

		$container.find('.form-birthday-layouts-preview, .form-birthday-layouts-icon, .form-birthday-layouts-swap').addClass($self.data('color'));

		$('.form-birthday-layouts-choise-modal').addClass('hidden');

		if ($icon.hasClass('red')) {
			id = 1;
		} else {
			if ($icon.hasClass('orange')) {
				id = 2;
			} else {
				id = 3;
			}
		}

		$('.form-birthday-layout-id').val(id);
	});

	$('.gifts-categories-item').on('click', function (e) {
		var $self = $(this);
		var $list = $self.parents('.gifts-categories-list');
		var status = 0;

		$self.toggleClass('active');
		status = $self.hasClass('active') ? 1 : 0;
		$.post(baseUrl + '/api/categorias/adicionar', { tipo: $self.data('id'), festa: $list.data('festaId'), status: status})
	});

	$('[type="number"]').on('keypress', function (e) {
		return e.charCode >= 48 && e.charCode <= 57;
	});

	var setTimePicker = function( currentDateTime ){
		$('.form-birthday-date-day').val(currentDateTime.getDate());
		$('.form-birthday-date-month').val(currentDateTime.getMonth() + 1);
		$('.form-birthday-date-year').val(currentDateTime.getFullYear());
	};

	var maxDate = new Date(new Date().setFullYear(new Date().getFullYear() + 3));
	$.datetimepicker.setLocale('pt-BR');

	$('.form-birthday-calendar').datetimepicker({
		onSelectDate: setTimePicker,
		minDate: 0,
		maxDate: maxDate,
		timepicker: false,
		yearStart: new Date().getFullYear(),
		yearEnd: new Date().getFullYear() + 3
	});

	$('[name="dividir_cota"').on('change', function (e) {
		var $self = $(this);
		if ($self.val() == 1) {
			$('.gifts-item-quotas-split').show();
		} else {
			$('.gifts-item-quotas-split').hide();
			$('[name="quantidade_cotas"]').prop('selectedIndex', 0).trigger('change');
			$('.criar-presentes-cota-valor').text('0,00');
		}
	});

	$('.money').mask("#.##0,00", {
		reverse: true,
		onKeyPress: changeQuotaSplit,
	});

	$('.criar-presentes .form-birthday-size-input')
		.select2({
			placeholder: 'Quantidade de cotas',
			allowClear: true
		})
		.on('change', changeQuotaSplit);

	$('.rsvp-form').on('submit', function(e) {
		e.preventDefault();

		var $form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			success: function (data) {
				$form.find('.rsvp-form-content').html('<p class="response text-center">' + data.response + '<p>');
			}
		});
	});
});

function changeQuotaSplit() {
	let quotaTotal = $('.criar-presentes').find('[name="valor_total"]').val().replace(/\./g, '').replace(',', '.');
	let quotaNumber = $('.criar-presentes .form-birthday-size-input').val();
	let quotaCost = quotaTotal / quotaNumber;

	if (quotaNumber !== '') {
		$('.criar-presentes-cota-valor').text(quotaCost.toFixed(2).toString().replace(".", ","));
	} else {
		$('.criar-presentes-cota-valor').text('0,00');
	}
}

function closeGiftModal() {
	$('.gifts-modal').addClass('hidden');
}

function createCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}

function formAddGift() {
	$('form .bgC').prop('readonly',true);
	
	$('form .fa-pencil-square-o').click(function() {
	  $('form .bgC').prop('readonly',false);
	  $(this).parent().parent().find('input.bgC').focus();
	});
	
	$('form .textR a').click(function() {
	  $('form .textR').prepend('<div class="input-group gifts-input-icon"><input type="text" class="form-control gifts-item-price-value bgC" placeholder="Escreva aqui o nome da loja em que o produto encontra-se disponível" aria-describedby="gifts-obs" maxlength="255" name="lojas" value=""><span class="input-group-addon" id="gifts-obs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></div>');
	});

	$('.gifts-item-price-description-upload').click(function(){
		$('.upload-image').click();
	});

	$('.upload-image').hide();
	
	$('.criarPresentes .alerta a').click(function(){
		$('.criarPresentes .alerta').hide();
	});
	$('.lista-email .adicionar-email').click(function() {
		var emailAdicionar = $('.lista-email .texto').val();
		$('.lista-email ul.col-md-12').append('<li><a href="#">Excluir</a> '+emailAdicionar+'</li>');
		var countEmail = $('.lista-email ul.col-md-12 a').length;
		$('.lista-email fieldset.bottom label.col-md-12').html(countEmail+' emails cadastrados');
		formEmailDelet();
	});
	$('.ver-lista-presentes').click(function() {
		$('#lista-presente').show();
	});
	$('.ver-lista-convidados').click(function() {
		$('#lista-presenca').show();
	});
	$('.modal-lista-presentes .modal-lista-header a').click(function() {
		$('.modal-lista-presentes').hide();
	});
}
function formEmailDelet() {
	$('.lista-email ul.col-md-12 a').click(function() {
	  $(this).parent().remove();
	  var countEmail = $('.lista-email ul.col-md-12 a').length;
	  $('.lista-email fieldset.bottom label.col-md-12').html(countEmail+' emails cadastrados');
	});
}
formAddGift();
formEmailDelet();

