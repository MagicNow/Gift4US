<footer role="contentinfo">
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="row"> 
			{{ Html::image('assets/site/images/logofooter.png', '', array('class' => 'logo')) }}
			<div class="nav col-lg-4 col-md-4 col-xs-12 col-sm-12" >
				<ul class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<li><a href="#" alt="">aniversário convidado</a></li>
					<li><a href="#" alt="">área do usuário</a></li>
					<li><a href="{{ route('usuario.meus-aniversarios') }}" alt="">meus aniversários</a></li>
					<li><a href="#" alt="">listas de presentes</a></li>
					<li><a href="{{ URL::to('usuario/transferencia') }}" alt="">resgatar valores</a></li>
				</ul>
				<ul class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<li><a href="#" alt="">como funciona</a></li>
					<li><a href="#" alt="">passo a passo</a></li>
					<li><a href="#" alt="">dúvidas frequentes</a></li>
					<li><a href="#" alt="">contato</a></li>
				</ul>
			</div>
			{{ Html::image('assets/site/images/presentinho_red.png', '', array('class' => 'presentinho_red')) }}
			{{ Html::image('assets/site/images/presentinho_blue.png', '', array('class' => 'presentinho_blue')) }}
			<div class="placa col-lg-3 col-md-3 col-xs-12">
				<ul>
					<li><a href="mailto:contato@gift4us.com" alt="">{{ Html::image('assets/site/images/email.png', '', array('class' => '')) }} </a></li>
					<li><a href="https://www.facebook.com/Gift4us-1534294213546524" target="_blank" title="Facebook" alt="">{{ Html::image('assets/site/images/fb.png', '', array('class' => '')) }} </a></li>
					<li><a href="http://instagram.com" target="_blank title="Instagram" alt="">{{ Html::image('assets/site/images/insta.png', '', array('class' => '')) }} </a></li>
				</ul>
			</div>
		</div>
		<p class="copyright col-xs-12 col-sm-12 col-md-12 col-lg-12">GIFT4US | Copyright 2017. Todos os direitos reservados. Desenvolvido por <a href="http://baobaart.com.br/" target="_blank">BAOBA ART</a></p>
    </div>
  </div>
</footer>

<script type="text/javascript">
	var baseUrl = '{{ route("home") }}';
</script>

{{ HTML::script('assets/site/js/app.js') }}

</body>
</html>
