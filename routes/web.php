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
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danhmuc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/theloai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quocgia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xemphim', [IndexController::class, 'watch'])->name('watch');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::get('/update-year-movie', [MovieController::class, 'update_year']);
Route::get('/update-topview-movie', [MovieController::class, 'update_topview']);
Route::get('/filter-topview-movie', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);

