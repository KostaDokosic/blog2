<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::get('/signin', [AuthController::class, 'getSignIn']);
Route::get('/signup', [AuthController::class, 'getSignUp']);

Route::get('/createpost', [PostsController::class, 'createPost']);
Route::post('/create', [PostsController::class, 'store']);
Route::post('/createcomment', [CommentsController::class, 'store']);
Route::get('/', [PostsController::class, 'index']);
Route::get('/{id}', [PostsController::class, 'show']);