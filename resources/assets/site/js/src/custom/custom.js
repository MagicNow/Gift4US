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

	$('.my-birthday-checkbox').radiobutton({
		className: 'jquery-switch',
		checkedClass: 'jquery-switch-on'
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
    	var $item = $self.parents('.gifts-item');
    	var $total = $('.gifts-box-number-header-total');

    	$item.addClass('selected');
    	$total.text(parseInt($total.text()) + 1);
    });

    $('.gifts-filter-select').select2({
    	placeholder: 'filtrar por'
    });

    $('.gifts-list-message-remove').on('click', function (e) {
    	e.preventDefault();
    	$('.gifts-list-message').remove();
    });

    $('.gifts-item-button-remove').on('click', function (e) {
    	e.preventDefault();

		$activeGift = $(this).parents('.gifts-item');

    	var $modal		= $('.gifts-modal');
    	var $content 	= $activeGift.find('.row');

    	$modal.removeClass('hidden');
    	$modal.find('.gifts-modal-frame').html($content.html());
    });

    $('.gifts-modal-button-cancel').on('click', closeGiftModal);

    $('.gifts-modal-button-remove').on('click', function (e) {
    	e.preventDefault();

    	var $total = $('.gifts-box-number-header-total');

    	$activeGift.removeClass('selected');
    	$total.text(parseInt($total.text()) - 1);
    	closeGiftModal();
    });

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

	$('.form-birthday-size-input').select2();

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
console.log($('.form-birthday-layout-id'), id, $icon);
		$('.form-birthday-layout-id').val(id);
	});
});

function closeGiftModal() {
	$('.gifts-modal').addClass('hidden');
}