<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/nova', ['as' => 'home-new','uses' => 'HomeController@index_new']);
Route::get('/', ['as' => 'home','uses' => 'HomeController@index']);

Route::get('cadastro/confirmar-dados', ['as' => 'usuario.confirma', 'uses' => 'RegisterController@confirmar']);
Route::resource('cadastro/dados-bancarios', 'BankController');
Route::resource('cadastro', 'RegisterController');

Route::group(['prefix' => 'usuario'], function() {
	Route::get('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.show','uses' => 'PasswordRecoveryController@show']);
	Route::post('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.update','uses' => 'PasswordRecoveryController@update']);
	Route::resource('nova-senha', 'PasswordController');
	Route::get('logout', ['as' => 'usuario.logout','uses' => 'RegisterController@logout']);
	Route::post('login', ['as' => 'usuario.login','uses' => 'RegisterController@login']);
	Route::post('recuperar-senha', ['as' => 'usuario.remember','uses' => 'RegisterController@rememberPassword']);

	Route::resource('transferencia', 'TransferController');

	Route::group(['prefix' => 'meus-aniversarios'], function() {
		Route::get('/', ['as' => 'usuario.meus-aniversarios','uses' => 'BirthdayController@index']);
		Route::get('/{festa?}', ['as' => 'usuario.meus-aniversarios.editar','uses' => 'BirthdayController@edit'])->where(['festa' => '[0-9]+']);

		Route::get('novo/{number?}', ['as' => 'usuario.meus-aniversarios.novo','uses' => 'BirthdayController@create'])->where(['number' => '[0-9]+']);
		Route::get('festa/{festa_id?}/passo/{passo?}', ['as' => 'usuario.meus-aniversarios.novo.festa','uses' => 'BirthdayController@create'])->where(['passo' => '[0-9]+', 'festa_id' => '[0-9]+']);
		Route::post('novo/{passo?}', ['as' => 'usuario.meus-aniversarios.store','uses' => 'BirthdayController@store']);
		Route::post('upload', ['as' => 'usuario.meus-aniversarios.upload','uses' => 'BirthdayController@upload']);
		Route::get('excluir/{id}', ['as' => 'usuario.meus-aniversarios.excluir','uses' => 'BirthdayController@aviso'])->where(['id' => '[0-9]+']);
		Route::post('excluir/{id}', ['as' => 'usuario.meus-aniversarios.excluir-post','uses' => 'BirthdayController@destroy'])->where(['id' => '[0-9]+']);
		Route::get('festa/{festa_id}/preview/{layout_id}', ['as' => 'usuario.meus-aniversarios.preview','uses' => 'GiftsController@preview'])->where(['festa_id' => '[0-9]+', 'layout_id' => '[0-9]+']);

		/** ROUPAS **/
		Route::get('festa/{festa_id?}/presentes/roupas', ['as' => 'usuario.meus-aniversarios.presentes.roupas','uses' => 'GiftsController@index'])->where(['festa_id' => '[0-9]+']);
		Route::get('festa/{festa_id?}/presentes/roupas/{roupa_id}/detalhe', ['as'=> 'usuario.meus-aniversarios.presentes.coupas.detalhe', 'uses' => 'GiftsController@clothesDetail']);

		/** BRINQUEDOS **/
		Route::get('festa/{festa_id?}/presentes/brinquedos', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos','uses' => 'GiftsController@toys'])->where(['festa_id' => '[0-9]+']);
		Route::get('festa/{festa_id?}/presentes/brinquedos/adicionar', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.adicionar','uses' => 'GiftsController@toysAdd'])->where(['festa_id' => '[0-9]+']);
		Route::get('festa/{festa_id?}/presentes/brinquedos/lista', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.lista','uses' => 'GiftsController@toysList'])->where(['festa_id' => '[0-9]+']);
		Route::get('festa/{festa_id?}/presentes/brinquedos/{brinquedo_id?}/detalhe', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.detalhe','uses' => 'GiftsController@toysDetail'])->where(['festa_id' => '[0-9]+', 'brinquedo_id' => '[0-9]+']);
		Route::post('festa/{festa_id?}/presentes/brinquedos/adicionar', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.submeter','uses' => 'GiftsController@toysStore']);
		Route::put('festa/{festa_id?}/presentes/brinquedos/{brinquedo_id?}/editar', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.editar','uses' => 'GiftsController@toysUpdate']);

		/** COTAS **/
		Route::get('festa/{festa_id?}/presentes/cotas', ['as' => 'usuario.meus-aniversarios.presentes.cotas','uses' => 'GiftsController@quotas'])->where(['festa_id' => '[0-9]+']);
		Route::get('festa/{festa_id?}/presentes/cotas/adicionar', ['as'=> 'usuario.meus-aniversarios.presentes.cotas.adicionar', 'uses' => 'GiftsController@quotasAdd']);
		Route::post('festa/{festa_id?}/presentes/cotas/adicionar', ['as' => 'usuario.meus-aniversarios.presentes.cotas.submeter','uses' => 'GiftsController@quotasStore']);

		// Route::get('festa/{festa_id?}/presentes/cotas/criar-ecommerce', ['as'=> 'convidado.brinquedos.criarEcommerce', 'uses' => 'ToysController@criarEcommerce']);
	});
});

Route::group(['prefix' => 'notificacoes/{festa_id}'], function() {
	Route::get('aniversario', ['as'=> 'notificacoes.aniversario', 'uses' => 'NotificationsController@aniversario']);
	Route::get('convite-digital', ['as'=> 'notificacoes.convitedigital', 'uses' => 'NotificationsController@conviteDigital']);
	Route::get('enviar-email', ['as'=> 'notificacoes.enviaremail', 'uses' => 'NotificationsController@enviarEmail']);
	Route::get('enviar-convite', ['as'=> 'notificacoes.enviarconvite', 'uses' => 'NotificationsController@enviarConvite']);

	Route::group(['prefix' => 'exportar'], function() {
		Route::get('recados', ['as'=> 'notificacoes.exportar.recados', 'uses' => 'NotificationsController@exportaRecados']);
	});

	Route::group(['prefix' => 'imprimir'], function() {
		Route::get('convite', ['as'=> 'notificacoes.imprimir.convite', 'uses' => 'NotificationsController@imprimirConvite']);
		Route::get('lista-presentes', ['as'=> 'notificacoes.imprimir.listaPresentes', 'uses' => 'NotificationsController@imprimirListaPresentes']);
		Route::get('presencas-confirmadas', ['as'=> 'notificacoes.imprimir.presencas', 'uses' => 'NotificationsController@imprimirPresencas']);
	});

	Route::get('submeter-emails', ['as'=> 'notificacoes.submeter', 'uses' => 'NotificationsController@submeterEmails']);
});

Route::group(['prefix' => 'aniversariante', 'namespace' => 'Guest'], function() {
	Route::post('login', ['as'=> 'convidado.login', 'uses' => 'HomeController@login']);
	Route::post('{slug}/confirmar-presenca', ['as'=> 'convidado.confirmar-presenca', 'uses' => 'HomeController@confirmarPresenca']);
	Route::post('{slug}/escrever-mensagem', ['as'=> 'convidado.escrever-mensagem', 'uses' => 'HomeController@escreverMensagem']);
	Route::get('{slug}', ['as'=> 'convidado.index', 'uses' => 'HomeController@index']);

	/** BRINQUEDOS */
	Route::group(['prefix' => '{slug}/brinquedos'], function () {
		Route::get('/', ['as'=> 'convidado.brinquedos.index', 'uses' => 'ToysController@index']);
		Route::get('compra-online/{product_id}', ['as'=> 'convidado.brinquedos.compraOnline', 'uses' => 'ToysController@compraOnline']);
		Route::get('detalhe/{produto_id}', ['as'=> 'convidado.brinquedos.detalhe', 'uses' => 'ToysController@detalhe']);
		Route::get('reserva/{produto_id}', ['as'=> 'convidado.brinquedos.reserva', 'uses' => 'ToysController@reserva']);
	});

	Route::group(['prefix' => '{slug}/cotas'], function () {
		Route::get('/', ['as'=> 'convidado.cotas.index', 'uses' => 'QuotasController@index']);
		Route::get('detalhe/{product_id}', ['as'=> 'convidado.cotas.detalhe', 'uses' => 'QuotasController@detalhe']);
		Route::get('mensagem', ['as'=> 'convidado.cotas.mensagem', 'uses' => 'QuotasController@mensagem']);
		Route::get('compra-online/{product_id}', ['as'=> 'convidado.cotas.compraOnline', 'uses' => 'QuotasController@compraOnline']);
		Route::post('compra-online/{product_id}', ['as'=> 'convidado.cotas.compraOnline', 'uses' => 'QuotasController@compraOnlineSubmeter']);
	});

	Route::group(['prefix' => '{slug}/roupas'], function () {
		Route::get('/', ['as'=> 'convidado.roupas.index', 'uses' => 'ClothesController@index']);
		Route::get('mensagem/{produto_id}', ['as'=> 'convidado.roupas.mensagem', 'uses' => 'ClothesController@mensagem']);
		Route::get('detalhe/{produto_id}', ['as'=> 'convidado.roupas.detalhe', 'uses' => 'ClothesController@detalhe']);
		Route::get('compra-online/{product_id}', ['as'=> 'convidado.roupas.compraOnline', 'uses' => 'ClothesController@compraOnline']);
		Route::post('compra-online/{product_id}', ['as'=> 'convidado.roupas.compraOnline', 'uses' => 'ClothesController@compraOnlineSubmeter']);
	});

	Route::post('compra-online/status', ['as'=> 'convidado.roupas.status', 'uses' => 'PurchaseController@status']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', ['as'=> 'admin.index','uses' => 'AdminController@index']);
	Route::get('login', ['as'=> 'admin.login','uses' => 'AdminController@index']);
	Route::post('login', ['uses' => 'AdminController@login']);
	Route::post('password/reset', ['as'=> 'admin.password','uses' => 'AdminController@changePassword']);
	Route::get('logout', ['as'=> 'admin.logout','uses' => 'AdminController@logout']);

	//USERS
	Route::get('users', ['as'=> 'admin.users','uses' => 'UsersController@index']);
	Route::get('users/create', ['as'=> 'admin.users.create','uses' => 'UsersController@create']);
	Route::get('users/edit/{id}', ['as'=> 'admin.users.edit','uses' => 'UsersController@edit']);
	Route::get('users/destroy/{id}', ['as'=> 'admin.users.destroy','uses' => 'UsersController@destroy']);
	Route::post('users/store/{id?}', ['as'=> 'admin.users.store','uses' => 'UsersController@store']);
	
	//POSTS

	Route::group(['prefix' => 'produtos', 'namespace' => 'Products'], function() {
		Route::get('brinquedos/status/{id}/{status}', ['as'=> 'admin.products.toys.status', 'uses' => 'ToysController@status']);
		Route::get('roupas/status/{id}/{status}', ['as'=> 'admin.products.clothes.status', 'uses' => 'ClothesController@status']);

		Route::resource('brinquedos', 'ToysController', [
			'names' => [
				'index'   => 'admin.products.toys.index',
				'create'  => 'admin.products.toys.create',
				'store'   => 'admin.products.toys.store',
				'show'    => 'admin.products.toys.show',
				'edit'    => 'admin.products.toys.edit',
				'update'  => 'admin.products.toys.update',
				'destroy' => 'admin.products.toys.destroy'
			]
		]);

		Route::resource('roupas', 'ClothesController', [
			'names' => [
				'index'   => 'admin.products.clothes.index',
				'create'  => 'admin.products.clothes.create',
				'store'   => 'admin.products.clothes.store',
				'show'    => 'admin.products.clothes.show',
				'edit'    => 'admin.products.clothes.edit',
				'update'  => 'admin.products.clothes.update',
				'destroy' => 'admin.products.clothes.destroy'
			]
		]);

		Route::resource('cotas', 'QuotasController', [
			'names' => [
				'index'   => 'admin.products.quotas.index',
				'destroy' => 'admin.products.quotas.destroy'
			]
		]);
	});
});