<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\EpisodeController;



Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danhmuc', [IndexController::class, 'category'])->name('category');
Route::get('/theloai', [IndexController::class, 'genre'])->name('genre');
Route::get('/quocgia', [IndexController::class, 'country'])->name('country');
Route::get('/phim', [IndexController::class, 'movie'])->name('movie');
Route::get('/xemphim', [IndexController::class, 'watch'])->name('watch');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
