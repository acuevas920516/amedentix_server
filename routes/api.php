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

Route::middleware('auth:api')->post('/prueba', function (Request $request) {
    return new \Illuminate\Http\JsonResponse(array(
        'data' => 'Estamos llegando'
    ),200);
});

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
