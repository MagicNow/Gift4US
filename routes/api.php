<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('festas/ativar', ['as' => 'festas.ativar', 'uses' => 'ApiController@festasAtivar']);
Route::post('festas/remover', ['as' => 'festas.remover', 'uses' => 'ApiController@festasRemover']);
Route::get('produtos', ['as' => 'produtos', 'uses' => 'ApiController@produtos']);
Route::post('presentes/adicionar', ['as' => 'presentes.adicionar', 'uses' => 'ApiController@presentesAdicionar']);
Route::post('presentes/remover', ['as' => 'presentes.remover', 'uses' => 'ApiController@presentesRemover']);
Route::post('presentes/reservar', ['as' => 'presentes.reservar', 'uses' => 'ApiController@presentesReservar']);
Route::post('categorias/adicionar', ['as' => 'categorias.adicionar', 'uses' => 'ApiController@categoriasAdicionar']);
Route::post('lista/adicionar', ['as' => 'lista.adicionar', 'uses' => 'ApiController@listaAdicionar']);
Route::post('lista/importar', ['as' => 'lista.importar', 'uses' => 'ApiController@listaImportar']);
Route::post('lista/antigas/importar', ['as' => 'lista.antigas.importar', 'uses' => 'ApiController@listaAntigaImportar']);
Route::post('lista/antigas', ['as' => 'lista.antigas', 'uses' => 'ApiController@listaAntiga']);
Route::delete('lista/remover', ['as' => 'lista.remover', 'uses' => 'ApiController@listaRemover']);
Route::post('cotas/remover', ['as' => 'cotas.remover', 'uses' => 'ApiController@cotasRemover']);