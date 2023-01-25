<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;


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

Auth::routes();

Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::resource('comments', CommentController::class)->only(
    'store',
    'update',
    'user',
    'destroy'
);

Route::get('/admin/{any?}', function () {
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');
