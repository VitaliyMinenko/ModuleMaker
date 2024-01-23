<?php

use Illuminate\Http\Response;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/generateModule','\App\Http\Controllers\ModuleController@generate');

    Route::any('/{path}', function() {
        return response()->json([
            'status'   => 'error',
            'message' => 'Route not found'
        ], Response::HTTP_NOT_FOUND);
    })->where('path', '.*');
});
