<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Chamando o controller home, e a função index.
Route::get('/', [HomeController::class, 'index'])->name('home');