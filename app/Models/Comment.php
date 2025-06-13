<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'article_id',
        'creator_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    protected static function booted()
    {
        static::creating(function ($comment) {
            if (empty($comment->creator_id)) {
                $comment->creator_id = 1;
            }
        });
    }
}
