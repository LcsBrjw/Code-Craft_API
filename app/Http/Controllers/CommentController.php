<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
{
    $validated = $request->validate([
        'content' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->content = $validated['content'];
    $comment->article_id = $articleId;
    $comment->creator_id = auth()->id(); // par exemple si tu utilises l’auth
    $comment->save();

    $comment->load('user');

    return response()->json(['comment' => $comment], 201);
}



public function index($articleId)
{
    $comments = Comment::with('user')
                       ->where('article_id', $articleId)
                       ->orderBy('created_at', 'desc')
                       ->get();

    return response()->json([
        'comments' => $comments
    ]);
}


}