<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country-dropdown', 'App\Http\Controllers\ApiController@fetchCountry');
Route::post('fetch-states', 'App\Http\Controllers\ApiController@fetchState');
Route::post('fetch-cities', 'App\Http\Controllers\ApiController@fetchCity');
