<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UsersController::class);
    Route::apiResource('posts', PostsController::class);
    Route::apiResource('comments', CommentsController::class);
    Route::apiResource('tags', TagsController::class);
    Route::apiResource('categories', CategoriesController::class);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/posts/search', [PostsController::class, 'search']);
Route::get('/tags/{tag}/posts', [TagsController::class, 'posts']);
Route::get('/users/{user}/posts', [UsersController::class, 'posts']);
Route::get('/users/{user}/comments', [UsersController::class, 'comments']);
Route::get('/posts/{post}/comments', [PostsController::class, 'comments']);
Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);
Route::put('/comments/{comment}/approve', [CommentsController::class, 'approve']);
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy']);
Route::get('/categories/{category}/posts', [CategoriesController::class, 'posts']);
Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});
