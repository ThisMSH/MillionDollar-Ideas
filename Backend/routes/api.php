<?php

use App\Http\Controllers\CategoriesController;
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
    Route::get('/user', [UsersController::class, 'show']);
});

// Posts
Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{posts}', [PostsController::class, 'show']);
Route::put('/posts/{posts}', [PostsController::class, 'update']);

// Categories
Route::get('/categories', [CategoriesController::class, 'index']);
