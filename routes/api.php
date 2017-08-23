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

Route::get('produtos', ['as' => 'produtos', 'uses' => 'ApiController@produtos']);
Route::post('presentes/adicionar', ['as' => 'presentes.adicionar', 'uses' => 'ApiController@presentesAdicionar']);
Route::post('presentes/remover', ['as' => 'presentes.remover', 'uses' => 'ApiController@presentesRemover']);
Route::post('categorias/adicionar', ['as' => 'categorias.adicionar', 'uses' => 'ApiController@categoriasAdicionar']);