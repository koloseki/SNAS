<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', [ArticleController::class, 'create'])->name('create.create');
Route::post('/create', [ArticleController::class, 'store'])->name('create.store');

Route::get('/edit/{id}', [ArticleController::class, 'edit']);
Route::put('/edit/{id}', [ArticleController::class, 'update'])->name('edit.update');

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/authors', [AuthorsController::class, 'index']);

