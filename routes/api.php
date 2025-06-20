<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;





// GESTION DES ARTICLES

// affichage de tous les articles
Route::get('/articles', ArticleController::class . '@getArticles');

// création d'un article
Route::post('/new-article', [ArticleController::class, 'createArticle']);

//affichage, modification, suppression d'un article
Route::get('/article/{id}', ArticleController::class . '@getArticle');
Route::put('/article/{id}', ArticleController::class . '@updateArticle');
Route::delete('/article/{id}', ArticleController::class . '@deleteArticle');

// récupéartion de l'article le plus populaire
Route::get('/articles/latest', function() {
    return Article::with('user')->latest()->first();
});

// ajouter un commentaire à un article
Route::post('/article/{articleId}/comment', [CommentController::class, 'store']);

// récupération de tous les commentaires d'un article
Route::get('/article/{articleId}/comments', [CommentController::class, 'index']);

// Affichage des tags les plus populaires
Route::get('/popular-tags', [ArticleController::class, 'getPopularTags']);



// GESTION DES UTILISATEURS

// Affichage de tous les utilisateurs
Route::get('/users', UserController::class . '@index');

//Affichage des meilleurs utilisateurs
Route::get('/top-contributors', [UserController::class, 'topContributors']);

// Affichage d'un utilisateur spécifique
Route::get('/user/{user}', UserController::class . '@show');

// Création d'un nouvel utilisateur (inscription)
Route::post('/users', UserController::class . '@store');

// Mise à jour d'un utilisateur
Route::put('/user/{user}', UserController::class . '@update');

// Suppression d'un utilisateur
Route::delete('/user/{user}', UserController::class . '@destroy');

// Connexion d'un utilisateur
Route::post('/login', [AuthController::class, 'login']);

