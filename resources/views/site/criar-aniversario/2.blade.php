@extends('site/master')

@section('content')
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			{{ Html::image('assets/site/images/presentinho_passo2.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }}

			<div class="dados row col-md-offset-2">
				@if ($errors->any())
					<div class="notify hidden" data-type="danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('usuario.meus-aniversarios.store') }}" method="post" class="dados-container">
					<input type="hidden" name="step" value="2">
					<input type="hidden" name="endereco_latitude" value="{{ old('endereco_latitude', $festa->endereco_latitude) }}" id="aniver-endereco-latitude">
					<input type="hidden" name="endereco_longitude" value="{{ old('endereco_longitude', $festa->endereco_longitude) }}" id="aniver-endereco-longitude">
					<input type="hidden" name="referencia_latitude" value="{{ old('referencia_latitude', $festa->referencia_latitude) }}" id="aniver-referencia-latitude">
					<input type="hidden" name="referencia_longitude" value="{{ old('referencia_longitude', $festa->referencia_longitude) }}" id="aniver-referencia-longitude">

					@if (isset($festa->id) && !empty($festa->id))
						<input type="hidden" value="{{ $festa->id }}" name="id">
					@endif
					<div class="clearfix">
						<fieldset class="form-birthday-first col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class="form-group">
								<label for="aniver-endereco">Qual o endereço da festa?</label>
								<input type="text" class="form-control form-input {{ $errors->first('endereco', 'has-error') }}" id="aniver-endereco" name="endereco" placeholder="" value="{{ old('endereco', $festa->endereco) }}">
							</div>
							<div class="form-group">
								<label for="aniver-referencia">Quer inserir um ponto de referência? (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-referencia" name="referencia" value="{{ old('referencia', $festa->referencia) }}" placeholder="Metrô, Lojas, Praças, etc.">
							</div>
							<div class="form-group">
								<label for="aniver-observacoes">Observações gerais sobre a festa (opcional)</label>
								<input type="text" class="form-control form-input" id="aniver-observacoes" name="observacoes" value="{{ old('observacoes', $festa->observacoes) }}" placeholder="Serviço de Valet, Salão de Festas, Festa a Fantasia etc.">
							</div>
						</fieldset>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div id="map" style="height: 269px;"></div>
						</div>
					</div>
					<nav class="form-birthday-paginate-nav text-center">
						<ul class="form-birthday-paginate-list">
							<li class="form-birthday-paginate-item active"><a href="{{ route('usuario.meus-aniversarios.novo.festa', [ $festa->id, 1]) }}" class="form-birthday-paginate-link">&nbsp;</a></li>
							<li class="form-birthday-paginate-item active"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
							<li class="form-birthday-paginate-item"></li>
						</ul>
					</nav>
					<button type="submit" name="enviar" class="form-birthday-submit"><img src="{{ asset('assets/site/images/niver-next-step.png') }}" alt="Próxima Etapa"></button>
				<a href="{{ route('usuario.meus-aniversarios.novo.festa', [$festa->id, 1]) }}" class="form-birthday-submit" style="text-align: center; color: #acacac; font-size: 17px; margin-top: -30px;">voltar a etapa anterior</a>
			
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		function setMapPosition (map, latlngbounds, marker, autocomplete, latitude, longitude) {
			autocomplete.addListener('place_changed', function() {
				var place = autocomplete.getPlace(),
					address = '';

				marker.setVisible(false);

				if (!place.geometry) {
					console.log("No details available for input: '" + place.name + "'");
					return;
				}

				latitude.val(place.geometry.location.lat());
				longitude.val(place.geometry.location.lng());

				marker.setPosition(place.geometry.location);
				marker.setVisible(true);

				latlngbounds.extend(place.geometry.location);

				map.setCenter(latlngbounds.getCenter());
				map.fitBounds(latlngbounds);

				map.setOptions({
					zoomControl: true,
					draggable: true,
					// zoom: 16,
				});

				if (place.address_components) {
					address = [
						(place.address_components[0] && place.address_components[0].short_name || ''),
						(place.address_components[1] && place.address_components[1].short_name || ''),
						(place.address_components[2] && place.address_components[2].short_name || '')
					].join(' ');
				}

				return map;
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
				latlngbounds = new google.maps.LatLngBounds(),
				addressLat = $('#aniver-endereco-latitude'),
				addressLng = $('#aniver-endereco-longitude'),
				refLat = $('#aniver-referencia-latitude'),
				refLng = $('#aniver-referencia-longitude');

			$.getJSON(baseUrl + '/assets/site/json/map.json', function(style) {
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 5,
					draggable: false,
					center: position,
					zoomControl: false,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					rotateControl: false,
					fullscreenControl: false,
					scrollwheel: false,
					styles: style
				});

				var marker1 = setMapPin(map, baseUrl + '/assets/site/images/pin-blue.png'),
					marker2 = setMapPin(map, baseUrl + '/assets/site/images/pin-red.png'),
					autocomplete1 = new google.maps.places.Autocomplete(document.getElementById('aniver-endereco')),
					autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('aniver-referencia'));

				// Check if positions exists
				if (addressLat.val() !== '' && addressLng.val() !== '') {
					var latlng = new google.maps.LatLng(addressLat.val(), addressLng.val());
					marker1.setPosition(latlng);
					marker1.setVisible(true);

					// Set map center marker position
					latlngbounds.extend(latlng);
					map.setCenter(latlngbounds.getCenter());
					map.fitBounds(latlngbounds);

					map.draggable = true;
					map.zoomControl = true;
				}

				if (refLat.val() !== '' && refLng.val() !== '') {
					var latlng = new google.maps.LatLng(refLat.val(), refLng.val());
					marker2.setPosition(latlng);
					marker2.setVisible(true);

					// Set map center marker position
					latlngbounds.extend(latlng);
					map.setCenter(latlngbounds.getCenter());
					map.fitBounds(latlngbounds);
				}

				setMapPosition(map, latlngbounds, marker1, autocomplete1, addressLat, addressLng);
				setMapPosition(map, latlngbounds, marker2, autocomplete2, refLat, refLng);
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5mG8Db_ESKNyncRp8IajDSn5fC3CGLfU&libraries=places&callback=initMap&language=pt-BR">
	</script>
@endsection