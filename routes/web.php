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
Route::any('/', ['as' => 'home','uses' => 'HomeController@index']);

Route::get('cadastro/confirmar-dados', ['as' => 'usuario.confirma', 'uses' => 'RegisterController@confirmar']);
Route::resource('cadastro/dados-bancarios', 'BankController');
Route::resource('cadastro', 'RegisterController');

Route::group(['prefix' => 'usuario'], function() {
    Route::get('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.show','uses' => 'PasswordRecoveryController@show']);
    Route::post('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.update','uses' => 'PasswordRecoveryController@update']);
    Route::resource('nova-senha', 'PasswordController');
    Route::get('logout', ['as' => 'usuario.logout','uses' => 'RegisterController@logout']);
    Route::post('login', ['as' => 'usuario.login','uses' => 'RegisterController@login']);

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
        Route::get('festa/{festa_id?}/presentes/roupas', ['as' => 'usuario.meus-aniversarios.presentes.roupas','uses' => 'GiftsController@index'])->where(['festa_id' => '[0-9]+']);
        Route::get('festa/{festa_id?}/presentes/brinquedos', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos','uses' => 'GiftsController@toys'])->where(['festa_id' => '[0-9]+']);
        Route::get('festa/{festa_id?}/presentes/brinquedos/adicionar', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.adicionar','uses' => 'GiftsController@toysAdd'])->where(['festa_id' => '[0-9]+']);
        Route::get('festa/{festa_id?}/presentes/brinquedos/lista', ['as' => 'usuario.meus-aniversarios.presentes.brinquedos.lista','uses' => 'GiftsController@toysList'])->where(['festa_id' => '[0-9]+']);
    });
});

Route::group(['prefix' => 'convidado', 'namespace' => 'Guest'], function() {
    Route::post('login', ['as'=> 'convidado.login', 'uses' => 'HomeController@login']);
    Route::get('{festa_id}', ['as'=> 'convidado.index', 'uses' => 'HomeController@index'])->where(['festa_id' => '[
        0-9]+']);
    Route::get('{festa_id}/brinquedos', ['as'=> 'convidado.brinquedos', 'uses' => 'HomeController@brinquedos'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/brinquedoscompraonline', ['as'=> 'convidado.brinquedoscompraonline', 'uses' => 'HomeController@brinquedoscompraonline'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/brinquedosdetalhe', ['as'=> 'convidado.brinquedosdetalhe', 'uses' => 'HomeController@brinquedosdetalhe'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/brinquedosreserva', ['as'=> 'convidado.brinquedosreserva', 'uses' => 'HomeController@brinquedosreserva'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/cotas', ['as'=> 'convidado.cotas', 'uses' => 'HomeController@cotas'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/cotasdetalhe', ['as'=> 'convidado.cotasdetalhe', 'uses' => 'HomeController@cotasdetalhe'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/cotasmensagem', ['as'=> 'convidado.cotasmensagem', 'uses' => 'HomeController@cotasmensagem'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/roupas', ['as'=> 'convidado.roupas', 'uses' => 'HomeController@roupas'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/roupasmensagem', ['as'=> 'convidado.roupasmensagem', 'uses' => 'HomeController@roupasmensagem'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/roupasdetalhe', ['as'=> 'convidado.roupasdetalhe', 'uses' => 'HomeController@roupasdetalhe'])->where(['festa_id' => '[0-9]+']);
    /* PAGINA CRIAR PRESENTES */
    Route::get('{festa_id}/criarbrinquedosdetalhe', ['as'=> 'convidado.criarbrinquedosdetalhe', 'uses' => 'HomeController@criarbrinquedosdetalhe'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/criarbrinquedosadicionarnovo', ['as'=> 'convidado.criarbrinquedosadicionarnovo', 'uses' => 'HomeController@criarbrinquedosadicionarnovo'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/criarbrinquedosecommerce', ['as'=> 'convidado.criarbrinquedosecommerce', 'uses' => 'HomeController@criarbrinquedosecommerce'])->where(['festa_id' => '[0-9]+']);
    /* PAGINA NOTIFICACAO */
    Route::get('{festa_id}/notificacaoaniversario', ['as'=> 'convidado.notificacaoaniversario', 'uses' => 'HomeController@notificacaoaniversario'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/notificacaoimprimirconvite', ['as'=> 'convidado.notificacaoimprimirconvite', 'uses' => 'HomeController@notificacaoimprimirconvite'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/notificacaoconvitedigital', ['as'=> 'convidado.notificacaoconvitedigital', 'uses' => 'HomeController@notificacaoconvitedigital'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/notificacaoenviaremail', ['as'=> 'convidado.notificacaoenviaremail', 'uses' => 'HomeController@notificacaoenviaremail'])->where(['festa_id' => '[0-9]+']);
    Route::get('{festa_id}/notificacaoenviarconvite', ['as'=> 'convidado.notificacaoenviarconvite', 'uses' => 'HomeController@notificacaoenviarconvite'])->where(['festa_id' => '[0-9]+']);
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

    Route::get('produtos/status/{id}/{status}', ['as'=> 'admin.products.status', 'uses' => 'ProductsController@status']);

    Route::resource('produtos', 'ProductsController', [
        'names' => [
            'index'   => 'admin.products.index',
            'create'  => 'admin.products.create',
            'store'   => 'admin.products.store',
            'show'    => 'admin.products.show',
            'edit'    => 'admin.products.edit',
            'update'  => 'admin.products.update',
            'destroy' => 'admin.products.destroy'
        ]
    ]);
});