<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;

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