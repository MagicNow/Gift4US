@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_criando.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }}

			<div class="dados row col-md-offset-2">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('usuario.meus-aniversarios.store2') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="2">
					@if (session('party'))
						<input type="hidden" value="{{ session('party') }}" name="festa_id">
					@endif
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class="form-group">
								<label for="aniver-endereco">Qual o endereço da festa?</label>
								<input type="text" class="form-control form-input" id="aniver-endereco" name="endereco" placeholder="">
							</div>
							<div class="form-group">
								<label for="aniver-referencia">Quer inserir um ponto de referência? (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-referencia" name="referencia" placeholder="">
							</div>
							<div class="form-group">
								<label for="aniver-observacoes">Observações gerais (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-observacoes" name="observacoes">
							</div>
						</fieldset>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div id="map" style="height: 269px;"></div>
						</div>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="submit" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		function setMapPosition (map, latlngbounds, marker, autocomplete) {
			autocomplete.addListener('place_changed', function() {
				var place = autocomplete.getPlace(),
					address = '';

				marker.setVisible(false);

				if (!place.geometry) {
					console.log("No details available for input: '" + place.name + "'");
					return;
				}

				marker.setPosition(place.geometry.location);
				marker.setVisible(true);

				latlngbounds.extend(place.geometry.location);

				map.setCenter(latlngbounds.getCenter());
				map.fitBounds(latlngbounds);

				if (place.address_components) {
					address = [
						(place.address_components[0] && place.address_components[0].short_name || ''),
						(place.address_components[1] && place.address_components[1].short_name || ''),
						(place.address_components[2] && place.address_components[2].short_name || '')
					].join(' ');
				}
			});
		}

		function setMapPin (map, pin) {
			var marker = new google.maps.Marker();
			marker.setIcon(pin);
			marker.setShadow(baseUrl + '/assets/site/images/pin-shadow.png');
			marker.setMap(map);
			return marker;
		}

		function initMap () {
			var position = { lat: -15.2581783, lng: -51.8358431 },
				latlngbounds = new google.maps.LatLngBounds();;

			$.getJSON(baseUrl + '/assets/site/json/map.json', function(style) {
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 3,
					center: position,
					zoomControl: true,
					mapTypeControl: false,
					scaleControl: true,
					streetViewControl: false,
					rotateControl: false,
					fullscreenControl: false,
					styles: style
				});

				var marker1 = setMapPin(map, baseUrl + '/assets/site/images/pin-blue.png'),
					marker2 = setMapPin(map, baseUrl + '/assets/site/images/pin-red.png'),
					autocomplete1 = new google.maps.places.Autocomplete(document.getElementById('aniver-endereco')),
					autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('aniver-referencia'));

				setMapPosition(map, latlngbounds, marker1, autocomplete1);
				setMapPosition(map, latlngbounds, marker2, autocomplete2);
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCY5TMTVCp_l_QRxOTt37mkrCkDUeg2JQ&libraries=places&callback=initMap&language=pt-BR">
	</script>
@endsection