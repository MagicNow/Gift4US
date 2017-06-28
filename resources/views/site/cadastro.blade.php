@extends('site/master')

@section('content')
    <div class="form-cadastro col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="container">
    	 	{{ Html::image('assets/site/images/presentinho.png', '', array('class' => 'presentinho col-xs-12 col-sm-12 col-md-5 col-lg-6')) }}
    		<form class="col-md-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10 register-form">
    			<fieldset class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    				<label>
    					Nome:
    					<input type="text" name="nome" required>
    				</label>
    				<label>
    					Email:
    					<input type="email" name="email" required>
    				</label>
    				<label>
    					Telefone:
    					<input type="text" name="tel">
    				</label>
    				<label>
    					Senha:
    					<input type="password" name="senha" required>
    				</label>
    				<label>
    					Insira novamente a senha:
    					<input type="password" name="confirma_senha" required>
    				</label>
    			</fieldset>
    			<fieldset class="financeiro col-xs-12 col-sm-12 col-md-6 col-lg-6">
    				<span>
    					[OPCIONAL]
    					Seus dados bancários são necessários para que você possa receber valores referentes as cotas de presentes. A Gift4Us não irá compartilhar esses dados com ninguém e seus dados estarão em mais completa segurança.
    				</span>
    				<label>
    					Banco:
    					<select name="banco" required>
                            <option>Selecione</option>
                            <option value="246">246 - Banco ABC Brasil S.A.</option>
                            <option value="25">25 - Banco Alfa S.A.</option>
                            <option value="641">641 - Banco Alvorada S.A.</option>
                            <option value="29">29 - Banco Banerj S.A.</option>
                            <option value="38">38 - Banco Banestado S.A.</option>
                            <option value="740">740 - Banco Barclays S.A.</option>
                            <option value="107">107 - Banco BBM S.A.</option>
                            <option value="31">31 - Banco Beg S.A.</option>
                            <option value="96">96 - Banco BM&F de Serviços de Liquidação e Custódia S.A</option>
                            <option value="318">318 - Banco BMG S.A.</option>
                            <option value="752">752 - Banco BNP Paribas Brasil S.A.</option>
                            <option value="248">248 - Banco Boavista Interatlântico S.A.</option>
                            <option value="36">36 - Banco Bradesco BBI S.A.</option>
                            <option value="204">204 - Banco Bradesco Cartões S.A.</option>
                            <option value="237">237 - Banco Bradesco S.A.</option>
                            <option value="225">225 - Banco Brascan S.A.</option>
                            <option value="44">44 - Banco BVA S.A.</option>
                            <option value="263">263 - Banco Cacique S.A.</option>
                            <option value="222">222 - Banco Calyon Brasil S.A.</option>
                            <option value="40">40 - Banco Cargill S.A.</option>
                            <option value="745">745 - Banco Citibank S.A.</option>
                            <option value="M08">M08 - Banco Citicard S.A.</option>
                            <option value="M19">M19 - Banco CNH Capital S.A.</option>
                            <option value="215">215 - Banco Comercial e de Investimento Sudameris S.A.</option>
                            <option value="756">756 - Banco Cooperativo do Brasil S.A. – BANCOOB</option>
                            <option value="748">748 - Banco Cooperativo Sicredi S.A.</option>
                            <option value="505">505 - Banco Credit Suisse (Brasil) S.A.</option>
                            <option value="229">229 - Banco Cruzeiro do Sul S.A.</option>
                            <option value="3">3 - Banco da Amazônia S.A.</option>
                            <option value="707">707 - Banco Daycoval S.A.</option>
                            <option value="M06">M06 - Banco de Lage Landen Brasil S.A.</option>
                            <option value="24">24 - Banco de Pernambuco S.A. – BANDEPE</option>
                            <option value="456">456 - Banco de Tokyo-Mitsubishi UFJ Brasil S.A.</option>
                            <option value="214">214 - Banco Dibens S.A.</option>
                            <option value="1">1 - Banco do Brasil S.A.</option>
                            <option value="27">27 - Banco do Estado de Santa Catarina S.A.</option>
                            <option value="47">47 - Banco do Estado de Sergipe S.A.</option>
                            <option value="37">37 - Banco do Estado do Pará S.A.</option>
                            <option value="41">41 - Banco do Estado do Rio Grande do Sul S.A.</option>
                            <option value="4">4 - Banco do Nordeste do Brasil S.A.</option>
                            <option value="265">265 - Banco Fator S.A.</option>
                            <option value="M03">M03 - Banco Fiat S.A.</option>
                            <option value="224">224 - Banco Fibra S.A.</option>
                            <option value="626">626 - Banco Ficsa S.A.</option>
                            <option value="394">394 - Banco Finasa BMC S.A.</option>
                            <option value="175">175 - Banco Finasa S.A.</option>
                            <option value="252">252 - Banco Fininvest S.A.</option>
                            <option value="M18">M18 - Banco Ford S.A.</option>
                            <option value="233">233 - Banco GE Capital S.A.</option>
                            <option value="734">734 - Banco Gerdau S.A.</option>
                            <option value="M07">M07 - Banco GMAC S.A.</option>
                            <option value="612">612 - Banco Guanabara S.A.</option>
                            <option value="M22">M22 - Banco Honda S.A.</option>
                            <option value="63">63 - Banco Ibi S.A. - Banco Múltiplo</option>
                            <option value="M11">M11 - Banco IBM S.A.</option>
                            <option value="604">604 - Banco Industrial do Brasil S.A.</option>
                            <option value="320">320 - Banco Industrial e Comercial S.A.</option>
                            <option value="653">653 - Banco Indusval S.A.</option>
                            <option value="630">630 - Banco Intercap S.A.</option>
                            <option value="249">249 - Banco Investcred Unibanco S.A.</option>
                            <option value="184">184 - Banco Itaú BBA S.A.</option>
                            <option value="341">341 - Banco Itaú S.A.</option>
                            <option value="479">479 - Banco ItaúBank S.A</option>
                            <option value="M09">M09 - Banco Itaucred Financiamentos S.A.</option>
                            <option value="376">376 - Banco J. P. Morgan S.A.</option>
                            <option value="74">74 - Banco J. Safra S.A.</option>
                            <option value="217">217 - Banco John Deere S.A.</option>
                            <option value="65">65 - Banco Lemon S.A.</option>
                            <option value="600">600 - Banco Luso Brasileiro S.A.</option>
                            <option value="389">389 - Banco Mercantil do Brasil S.A.</option>
                            <option value="755">755 - Banco Merrill Lynch de Investimentos S.A.</option>
                            <option value="746">746 - Banco Modal S.A.</option>
                            <option value="151">151 - Banco Nossa Caixa S.A.</option>
                            <option value="45">45 - Banco Opportunity S.A.</option>
                            <option value="623">623 - Banco Panamericano S.A.</option>
                            <option value="611">611 - Banco Paulista S.A.</option>
                            <option value="643">643 - Banco Pine S.A.</option>
                            <option value="638">638 - Banco Prosper S.A.</option>
                            <option value="747">747 - Banco Rabobank International Brasil S.A.</option>
                            <option value="356">356 - Banco Real S.A.</option>
                            <option value="633">633 - Banco Rendimento S.A.</option>
                            <option value="M16">M16 - Banco Rodobens S.A.</option>
                            <option value="72">72 - Banco Rural Mais S.A.</option>
                            <option value="453">453 - Banco Rural S.A.</option>
                            <option value="422">422 - Banco Safra S.A.</option>
                            <option value="33">33 - Banco Santander S.A.</option>
                            <option value="250">250 - Banco Schahin S.A.</option>
                            <option value="749">749 - Banco Simples S.A.</option>
                            <option value="366">366 - Banco Société Générale Brasil S.A.</option>
                            <option value="637">637 - Banco Sofisa S.A.</option>
                            <option value="464">464 - Banco Sumitomo Mitsui Brasileiro S.A.</option>
                            <option value="M20">M20 - Banco Toyota do Brasil S.A.</option>
                            <option value="634">634 - Banco Triângulo S.A.</option>
                            <option value="208">208 - Banco UBS Pactual S.A.</option>
                            <option value="116">116 - Banco Único S.A.</option>
                            <option value="M14">M14 - Banco Volkswagen S.A.</option>
                            <option value="655">655 - Banco Votorantim S.A.</option>
                            <option value="610">610 - Banco VR S.A.</option>
                            <option value="370">370 - Banco WestLB do Brasil S.A.</option>
                            <option value="21">21 - BANESTES S.A. Banco do Estado do Espírito Santo</option>
                            <option value="719">719 - Banif-Banco Internacional do Funchal (Brasil)S.A.</option>
                            <option value="73">73 - BB Banco Popular do Brasil S.A.</option>
                            <option value="78">78 - BES Investimento do Brasil S.A.-Banco de Investimento</option>
                            <option value="69">69 - BPN Brasil Banco Múltiplo S.A.</option>
                            <option value="70">70 - BRB – Banco de Brasília S.A.</option>
                            <option value="104">104 - Caixa Econômica Federal</option>
                            <option value="477">477 - Citibank N.A.</option>
                            <option value="081-7">081-7 - Concórdia Banco S.A.</option>
                            <option value="487">487 - Deutsche Bank S.A. – Banco Alemão</option>
                            <option value="751">751 - Dresdner Bank Brasil S.A. – Banco Múltiplo</option>
                            <option value="62">62 - Hipercard Banco Múltiplo S.A.</option>
                            <option value="399">399 - HSBC Bank Brasil S.A. – Banco Múltiplo</option>
                            <option value="492">492 - ING Bank N.V.</option>
                            <option value="652">652 - Itaú Unibanco Banco Múltiplo S.A.</option>
                            <option value="488">488 - JPMorgan Chase Bank</option>
                            <option value="409">409 - UNIBANCO – União de Bancos Brasileiros S.A.</option>
                            <option value="230">230 - Unicard Banco Múltiplo S.A.</option>
                        </select>
    				</label>
    				<label>
    					Nº da agência:
    					<input type="text" name="agencia" required maxlength="8">
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
    					<input type="text" name="conta" required maxlength="14">
    				</label>
    				<label>
    					CPF:
    					<input type="text" name="cpf" required>
    				</label>
    				<span>Fique tranquilo! Você poderá atualizar os dados da sua conta a qualquer momento aqui no portal.</span>
    			</fieldset>
                <button type="submit" class="enviar"> Finalizar</button>
              {{ Html::image('assets/site/images/presentinho_red_end.png', '', array('class' => 'presentinho_red')) }}
    		</form>
    	</div>
    </div>
@endsection
