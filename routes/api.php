<?php

use App\Http\Controllers\CommentController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;




// GESTION DES ARTICLES

// affichage de tous les articles
Route::get('/articles', ArticleController::class . '@getArticles');

// création d'un article
Route::post('/new-article', ArticleController::class . '@createArticle');

//affichage, modification, suppression d'un article
Route::get('/article/{id}', ArticleController::class . '@getArticle');
Route::put('/article/{id}', ArticleController::class . '@updateArticle');
Route::delete('/article/{id}', ArticleController::class . '@deleteArticle');

// récupéartion de l'article le plus populaire
Route::get('/articles/latest', function() {
    return Article::with('user')->latest()->first();
});

// ajouter un commentaire à un article
Route::post('/comments', [CommentController::class, 'store']);

// récupération de tous les commentaires d'un article
Route::get('/articles/{id}/comments', [CommentController::class, 'index']);

