<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users', [UsersController::class, 'index']);
// Route::post('/deleteUser', [UsersController::class, 'destroy']);

Route::get('/signin', [AuthController::class, 'getSignIn']);
Route::get('/signup', [AuthController::class, 'getSignUp']);
Route::post('/signin', [AuthController::class, 'signIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::get('/createpost', [PostsController::class, 'createPost'])->middleware('auth');
Route::post('/create', [PostsController::class, 'store'])->middleware('auth');
Route::post('/createcomment', [CommentsController::class, 'store']);
Route::get('/', [PostsController::class, 'index']);
Route::get('/{id}', [PostsController::class, 'show']);
Route::get('/posts/user/{id}', [PostsController::class, 'getUserPosts']);

