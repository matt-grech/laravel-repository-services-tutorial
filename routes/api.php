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

Route::patch('v1/albums/{id}', 'Album\UpdateController@update');
Route::post('v1/albums', 'Album\CreateController@store');
Route::get('v1/albums', 'Album\GetController@index');
Route::get('v1/albums/{id}/edit', 'Album\GetController@edit');
Route::get('v1/albums/list', 'Album\GetController@list');
Route::get('v1/albums/search', 'Album\GetController@search');
