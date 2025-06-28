<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// ## Pulblic Routes
// Invokable controller = single action controller  
Route::get('/', IndexController::class);
Route::get('/about', AboutController::class);

Route::get('/job', [JobController::class, 'index']);

Route::resource('tag', TagController::class);
Route::resource('comment', CommentController::class);

Route::get('/postAttachToTag/{id}', [TagController::class, 'attach']);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// ## Private Routes
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class);
});

Route::middleware('onlyMe')->group(function () {
    Route::get('/contact', ContactController::class);
});