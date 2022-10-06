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

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['prefix' => 'cars'], function () {
    Route::get('/', 'App\Http\Controllers\CarController@list');
    Route::get('/{car_id}', 'App\Http\Controllers\CarController@show');
});

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'App\Http\Controllers\BrandController@list');
    Route::get('/{brand_id}', 'App\Http\Controllers\BrandController@show');
});

Route::group(['middleware' => 'auth:sanctum'], function () {

    /** Grupo de usuários */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'App\Http\Controllers\UserController@list');
        Route::get('/{user_id}', 'App\Http\Controllers\UserController@show');
        Route::post('/', 'App\Http\Controllers\UserController@store');
        Route::put('/{user_id}', 'App\Http\Controllers\UserController@update');
        Route::delete('/{user_id}', 'App\Http\Controllers\UserController@destroy');
    });

    /** Grupo de carros */
    Route::group(['prefix' => 'cars'], function () {
        Route::post('/', 'App\Http\Controllers\CarController@store');
        Route::put('/{car_id}', 'App\Http\Controllers\CarController@update');
        Route::delete('/{car_id}', 'App\Http\Controllers\CarController@destroy');
    });

    /** Grupo de carros */
    Route::group(['prefix' => 'brand'], function () {
        Route::post('/', 'App\Http\Controllers\BrandController@store');
        Route::put('/{car_id}', 'App\Http\Controllers\BrandController@update');
        Route::delete('/{car_id}', 'App\Http\Controllers\BrandController@destroy');
    });
});
