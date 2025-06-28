<?php

use App\Http\Controllers\api\v1\AuthApiController as AuthApiControllerV1;
use App\Http\Controllers\api\v1\PostApiController as PostApiControllerV1;
use App\Http\Controllers\api\v2\PostApiController as PostApiControllerV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('post', [PostApiController::class, 'index']);
// Route::post('post', [PostApiController::class, 'create']);
// Route::delete('post', [PostApiController::class, 'delete']);
// Route::patch('post', [PostApiController::class, 'update']);
// Route::put('post', [PostApiController::class, 'update']);

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiControllerV1::class)->middleware('auth:api');

    // Auth routes login, logout, refresh, me
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthApiControllerV1::class, 'login']);
        Route::middleware('auth:api')->group(function () {
            Route::get('me', [AuthApiControllerV1::class, 'me']);
            Route::post('logout', [AuthApiControllerV1::class, 'logout']);
            Route::post('refresh', [AuthApiControllerV1::class, 'refresh']);
        });
    });
});

Route::prefix('v2')->group(function () {
    Route::apiResource('post', PostApiControllerV2::class);
});