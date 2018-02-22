@extends('convidado/master')

@section('content')
	<div id="aguarde" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="modal-title">Aguarde...</h1>
				</div>
				<div class="modal-body" id="modal-body" style="font-size: 18px;">
					<a href="" id="verBoleto" target="_blank" style="display: none"><button class="btn btn-success btn-block">Ver o meu boleto</button></a>
				</div>
			</div>
		</div>
	</div>

	<div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@include('convidado.inc.header-inner', $party)

		@include('convidado.inc.anchors')
	</div>
	
	<div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container brinquedosLista">
			
			<img src="{{ asset('assets/site/images/presentinho_aniversario_presente_roupas_ent06.png') }}" class="presentinho col-xs-5 col-sm-5 col-md-5" alt="">
			
			<div class="gifts-container row col-md-offset-2">
				@include('convidado.inc.filtro-cotas', $party)

				<div class="col-md-9 dados-container">
					<div class="row">
						@include('convidado.inc.filtro-categorias', ['filter' => 'cotas'])
					</div>
					<div class="form-cadastro">
						<div class="form-cadastro-content">
							<form method="post" action="{{ route('convidado.cotas.compraOnline', [$party->codigo, $product->id]) }}" class="form-payment">
								@if($errors->any())
									<div class="alert alert-danger">{{ $errors->first() }}</div>
								@endif
								<input type="hidden" name="senderHash">
								<fieldset class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-pgto-fieldset">
									<legend class="form-cadastro-legenda">Dados do Comprador</legend>
									<label>
										Nome:
										<input type="text" name="nome" required="" aria-required="true" value="{{ old('nome') }}">
									</label>
									<label>
										Email:
										<input type="email" name="email" required="" aria-required="true" value="{{ old('email') }}">
									</label>
									<label>
										CPF:
										<input type="text" name="cpf" class="input-cpf" aria-required="true" value="{{ old('cpf') }}">
									</label>
									<div class="row">
										<div class="col-md-6">
											<label>
												Telefone:
												<input type="text" name="tel" class="input-phone" aria-required="true" value="{{ old('tel') }}">
											</label>
										</div>
										<div class="col-md-6">
											<label>
												Data de Nascimento:
												<input type="text" name="nascimento" class="input-data" aria-required="true" value="{{ old('nascimento') }}">
											</label>
										</div>
									</div>
								</fieldset>
								<fieldset class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-pgto-fieldset">
									<legend class="form-cadastro-legenda">Dados do Pagamento</legend>

									<div class="groupData" id="paymentMethods">
										<div id="paymentMethodsOptions">
											<label class="field radio col-md-6">
												Cartão de Crédito
												<input id="creditCardRadio" type="radio" name="changePaymentMethod" value="creditCard" {{ old('changePaymentMethod') == 'creditCard' || empty(old('changePaymentMethod')) ? 'checked' : NULL }}>
											</label>
											<label class="field radio col-md-6">
												Boleto
												<input id="boletoRadio" type="radio" name="changePaymentMethod" value="boleto" {{ old('changePaymentMethod') == 'boleto' ? 'checked' : NULL }}>
											</label>
										</div>
										<div class="creditCardData paymentMethodGroup" dataMethod="creditCard" {{ old('changePaymentMethod') == 'boleto' ? 'style=display:none' : NULL }}>
											<div id="cardData">
												<div class="row">
													<div class="field col-md-10" id="cardBrand">
														<label for="cardNumber">
															Número do cartão <font color="red">*</font>
															<input type="text" name="cardNumber" id="cardNumber" class="cardDatainput" onblur="brandCard();" />
														</label>
													</div>
													<div class="col-md-2">
														&nbsp;
														<span class="clearfix"><img class="bandeiraCartao" id="bandeiraCartao" /></span>
													</div>
												</div>
												<div class="row">
													<div class="field col-md-6" id="expiraCartao">
														<label for="cardExpirationMonth">
															Data de Vencimento <font color="red">*</font>
															<div class="row">
																<div class="col-md-5">
																	<select name="cardExpirationMonth" id="cardExpirationYear" class="cardDatainput month">
																		@for ($i = 1; $i <= 12; $i++)
																			<option value="{{ sprintf("%02d", $i) }}">{{ sprintf("%02d", $i) }}</option>
																		@endfor
																	</select>
																</div>
																<div class="col-md-1">/</div>
																<div class="col-md-5">
																	<select name="cardExpirationYear" id="cardExpirationYear" class="cardDatainput year">
																		@for ($i = date('Y'); $i <= date('Y') + 10; $i++)
																			<option value="{{ $i }}">{{ $i }}</option>
																		@endfor
																	</select>
																</div>
															</div>
														</label>
													</div>
													<div class="field col-md-4" id="cvvCartao">
														<label for="cardCvv">
															Código de Segurança <font color="red">*</font>
															<input type="text" name="cardCvv" id="cardCvv" maxlength="5" class="cardDatainput" />
														</label>
													</div>
												</div>
												<h2 class="legend-subtitle">Dados do Titular do Cartão</h2>
												<div id="holderDataChoice">
													<label class="field radio col-md-6">
														mesmo que o comprador
														<input type="radio" name="holderType" id="sameHolder" value="sameHolder" {{ old('holderType') == 'sameHolder' || empty(old('holderType')) ? 'checked' : NULL }}>
													</label>
													<label class="field radio col-md-6">
														outro
														<input type="radio" name="holderType" id="otherHolder" value="otherHolder" {{ old('holderType') == 'otherHolder' ? 'checked' : NULL }}>
													</label>
												</div>
												<div id="dadosOtherPagador" class="dadosOtherPagador">
													<div id="holderData">
														<div class="field">
															<label for="creditCardHolderName">
																Nome (Como está impresso no cartão) <font color="red">*</font>
																<input type="text" name="creditCardHolderName" id="creditCardHolderName" value="{{ old('creditCardHolderName') }}" />
															</label>
														</div>
														<div class="field">
															<label for="creditCardHolderBirthDate">
																Data de Nascimento do Titular do Cartão <font color="red">*</font>
																<input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" maxlength="10" value="{{ old('creditCardHolderBirthDate') }}" />
															</label>
														</div>
														<div class="row">
															<div class="field col-md-6" id="CPFP">
																<label for="creditCardHolderCPF">
																	CPF (somente n&uacute;meros) <font color="red">*</font>
																	<input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" maxlength="14" value="{{ old('creditCardHolderName') }}" />
																</label>
															</div>
															<div class="field col-md-6" id="TelP">
																<label for="creditCardHolderPhone">
																	Telefone <font color="red">*</font>
																	<input type="text" name="creditCardHolderPhone" id="creditCardHolderPhone" class="areaCode" maxlength="15" value="{{ old('creditCardHolderPhone') }}" />
																</label>
															</div>
														</div>

													</div>
												</div>
												<input type="hidden" name="creditCardToken" id="creditCardToken" value="{{ old('creditCardToken') }}"  />
												<input type="hidden" name="creditCardBrand" id="creditCardBrand" value="{{ old('creditCardBrand') }}"  />

											</div>
										</div>
									</div>
								</fieldset>

								<fieldset class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-pgto-fieldset">
									<legend class="form-cadastro-legenda creditCardData" {{ old('changePaymentMethod') == 'boleto' ? 'style=display:none' : NULL }}>Endereço de Cobrança</legend>
									<div class="creditCardData" {{ old('changePaymentMethod') == 'boleto' ? 'style=display:none' : NULL }}>
										<div class="field" id="CEPP">
											<label for="billingAddressPostalCode">
												CEP <font color="red">*</font>
												<input type="text" name="billingAddressPostalCode" id="billingAddressPostalCode" maxlength="9" value="{{ old('billingAddressPostalCode') }}"/>
											</label>
										</div>
										<div class="field" id="EndP">
											<label for="billingAddressStreet">
												Endereço <font color="red">*</font>
												<input type="text" name="billingAddressStreet" id="billingAddressStreet" value="{{ old('billingAddressStreet') }}" />
											</label>
										</div>
										<div class="row">
											<div class="field col-md-4" id="NumP">
												<label for="billingAddressNumber">
													Número <font color="red">*</font>
													<input type="text" name="billingAddressNumber" id="billingAddressNumber" size="5" value="{{ old('billingAddressNumber') }}"/>
												</label>
											</div>
											<div class="field col-md-8" id="ComP">
												<label for="billingAddressComplement">
													Complemento
													<input type="text" name="billingAddressComplement" id="billingAddressComplement" value="{{ old('billingAddressComplement') }}" />
												</label>
											</div>
										</div>
										<div class="field" id="BairP">
											<label for="billingAddressDistrict">
												Bairro <font color="red">*</font>
												<input type="text" name="billingAddressDistrict" id="billingAddressDistrict" value="{{ old('billingAddressDistrict') }}" />
											</label>
										</div>
										<div class="row">
											<div class="field col-md-6" id="CidP">
												<label for="billingAddressCity">
													Cidade <font color="red">*</font>
													<input type="text" name="billingAddressCity" id="billingAddressCity" value="{{ old('billingAddressCity') }}" />
												</label>
											</div>
											<div class="field col-md-6" id="EstP">
												<label for="billingAddressState">
													Estado <font color="red">*</font>
													<input type="text" name="billingAddressState" id="billingAddressState" class="addressState" maxlength="2" value="{{ old('billingAddressState') }}" style="text-transform: uppercase;" onBlur="this.value=this.value.toUpperCase()"/>
												</label>
											</div>
										</div>
										<div class="field hidden">
											<label for="billingAddressCountry">
												País
												<input type="text" name="billingAddressCountry" id="billingAddressCountry" value="Brasil" readonly="readonly" value="{{ old('billingAddressCountry') }}" />
											</label>
										</div>
									</div>
									<img src="{{ asset('assets/site/images/banner-pagseguro.png') }}">
									<center>
										<button type="submit" id="creditCardPaymentButton">Finalizar compra</button>
									</center>
								</fieldset>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<script>
		PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}');
	</script>
@endsection
