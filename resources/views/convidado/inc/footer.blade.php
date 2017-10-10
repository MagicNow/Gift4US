<footer role="contentinfo">
<style>
	footer .logoRodape{float:left;margin-right:20px;}
	footer .nav{margin-top:0;}
	footer .nav ul li{padding-bottom:5px;}
	footer .placa{margin-top:31px;width:309px;height:143px;background:url(/public/assets/site/images/bg-rodape-social.png) no-repeat}
	footer .placa ul{margin:31px 0 0 0;}
	footer .placa ul li{margin:0;}
	footer .placa ul li.email{margin-left:26px;}
	footer .placa ul li.facebook{margin-left:17px;}
	footer .placa ul li.instagram{margin-left:12px;}
	footer .placa ul li a{display:inline-block;text-indent:-1500px;width:59px;height:44px}
}
</style>
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="row"> 
			<div class="logoRodape">
				<img src="/public/assets/site/images/logo-rodape.png" alt="">
			</div>
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
			<img src="/public/assets/site/images/bg-rodape-02.png" alt="">
			<div class="placa col-lg-3 col-md-3 col-xs-12">
				<ul>
					<li class="email"><a href="mailto:contato@gift4us.com" alt="">E-mail</a></li>
					<li class="facebook"><a href="https://www.facebook.com/Gift4us-1534294213546524" target="_blank" title="Facebook" alt="">Facebook</a></li>
					<li class="instagram"><a href="http://instagram.com" target="_blank title="Instagram" alt="">Instagram</a></li>
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

@yield('scripts')

</body>
</html>
