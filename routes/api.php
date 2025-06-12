<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;




// GESTION DES ARTICLES

// affichage de tous les articles
Route::get('/articles', ArticleController::class . '@getArticles');

// création d'un article
Route::post('/new-article', ArticleController::class . '@createArticle');

//affichage, modification, suppression d'un article
Route::get('/article/{id}', ArticleController::class . '@getArticle');
Route::put('/article/{id}', ArticleController::class . '@updateArticle');
Route::delete('/article/{id}', ArticleController::class . '@deleteArticle');


