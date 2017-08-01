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
        Route::get('/', ['as' => 'usuario.meus-aniversarios','uses' => 'HomeController@meus_aniversarios']);
        Route::get('novo/{number?}', ['as' => 'usuario.meus-aniversarios.novo','uses' => 'HomeController@meus_aniversarios_novo'])->where(['number' => '[0-9]+']);
        Route::post('novo/{number?}', ['as' => 'usuario.meus-aniversarios.novo','uses' => 'HomeController@meus_aniversarios_novo'])->where(['number' => '[0-9]+']);
        Route::post('upload', ['as' => 'usuario.meus-aniversarios.upload','uses' => 'HomeController@meus_aniversarios_upload']);
        Route::get('excluir/{id}', ['as' => 'usuario.meus-aniversarios.excluir','uses' => 'HomeController@meus_aniversarios_excluir'])->where(['id' => '[0-9]+']);
        Route::get('novo/presentes/roupas', ['as' => 'usuario.meus-aniversarios.presentes.roupas','uses' => 'GiftsController@index']);
    });
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

    Route::get('produtos/status/{id}/{status}', ['as'=> 'admin.produtos.status','uses' => 'ProductsController@status']);

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