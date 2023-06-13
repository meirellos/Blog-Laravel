<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;

//Chamando o controller home, e a função index.
Route::get('/', [HomeController::class, 'index'])->name('home');

//Pegando o post pelo slug.
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');

//Rotas de login.
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::Post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

//Listagem de todos os posts

Route::get('/posts', [PostsController::class, 'index'])->name('posts');

//Adicionando comentário novo.
Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment');
Route::get('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');