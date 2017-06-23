$(function() {
	var $usuarioMenu = $('.usuario-menu');
	$usuarioMenu.on('click', function (e) {
		e.preventDefault();

		var $self = $(this);

		$.get($self.attr('href'), function (html) {
			$('.usuario-ajax').html(html);
			$usuarioMenu.removeClass('active');
			$self.addClass('active');

			history.pushState('data', '', $self.attr('href'));
		});
	});
});