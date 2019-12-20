<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show dashboard
Route::get('/', 'FormController@index');

// Show choice of form versions
Route::get('/choose', 'FormController@choose');

// Show CRUD functions of Form Version 1
Route::post('/v1', 'FormController@storeV1');
Route::get('/v1/create', 'FormController@createV1');
Route::put('/v1/{form}', 'FormController@updateV1');
Route::get('/v1/{form}/edit', 'FormController@editV1');

// Show CRUD functions of Form Version 2
Route::post('/v2', 'FormController@storeV2');
Route::get('/v2/create', 'FormController@createV2');
Route::put('/v2/{form}', 'FormController@updateV2');
Route::get('/v2/{form}/edit', 'FormController@editV2');

// Show CRUD functions of Form Version 2
Route::post('/v3', 'FormController@storeV3');
Route::get('/v3/create', 'FormController@createV3');
Route::put('/v3/{form}', 'FormController@updateV3');
Route::get('/v3/{form}/edit', 'FormController@editV3');

// Delete any form
Route::delete('/{form}', 'FormController@destroy');
