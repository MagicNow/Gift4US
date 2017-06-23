@extends('site/master')

@section('content')
    <div class="dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho_criando.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-6')) }} 

            <div class="bx-container col-md-10 col-md-offset-2">
                <div class="row">
                    <form action="">
                        <div class="col-md-6">
                            <fieldset class="">
                                <label>
                                    Qual nome do aniversáriante?
                                    <input type="text" name="nome">
                                </label>
                                <label>
                                    Quantos anos irá fazer?
                                    <div class="d-block">
                                        <input type="text" name="anos" class="inp-20">
                                        <span class="text-label">anos</span>
                                        <input type="text" name="meses" class="inp-20">
                                        <span class="text-label">meses</span>
                                    </div>
                                </label>
                                <label class="">
                                    Qual a data da festa?
                                    <div class="d-block">
                                        <input type="text" name="dia" class="inp-20">
                                        <span class="text-label">/</span>
                                        <input type="text" name="mes" class="inp-20">
                                        <span class="text-label">/</span>
                                        <input type="text" name="ano" class="inp-30">
                                    </div>
                                </label>
                                <label class="">
                                    Qual horário da festa?
                                    <div class="d-block">
                                        <input type="text" name="hora" class="inp-30">
                                        <span class="text-label">:</span>
                                        <input type="text" name="minuto" class="inp-30">
                                    </div>
                                </label>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <h4 class="text-center">Insira uma foto bem bonita do aniversariante!</h4>
                                <label>
                                    <a href="">{{ Html::image('assets/site/images/bt_inserirfoto.jpg', '', array('class' => 'img-responsive center-block')) }}</a>
                                </label>
                                <label>
                                    Gostaria que os convidados confirmassem presença?
                                    <span class="bx-opcao"><input type="radio"> Sim</span>
                                    <span class="bx-opcao"><input type="radio"> Não</span>
                                </label>
                            </fieldset>
                        </div>
                        
                        <div class="bx-etapa">
                            <ul>
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <button type="submit" class="enviar" alt="Próxima Etapa"> Próxima Etapa</button>
                    </form>
                </div>
            </div>
    			<div class="bx-form-left col-md-offset-2 col-xs-12 col-sm-12 col-md-5 col-lg-5">
    				<form>
                        <fieldset class="financeiro">
                            <label>
                                Qual nome do aniversáriante?
                                <input type="text" name="nome">
                            </label>
                            <label>
                                Quantos anos irá fazer?
                                <div class="d-block">
                                    <input type="text" name="anos" class="inp-20">
                                    <span class="text-label">anos</span>
                                    <input type="text" name="meses" class="inp-20">
                                    <span class="text-label">meses</span>
                                </div>
                            </label>
                            <label class="col-md-6 col-lg-6">
                                Qual a data da festa?
                                <div class="d-block">
                                    <input type="text" name="dia" class="inp-20">
                                    <span class="text-label">/</span>
                                    <input type="text" name="mes" class="inp-20">
                                    <span class="text-label">/</span>
                                    <input type="text" name="ano" class="inp-30">
                                </div>
                            </label>
                            <label class="col-md-6 col-lg-6">
                                Qual horário da festa?
                                <div class="d-block">
                                    <input type="text" name="hora" class="inp-30">
                                    <span class="text-label">:</span>
                                    <input type="text" name="minuto" class="inp-30">
                                </div>
                            </label>
                        </fieldset>
                    </form>
    			</div>
                <form>
                    <fieldset class="financeiro col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <span>
                            [OPCIONAL]
                            Seus dados bancários são necessários para que você possa receber valores referentes as cotas de presentes. A Gift4Us não irá compartilhar esses dados com ninguém e seus dados estarão em mais completa segurança.
                        </span>
                        <label>
                            Banco:
                            <select name="banco">
                                <option>341 - Banco Itaú S/A</option>
                            </select>
                        </label>
                        <label>
                            Nº da agência:
                            <input type="email" name="agencia">
                        </label>
                        <label class="radio col-md-6 col-lg-6">
                            conta corrente
                            <input type="radio" name="tipo_conta">
                        </label>
                        <label class="radio col-md-6 col-lg-6">
                            conta poupança
                            <input type="radio" name="tipo_conta">
                        </label>
                        <label>
                            Nº da conta:
                            <input type="text" name="conta">
                        </label>
                        <label>
                            CPF:
                            <input type="text" name="cpf">
                        </label>
                        <span>Fique tranquilo! Você poderá atualizar os dados da sua conta a qualquer momento aqui no portal.</span>
                    </fieldset>
                    <button type="submit" class="enviar"> Concluir</button>
                </form>
    			
    	</div>
    </div>
@endsection
