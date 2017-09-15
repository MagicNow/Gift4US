@extends('convidado/master')

@section('content')

  <div class="preview dashboard col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="preview-banner">
        <div class="preview-banner-item">
          <img src="{{ url('assets/site/images/convidado/banner_1.png') }}" alt="{{ $party->nome }}" class="preview-banner-item-image">
        </div>
    </div>
    <div class="text-center">
      <a href="#" class="preview-more-btn">Clique e saiba tudo sobre a festa!</a>
    </div>

    <div class="preview-header">
      <div class="preview-header-decor preview-header-decor-left"></div>
      <div class="preview-header-name">{{ $party->nome }}</div>
      <div class="preview-header-image-container text-center">
        <div class="preview-header-image-mask">&nbsp;</div>
        <img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image"></div>
      </div>
     <div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
      <div class="preview-header-decor preview-header-decor-right"></div>
    </div>

    <div class="control-panel">
      <img src="{{ url('assets/site/images/presentinho-preview-1.png') }}" class="preview-presentinho">
      <div class="preview-header-address">{{ $party->endereco }}</div>

      <div class="preview-container">
        <img src="{{ url('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
        <ul class="preview-list row">
          <li class="col-md-3 preview-item-container">
            <div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-check.png') }}"></div>
            <p class="preview-item-text text-center">CONFIRMAR PRESENÇA</p>
          </li>
          <li class="col-md-3 text-center preview-item-container">
            <div class="preview-item text-center">57%</div>
            <p class="preview-item-text text-center">LISTA DE PRESENTES DISPONÍVEIS</p>
          </li>
          <li class="col-md-3 text-center preview-item-container ">
            <div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-pin.png') }}"></div>
            <p class="preview-item-text text-center">ESCREVA UM RECADO</p>
          </li>
          <li class="col-md-3 text-right preview-item-container ">
            <div class="preview-item text-center"><img src="{{ url('assets/site/images/preview-icon-map.png') }}"></div>
            <p class="preview-item-text text-center">CLIQUE PARA VER O MAPA</p>
          </li>
        </ul>
        <div class="preview-advertising">
          <span class="preview-advertising-btn">Publicidade</span>
        </div>
      </div>
    </div>


    <div class="rsvp">
      <div class="preview-header fixed">
        <div class="preview-header-decor preview-header-decor-left"></div>
        <div class="preview-header-name">{{ $party->nome }}</div>
        <div class="preview-header-image-container text-center">
          <div class="preview-header-image-mask">&nbsp;</div>
          <img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image"></div>
        </div>
        <div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
        <div class="preview-header-decor preview-header-decor-right"></div>

        <div class="sub-menu text-center">
          <a class="confirm-btn active" href="#">confirmar presença</a>
          <a class="gifts-btn" href="#">presentes disponíveis</a>
          <a class="message-btn" href="#">escreva um recado</a>
          <a class="map-btn" href="#">ver o mapa</a>
        </div>
      </div>

      <img src="{{ url('assets/site/images/preview-presentinho-vermelho.png') }}" class="preview-presentinho-vermelho">
      <img src="{{ url('assets/site/images/convidado/rsvp.png') }}" class="rsvp-baloes">
      <div class="rsvp-form">
        <fieldset class="col-md-12">
          <div class="form-group">
            <input type="text" name="nome" id="rsvp-nome" class="form-control form-input" placeholder="nome">
          </div>
          <div class="form-group">
            <input type="email" name="email" id="rsvp-email" class="form-control form-input" placeholder="e-mail">
          </div>
          <div class="form-group form-rsvp-guests-container">
            <select name="guests" class="form-control form-rsvp-guests-input" id="rsvp-guests">
              <option value="" selected disabled>Quantas pessoas irão na festa?</option>
              <option value="5">5</option>
              <option value="15">15</option>
              <option value="25">25</option>
              <option value="35">35</option>
            </select>
          </div>
          <p class="text-left">Quero fazer a confirmação de presença <button type="submit" class="enviar rsvp-form-enviar"> Enviar</button></p>
        </fieldset>
      </div>
    </div>

    <div class="gifts">
      <div class="preview-header fixed">
        <div class="preview-header-decor preview-header-decor-left"></div>
        <div class="preview-header-name">{{ $party->nome }}</div>
        <div class="preview-header-image-container text-center">
          <div class="preview-header-image-mask">&nbsp;</div>
          <img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image"></div>
        </div>
        <div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
        <div class="preview-header-decor preview-header-decor-right"></div>

        <div class="sub-menu text-center">
          <a class="confirm-btn" href="#">confirmar presença</a>
          <a class="gifts-btn active" href="#">presentes disponíveis</a>
          <a class="message-btn" href="#">escreva um recado</a>
          <a class="map-btn" href="#">ver o mapa</a>
        </div>
      </div>

      <img src="{{ url('assets/site/images/convidado/presente_oba.png') }}" class="presente-oba">
      <ul class="preview-list row">
        <li class="col-md-4 preview-item-container text-center">
          <div class="preview-item-toys"></div>
          <p class="preview-item-text text-center">BRINQUEDOS</p>
          <p class="text-center desc">Clique aqui para ver a lista completa dos brinquedos prediletos escolhidos pelo aniversariante!</p>
        </li>
        <li class="col-md-4 text-center preview-item-container">
          <div class="preview-item-clothes text-center"></div>
          <p class="preview-item-text text-center">ROUPAS</p>
          <p class="text-center desc">Clique aqui para ver a lista de roupas que o aniversariante quer ganhar!</p>
        </li>
        <li class="col-md-4 text-center preview-item-container ">
          <div class="preview-item-quota text-center"></div>
          <p class="preview-item-text text-center">COTAS</p>
          <p class="text-center desc">Clique aqui para presentear com parte da cota e ajudar naquele presentão!</p>
        </li>
      </ul>
    </div>

    <div class="msg">
      <div class="preview-header fixed">
        <div class="preview-header-decor preview-header-decor-left"></div>
        <div class="preview-header-name">{{ $party->nome }}</div>
        <div class="preview-header-image-container text-center">
          <div class="preview-header-image-mask">&nbsp;</div>
          <img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image"></div>
        </div>
        <div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
        <div class="preview-header-decor preview-header-decor-right"></div>

        <div class="sub-menu text-center">
          <a class="confirm-btn" href="#">confirmar presença</a>
          <a class="gifts-btn" href="#">presentes disponíveis</a>
          <a class="message-btn active" href="#">escreva um recado</a>
          <a class="map-btn" href="#">ver o mapa</a>
        </div>
      </div>

      <img src="{{ url('assets/site/images/convidado/msg_presente.png') }}" class="preview-presentinho-vermelho">
      <div class="msg-form">
        <fieldset class="col-md-12">
          <p class="text-left">Escreva uma mensagem</p>
          <div class="form-group">
            <input type="text" name="nome" id="msg-nome" class="form-control form-input" placeholder="nome">
          </div>
          <div class="form-group">
            <textarea name="mensagem" id="msg-mensagem" class="form-control form-input" placeholder="Escreva aqui uma mensagem bem legal e divertida para o aniversariante"></textarea>
          </div>
           <button type="submit" class="enviar msg-form-enviar"> Enviar</button>
        </fieldset>
      </div>

        <div class="preview-advertising">
          <span class="preview-advertising-btn">Publicidade</span>
        </div>
    </div>


    <div class="mapa">
      <div class="preview-header fixed">
        <div class="preview-header-decor preview-header-decor-left"></div>
        <div class="preview-header-name">{{ $party->nome }}</div>
        <div class="preview-header-image-container text-center">
          <div class="preview-header-image-mask">&nbsp;</div>
          <img src="{{ url('storage/birthdays/mask/' . pathinfo($party->foto, PATHINFO_FILENAME) . '.png') }}" alt="{{ $party->nome }}" height="111" class="preview-header-image"></div>
        </div>
        <div class="preview-header-info">30.10 | 16:30<br>5 ANOS</div>
        <div class="preview-header-decor preview-header-decor-right"></div>

        <div class="sub-menu text-center">
          <a class="confirm-btn" href="#">confirmar presença</a>
          <a class="gifts-btn" href="#">presentes disponíveis</a>
          <a class="message-btn" href="#">escreva um recado</a>
          <a class="map-btn active" href="#">ver o mapa</a>
        </div>
      </div>
      <div class="container clearfix">
        <img src="{{ url('assets/site/images/convidado/presente_como_chegar.png') }}" class="presente-como">
        <div class="location">
          <div class="where">
            <h3>Onde?<h3>
            <p>Rua Taquari, 941 - ap12, Bloco1- Mooca, <br>São Paulo - SP<br>Próximo a Padaria Cassandoca</p>
          </div>
          <div class="obs">
            <h3>Observações:<h3>
            <p>Levar 1 litro de leite para doação.</p>
          </div>

        </div>
        <div class="g-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5515638523307!2d-46.59742108449097!3d-23.54862608468925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59337d1371fd%3A0xf95eeb1450923bf1!2sRua+Taquari%2C+941+-+Mooca%2C+S%C3%A3o+Paulo+-+SP%2C+03166-001!5e0!3m2!1spt-BR!2sbr!4v1505443246125" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>


  </div>

@endsection

@section('scripts')

@endsection
