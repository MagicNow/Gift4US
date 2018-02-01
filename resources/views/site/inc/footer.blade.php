<footer role="contentinfo">
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="row"> 
			{{ Html::image('assets/site/images/logofooter.png', '', array('class' => 'logo')) }}
			<div class="nav col-lg-4 col-md-4 col-xs-12 col-sm-12" >
				<ul class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<li><a href="{{ route('home') . '#convidado_aniversariante' }}">aniversário convidado</a></li>
					<li><a href="{{ route('home') . '#convidado_aniversariante' }}">área do usuário</a></li>
					@if (Auth::user())
						<li><a href="{{ route('usuario.meus-aniversarios') }}">meus aniversários</a></li>
						<li><a href="#">listas de presentes</a></li>
						<li><a href="{{ URL::to('usuario/transferencia') }}">resgatar valores</a></li>
					@endif
				</ul>
				<ul class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<li><a href="{{ route('home') . '#como_funciona' }}">como funciona</a></li>
					<li><a href="{{ route('home') . '#passoapasso' }}">passo a passo</a></li>
					<li><a href="#">dúvidas frequentes</a></li>
					<li><a href="#">contato</a></li>
				</ul>
			</div>
			{{ Html::image('assets/site/images/presentinho_red.png', '', array('class' => 'presentinho_red')) }}
			{{ Html::image('assets/site/images/presentinho_blue.png', '', array('class' => 'presentinho_blue')) }}
			<div class="placa col-lg-3 col-md-3 col-xs-12">
				<ul>
					<li><a href="mailto:contato@gift4us.com">{{ Html::image('assets/site/images/email.png', '', array('class' => '')) }} </a></li>
					<li><a href="https://www.facebook.com/Gift4us-1534294213546524" target="_blank" title="Facebook">{{ Html::image('assets/site/images/fb.png', '', array('class' => '')) }} </a></li>
					<li><a href="http://instagram.com" target="_blank title="Instagram">{{ Html::image('assets/site/images/insta.png', '', array('class' => '')) }} </a></li>
				</ul>
			</div>
		</div>
		<p class="copyright col-xs-12 col-sm-12 col-md-12 col-lg-12">GIFT4US | Copyright 2017. Todos os direitos reservados. Desenvolvido por <a href="http://baobaart.com.br/" target="_blank">BAOBA ART</a></p>
    </div>
  </div>
</footer>

<script type="text/javascript">
	var baseUrl = '{{ route("home") }}';
	var tokenData = 'email={{ env('PAGSEGURO_EMAIL') }}&token={{ env('PAGSEGURO_TOKEN') }}';
</script>

{{ HTML::script('assets/site/js/app.js') }}

@yield('scripts')

</body>
</html>
