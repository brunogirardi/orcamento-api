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
