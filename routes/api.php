<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/article/{id}', [ArticleController::class, 'showApi']);

Route::get('/author/{id}/articles', [ArticleController::class, 'articlesByAuthor']);

Route::get('/top-authors', [ArticleController::class, 'topAuthors']);
