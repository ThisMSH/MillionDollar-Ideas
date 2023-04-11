<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
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

// === Protected routes ===
Route::middleware(['auth:sanctum'])->group(function () {
    // User info
    Route::get('/user', [UsersController::class, 'show']);
    
    // Posts
    Route::post('/posts', [PostsController::class, 'store']);
    Route::patch('/posts/{post}', [PostsController::class, 'update']);
    Route::delete('/posts/{post}', [PostsController::class, 'destroy']);

    // Comments
    Route::post('/comment', [CommentsController::class, 'store']);
    Route::patch('/comment/{comment}', [CommentsController::class, 'update']);
    Route::delete('/comment/{comment}', [CommentsController::class, 'destroy']);
});


// Posts
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::get('/posts/search/{search}', [PostsController::class, 'search']);
Route::get('/category/{id}', [PostsController::class, 'filter']);

// Categories
Route::get('/categories', [CategoriesController::class, 'index']);

// Likes
Route::post('/like', [LikesController::class, 'store']);

