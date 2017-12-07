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
	}).on('change', function (e) {
		var $self = $(this);
		var ativo = $self.attr('checked') === 'checked' ? 1 : 0;

		$.post(baseUrl + '/api/festas/ativar', { ativar: ativo, festa: $self.data('festaId')});
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

	var $uploadButton = $(".upload-image");

	$uploadButton.fileinput({
		showUpload: false,
		showCaption: false,
		showRemove: false,
		allowedFileExtensions: ['jpg', 'gif', 'png'],
		required: true,
		msgAjaxError: 'Algo deu errado com a operação {operação}. Por favor, tente novamente mais tarde!',
		msgAjaxProgressError: '{operation} falhou.',
		msgUploadEnd: 'Sucesso',
		msgFileRequired: 'A imagem é obrigatória.',
		msgSizeTooLarge: 'Arquivo "{name}" ({size} KB) excede o tamanho máximo permitido {maxSize} KB.',
		maxFileSize: 3000,
		ajaxOperations: {
			deleteThumb: 'arquivo excluído',
			uploadThumb: 'arquivo carregado',
			uploadBatch: 'carregamento de arquivos em lote',
			uploadExtra: 'dados do upload'
		},
		msgInvalidFileExtension: 'A extensão do arquivo "{name}" não é permitida. Somente arquivos "{extensions}" são permitidos.',
		browseLabel: 'Adicionar imagem do produto',
		previewSettings: {
			image: { width: "auto", height: "auto", 'max-width': "100%", 'max-height': "100%" }
		},
		layoutTemplates: {
			btnBrowse: '<div tabindex="500" class="gifts-item-price-description-upload upload-image-button bgC text-center btn-file "{status}>{label}</div>',
			actions: '<div class="file-actions">\n' +
				'{drag}\n' +
				'<div class="clearfix"></div>\n' +
			'</div>',
		}
	}).on("fileselect", function(event, files) {
		$('.upload-image-button').hide();
	}).on("fileclear", function(event, files) {
		$('.upload-image-button').show();
	});

	var $uploadText = $(".upload-text");

	$uploadText.fileinput({
		showUpload: true,
		showCaption: false,
		showRemove: true,
		showPreview: false,
		showCancel: false,
		allowedFileExtensions: ['txt'],
		uploadExtraData: { festas_id: $uploadText.data('festaId') },
		uploadClass: 'btn btn-default col-md-2 enviar-convite-upload',
		removeClass: 'btn btn-default col-md-2 enviar-convite-upload',
		uploadUrl: $('.form-invite-upload').attr('action'),
		uploadAsync: true,
		required: true,
		msgAjaxError: 'Algo deu errado com a operação {operação}. Por favor, tente novamente mais tarde!',
		msgAjaxProgressError: '{operation} falhou.',
		msgUploadEnd: 'Sucesso',
		msgFileRequired: 'O arquivo é obrigatório.',
		msgSizeTooLarge: 'Arquivo "{name}" ({size} KB) excede o tamanho máximo permitido {maxSize} KB.',
		maxFileSize: 3000,
		ajaxOperations: {
			deleteThumb: 'arquivo excluído',
			uploadThumb: 'arquivo carregado',
			uploadBatch: 'carregamento de arquivos em lote',
			uploadExtra: 'dados do upload'
		},
		msgInvalidFileExtension: 'A extensão do arquivo "{name}" não é permitida. Somente arquivos "{extensions}" são permitidos.',
		browseLabel: 'Upload .txt',
		buttonLabelClass: 'col-md-4 form-invite-button form-invite-button-txt',
		layoutTemplates: {
			btnBrowse: '<div tabindex="500" class="gifts-item-price-description-upload upload-image-button text-center btn-file "{status}>{label}</div>',
			actions: '<div class="file-actions">\n' +
				'{drag}\n' +
				'<div class="clearfix"></div>\n' +
			'</div>',
			progress: '',
		}
	}).on("fileselect", function(event, files) {
		$('.form-invite-button-txt').hide();
	}).on("fileclear", function(event, files) {
		$('.form-invite-button-txt').show();
	}).on('fileuploaded', function(event, data, previewId, index) {
		populateEmailsList(data);
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
    	var total = parseInt($total[0].innerHTML, 10) + 1;

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
		var $modalFinalizar = $('.modal-lista-concluir');
		var $content = $activeGift.find('.row');

    	$modal.removeClass('hidden');
    	$modalFinalizar.addClass('hidden');
    	$modal.find('.gifts-modal-frame').html($content.html());
    });

	$('.gifts-modal-button-remove').on('click', function (e) {
    	e.preventDefault();

		var $list = $('.gifts-list');
		var $total = $('.gifts-box-number-header-total');
		var total = parseInt($total[0].innerHTML) - 1;

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

	$('.filter-categories-item').on('click', function (e) {
		$(this).parents('form').submit();
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

	$('.send-form-ajax').on('submit', function(e) {
		e.preventDefault();

		var $form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			success: function (data) {
				console.log(data.response, data);
				$form.html('<p>' + data.response + '</p>');
			}
		});
	});
});

function changeQuotaSplit() {
	if ($('.criar-presentes.cota').length > 0) {
		let quotaTotal = $('.criar-presentes.cota').find('[name="valor_total"]').val().replace(/\./g, '').replace(',', '.');
		let quotaNumber = $('.criar-presentes.cota .form-birthday-size-input').val();
		let quotaCost = quotaTotal / quotaNumber;

		if (quotaNumber !== '') {
			$('.criar-presentes-cota-valor').text(quotaCost.toFixed(2).toString().replace(".", ","));
		} else {
			$('.criar-presentes-cota-valor').text('0,00');
		}
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
	// $('form .bgC').prop('readonly',true);
	
	$('form.edit-form-pencil .fa-pencil-square-o').on('click', function() {
		$('form.edit-form-pencil .bgC').prop('readonly',false);
		$(this).parent().parent().find('input.bgC').focus();
	});
	
	$('.clone-button').on('click', function(e) {
		e.preventDefault();
		const $self = $(this);
	  	const $container = $('#' + $self.data('target'));
	  	const $clone = $container.find('.clone-reference').first();

	  	$clone
	  		.clone()
	  		.removeClass('clone-reference')
	  		.appendTo($container)
	  		.find('input').val('');
	});

	$('.criarPresentes .alerta a').click(function(){
		$('.criarPresentes .alerta').hide();
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

	$('.btn-modal-finalizar').click(function() {
		var countSelected = $('ul.gifts-list .selected').length;
		$('.modal-lista-concluir .gifts-modal-subtitle small').html(countSelected);
		$('.modal-excluir-presente').addClass('hidden');
		$('.modal-lista-concluir').removeClass('hidden');
	});

	$('.modal-lista-letras-input').on('change', function (e) {
		const $self = $(this);
		$self.parents('form').submit();
	});

	$('.convite-medidas-modal-fechar').on('click', function (e) {
		$('.roupaMedidas').hide();

		createCookie($(this).data('cookie'), true, 1);
	});

	$('.form-invite-list').on('submit', function(e) {
		e.preventDefault();

		var $form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			dataType: 'json',
			success: function (data) {
				var list = data.lista;
				for (i = 0; i < list.length; i++) {
					var $item = $('.form-invite-results-item').first().clone();
					$item.removeClass('hidden');
					$item.find('.form-invite-fields-email').text(list[i].email);
					$item.find('.form-invite-fields-id').val(list[i].id);
					$item.appendTo('.form-invite-results');
				}

				$('.form-invite-count').html(data.total +' emails cadastrados');
				$('.form-invite-email').val('');
			},
			error: function (xhr, textStatus, errorThrown) {
				var response = JSON.parse(xhr.responseText);
				alert(response.email);
			}
		});
	});

	$('.form-invite-results').delegate('.form-invite-delete', 'submit', function(e) {
		e.preventDefault();

		var $form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			dataType: 'json',
			success: function (data) {
				$form.remove();
				var count = $('.form-invite-delete').length;
				$('.form-invite-count').html(count + ' emails cadastrados');
			}
		});
	});

	$('.birthday-remove').on('click', function (e) {
		e.preventDefault();

		const $self = $(this);

		$.confirm({
			title: 'Tem certeza que deseja excluir o aniversário?',
			content: '',
			type: 'light',
			buttons: {   
				ok: {
					text: "Sim",
					btnClass: 'btn-danger',
					keys: ['enter'],
					action: function(){
						$.post(baseUrl + '/api/festas/remover', { festa: $self.data('festaId')}, function (data) {
							window.location.href = data.redirectTo;
						});
					}
				},
				cancel: {
					text: "Não",
					btnClass: 'btn-default'
				}
			}
		});
	});

	$('#inviteList').on('show.bs.modal', function (event) {
		const $button = $(event.relatedTarget); // Button that triggered the modal
		const list = $button.data('festas-lista');
		const party = $button.data('festas-id');
		const $modal = $(this);
		const $body = $modal.find('.invite-list-body');

		$.post(baseUrl + '/api/lista/antigas', { lista: list }, function (data) {
			$body.html('');

			for (var i = 0; i < data.festas.length; i++) {
				$body.append('<tr><td>' + data.festas[i].nome + '</td>' +
								'<td>' + data.festas[i].festa_dia + '/' + data.festas[i].festa_mes + '/' + data.festas[i].festa_ano + '</td>' +
								'<td><button type="button" title="Importar" data-lista="' + data.festas[i].id + '" data-id="' + party + '" class="btn btn-default form-invite-modal-import"><i class="glyphicon glyphicon-upload"></i></button></td>' +
							'</tr>');
			}
		});
	}).on('click', '.form-invite-modal-import', function (e) {
		e.preventDefault();

		const $self = $(this);

		$.post(baseUrl + '/api/lista/antigas/importar', { lista: $self.data('lista'), festas_id: $self.data('id') }, function (data) {
			populateEmailsList(data);
			$('#inviteList').modal('toggle');
		});
	});
}

new Clipboard('.copy-button');

formAddGift();

function populateEmailsList(data) {
	var list = data.lista;

	for (i = 0; i < list.length; i++) {
		var $item = $('.form-invite-results-item').first().clone();
		$item.removeClass('hidden');
		$item.find('.form-invite-fields-email').text(list[i].email);
		$item.find('.form-invite-fields-id').val(list[i].id);
		$item.appendTo('.form-invite-results');
	}

	$('.form-invite-count').html(data.total +' emails cadastrados');
	$('.form-invite-email').val('');
}