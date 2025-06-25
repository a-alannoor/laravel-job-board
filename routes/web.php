<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Invokable controller = single action controller  
Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);
Route::get('/about', AboutController::class);

Route::get('/job', [JobController::class, 'index']);

Route::resource('post', PostController::class);
Route::resource('tag', TagController::class);
Route::resource('comment', CommentController::class);

Route::get('/postAttachToTag/{id}', [TagController::class, 'attach']);
