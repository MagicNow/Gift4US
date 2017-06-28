$(function() {
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

	$(".register-form").validate({
		rules: {
			nome: {
				required: true,
				minlength: 2
			},
			senha: {
				required: true,
				minlength: 5
			},
			confirma_senha: {
				required: true,
				minlength: 5,
				equalTo: "input[name='senha']"
			},
			email: {
				required: true,
				email: true
			},
			tel: {
				required: true
			},
			banco: {
				required: true
			},
			agencia: {
				required: true
			},
			tipo_conta: {
				required: true
			},
			conta: {
				required: true
			},
			cpf: {
				cpf: true,
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
;	});
});