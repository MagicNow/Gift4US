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
    Route::get('editar-dados', ['as' => 'usuario.editar-dados','uses' => 'HomeController@editar_dados']);
    Route::get('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.show','uses' => 'PasswordRecoveryController@show']);
    Route::post('nova-senha/recuperar', ['as' => 'usuario.nova-senha.recuperar.update','uses' => 'PasswordRecoveryController@update']);
    Route::resource('nova-senha', 'PasswordController');
    Route::get('logout', ['as' => 'usuario.logout','uses' => 'RegisterController@logout']);
    Route::post('login', ['as' => 'usuario.login','uses' => 'RegisterController@login']);

    Route::resource('transferencia', 'TransferController');

    Route::group(['prefix' => 'meus-aniversarios'], function() {
        Route::get('/', ['as' => 'usuario.meus-aniversarios','uses' => 'HomeController@meus_aniversarios']);
        Route::get('novo', ['as' => 'usuario.meus-aniversarios.novo','uses' => 'HomeController@meus_aniversarios_novo']);
        Route::get('excluir/{id}', ['as' => 'usuario.meus-aniversarios.excluir','uses' => 'HomeController@meus_aniversarios_excluir']);
    });
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', ['as'=> 'admin.index','uses' => 'Admin\AdminController@index']);
    Route::get('login', ['as'=> 'admin.login','uses' => 'Admin\AdminController@index']);
    Route::post('login', ['uses' => 'Admin\AdminController@login']);
    Route::post('password/reset', ['as'=> 'admin.password','uses' => 'Admin\AdminController@changePassword']);
    Route::get('logout', ['as'=> 'admin.logout','uses' => 'Admin\AdminController@logout']);

    //USERS
    Route::get('users', ['as'=> 'admin.users','uses' => 'Admin\UsersController@index']);
    Route::get('users/create', ['as'=> 'admin.users.create','uses' => 'Admin\UsersController@create']);
    Route::get('users/edit/{id}', ['as'=> 'admin.users.edit','uses' => 'Admin\UsersController@edit']);
	Route::get('users/destroy/{id}', ['as'=> 'admin.users.destroy','uses' => 'Admin\UsersController@destroy']);
    Route::post('users/store/{id?}', ['as'=> 'admin.users.store','uses' => 'Admin\UsersController@store']);
	
	//POSTS

    Route::get('produtos', ['as'=> 'admin.produtos','uses' => 'Admin\ProdutosController@index']);
    Route::get('produtos/status/{id}/{status}', ['as'=> 'admin.produtos.status','uses' => 'Admin\ProdutosController@status']);
});

Route::group(['prefix' => 'api'], function() {
    Route::get('/produtos', ['as'   => 'produtos','uses' => 'ApiController@produtos']);
});