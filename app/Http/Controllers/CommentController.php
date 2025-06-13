<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        $comment = Comment::create([
            'content' => $validated['content'],
            'article_id' => $validated['article_id'],
        ]);

        return response()->json([
            'message' => 'Commentaire ajouté avec succès',
            'comment' => $comment->load('user'),
        ], 201);
    }
}
