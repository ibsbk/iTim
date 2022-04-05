<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'mainView'])->name('/');

Route::get('/reg', [UserController::class, 'regView'])->name('reg');
Route::post('/reg', [UserController::class, 'regPost']);

Route::get('/auth', [UserController::class, 'authView'])->name('auth');
Route::post('/auth', [UserController::class, 'authPost']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/lk', [UserController::class, 'lkView'])->name('lk');

Route::get('allFilms', [FilmController::class, 'allFilms'])->name('allFilms');

Route::get('/film/{film}', [FilmController::class, 'filmView'])->name('film');
Route::post('/film/{film}', [FilmController::class, 'filmPost']);
Route::delete('/film/{film}', [FilmController::class, 'filmCommentDelete']);

Route::get('/genre/{genre}', [FilmController::class, 'genreFilm'])->name('genre');

Route::get('/adminLk', [AdminController::class, 'adminLkView'])->middleware('admin')->name('adminLk');

Route::get('/addFilm', [AdminController::class, 'addFilmView'])->middleware('admin')->name('addFilm');
Route::post('/addFilm', [AdminController::class, 'addFilmPost'])->middleware('admin');

Route::get('addActor', [AdminController::class, 'addActorView'])->middleware('admin')->name('addActor');
Route::post('addActor', [AdminController::class, 'addActorPost'])->middleware('admin');

Route::get('addActorToFilm', [AdminController::class, 'addActorToFilmView'])->middleware('admin')->name('addActorToFilm');
Route::post('addActorToFilm', [AdminController::class, 'addActorToFilmPost'])->middleware('admin');

Route::get('editFilm/{film}', [AdminController::class, 'editFilmView'])->middleware('admin')->name('editFilm');
Route::post('editFilm/{film}', [AdminController::class, 'editFilmPost'])->middleware('admin');

Route::get('deleteFilm/{film}', [AdminController::class, 'deleteFilmView'])->middleware('admin')->name('deleteFilm');
Route::post('deleteFilm/{film}', [AdminController::class, 'deleteFilmPost'])->middleware('admin');