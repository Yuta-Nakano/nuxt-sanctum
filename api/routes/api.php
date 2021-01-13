<?php

use App\Http\Controllers\Api;
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

Route::group(['domain' => 'api.nuxt-sanctum.mine'], function () {
    Route::get('test', function (Request $request) {
        return response(['test']);
    })->name('test');

    Route::post('login', [Api\Auth\LoginController::class, 'login']);
    // Route::post('register', [Api\Auth\RegisterController::class, 'register']);
});

Route::group(['domain' => 'api.nuxt-sanctum.mine', 'auth' => 'sanctum'], function () {
    Route::post('logout', [Api\Auth\LoginController::class, 'logout']);
    Route::get('user', fn (Request $request) => $request->user());
});
