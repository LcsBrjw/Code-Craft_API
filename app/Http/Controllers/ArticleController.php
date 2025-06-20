<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    // Création d'un article
    public function createArticle(Request $request) {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        $articleCreated = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'banner_url' => $request->image,
            'tags' => $request->tags,
        ]);

        return response()->json([
            'message' => 'Article created successfully',
            'article' => $articleCreated
        ]);
    }




    // Affichage de tous les articles
    public function getArticles(Request $request) {
        $limit = $request->query('limit', 8); // permet ?limit=8 côté frontend
        $articles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();

        return response()->json([
            'message' => 'Articles retrieved successfully',
            'articles' => $articles
        ]);
    }



    // Affichage d'un article par son Id
    public function getArticle($id) {
        $article = Article::find($id);
        return response()->json([
            'message' => 'Article retrieved successfully',
            'article' => $article
        ]);
    }





    // Modification d'un article par son Id
    public function updateArticle($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        $articleUpdated = Article::find($id);
        $articleUpdated->title = $request->title;
        $articleUpdated->subtitle = $request->subtitle;
        $articleUpdated->content = $request->content;
        $articleUpdated->image = $request->image;
        $articleUpdated->tags = $request->tags;
        $articleUpdated->save();

        return response()->json([
            'message' => 'Article updated successfully',
            'article' => $articleUpdated
        ]);
    }





    // Suppression d'un article par son Id
    public function deleteArticle($id) {
        $articleDeleted = Article::find($id);
        $articleDeleted->delete();

        return response()->json([
            'message' => 'Article deleted successfully',
            'article' => $articleDeleted
        ]);
    }


    // Récupération des tags les plus populaires
    public function getPopularTags()
{
    $popularTags = \App\Models\Article::select('tag', \DB::raw('COUNT(*) as count'))
        ->whereNotNull('tag')
        ->groupBy('tag')
        ->orderByDesc('count')
        ->take(5)
        ->get();

    return response()->json([
        'message' => 'Popular tags retrieved successfully',
        'tags' => $popularTags,
    ]);
}

}
