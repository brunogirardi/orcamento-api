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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'insumos'], function() {
    Route::get('/{id}', 'InsumosController@show');
    Route::get('/', 'InsumosController@index');
    Route::post('/', 'InsumosController@store');
    Route::patch('/{id}', 'InsumosController@update');
    Route::delete('/{id}', 'InsumosController@destroy');

});

Route::group(['prefix' => 'cpus'], function() {

    // Manipulates de Header of the CPU
    Route::get('/{id}', 'CpusController@show');
    Route::get('/', 'CpusController@index');
    Route::post('/', 'CpusController@store');
    Route::patch('/{id}', 'CpusController@update');
    Route::delete('/{id}', 'CpusController@destroy');

    Route::group(['prefix' => '/{cpu}/item'], function() {
        Route::get('/', 'CpuItensController@show');
        Route::post('/', 'CpuItensController@store');
        Route::patch('/{item}', 'CpuItensController@update');
        Route::delete('/{item}', 'CpuItensController@destroy');
    });

    // Manipulates the hole CPU
    Route::post('/full', 'CpusController@fullStore');
    Route::patch('/{id}/full', 'CpusController@fullUpdate');

});

Route::group(['prefix' => 'orcamento'], function() {
    
    // Manipulates the Header of the Budgets
    Route::get('/{id}', 'OrcamentoController@show');
    Route::get('/', 'OrcamentoController@index');
    Route::post('/', 'OrcamentoController@store');
    Route::patch('/{id}', 'OrcamentoController@update');
    Route::delete('/{id}', 'OrcamentoController@destroy');

    // Manipulates the BDI from the Budgets
    Route::group(['prefix' => '/{orcamento}/bdi'], function() {
        Route::get('/', 'OrcamentoBdiController@index');
        Route::post('/', 'OrcamentoBdiController@store');
        Route::get('/{id}', 'OrcamentoBdiController@show');
        Route::patch('/{id}', 'OrcamentoBdiController@update');
        Route::delete('/{id}', 'OrcamentoBdiController@destroy');
    });

    // Manipulates the items from the Budgets
    Route::group(['prefix' => '/{orcamento}/item'], function() {
        Route::get('/', 'OrcamentoItemController@index');
        Route::post('/', 'OrcamentoItemController@storeInsumo');
        Route::post('/nivel', 'OrcamentoItemController@storeNivel');
        Route::get('/{id}', 'OrcamentoItemController@show');
        Route::patch('/{id}', 'OrcamentoItemController@updateInsumo');
        Route::patch('/{id}/Nivel', 'OrcamentoItemController@updateNivel');
        Route::delete('/{id}', 'OrcamentoItemController@destroy');
    });

});

Route::group(['prefix' => '/items'], function () {
    // Relaciona todos os insumos no formato de CpuItem
    Route::get('/', 'CpuItensController@index');
});