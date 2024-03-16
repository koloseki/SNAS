<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/articles', function () {
    return view('articles');
});

Route::post('/create', [ArticleController::class, 'store'])->name('create.store');
