<footer>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- <div class="container"> --}}
			{{ Html::image('assets/site/images/logofooter.png', '', array('class' => 'logo col-lg-2 col-md-2')) }}   
			<div class="nav col-lg-4 col-md-4 col-xs-12 col-sm-12" >
				<ul class="col-lg-7 col-md-7 col-xs-12 col-sm-12">
					<li><a class="" href="{!! route('home')!!}" title="" alt="">aniversário convidado</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">área do usuário</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">meus aniversários</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">listas de presentes</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">resgatar valores</a></li>
				</ul>
				<ul class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
					<li><a class="" href="{!! route('home')!!}" title="" alt="">como funciona</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">passo a passo</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">dúvidas frequentes</a></li>
					<li><a class="" href="{!! route('home')!!}" title="" alt="">contato</a></li>
				</ul>
			</div>	
			{{ Html::image('assets/site/images/presentinho_red.png', '', array('class' => 'logo col-lg-2 col-md-1')) }}   
			{{ Html::image('assets/site/images/presentinho_blue.png', '', array('class' => 'logo col-lg-2 col-md-1')) }}   
			<div class="placa col-lg-3 col-md-3 col-xs-12">	
				<ul>
					<li><a class="" href="mailto:contato@gift4us.com" title="" alt="">{{ Html::image('assets/site/images/email.png', '', array('class' => '')) }} </a></li>
					<li><a class="" href="http://facebook.com.br" title="" alt="">{{ Html::image('assets/site/images/fb.png', '', array('class' => '')) }} </a></li>
					<li><a class="" href="http://instagran.com.br" title="" alt="">{{ Html::image('assets/site/images/insta.png', '', array('class' => '')) }} </a></li>
				</ul>
			</div>
			<div class="copyright col-xs-12 col-sm-12 col-md-12 col-lg-12">GIFT4US | Copyright 2017. Todos os direitos reservados. Desenvolvido por BAOBA ART</div>
    	{{-- </div> --}}
    	
    </div>

</footer>

	<script type="text/javascript">
    var baseUrl = '{{ route("home") }}';
</script>
{{ HTML::script('assets/site/js/app.js') }}

</body>

</html>
