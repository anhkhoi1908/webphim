<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;


Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('category', [IndexController::class, 'category'])->name('category');
Route::get('/genre', [IndexController::class, 'genre'])->name('genre');
Route::get('/country', [IndexController::class, 'country'])->name('country');
Route::get('/movie', [IndexController::class, 'movie'])->name('movie');
Route::get('/watch', [IndexController::class, 'watch'])->name('watch');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
