<?php

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

Route::prefix('v1')->group(function(){
    Route::apiResource('post', PostApiControllerV1::class);
});

Route::prefix('v2')->group(function (){
    Route::apiResource('post', PostApiControllerV2::class);
});